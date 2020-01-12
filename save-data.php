<?php

$errorMSG = "";

//*********************************    CLUB    *********************************/

if (empty($_POST["club"])) {
    $errorMSG .= "<li>Please enter the name of your club.</li>";
} else {
    $club = $_POST["club"];
}

//*********************************    ISU MEMBER    *********************************/

if (empty($_POST["isu_member"])) {
    $errorMSG .= "<li>Please select the name of your ISU Member.</li>";
} else {
    $isu_member = $_POST["isu_member"];
}

//*********************************    CONTACT PERSON    *********************************/

if (empty($_POST["contact_person"])) {
    $errorMSG .= "<li>Please enter the name of the contact person.</li>";
} else {
    $contact_person = $_POST["contact_person"];
}

//*********************************    CONTACT EMAIL    *********************************/

if (empty($_POST["contact_email"])) {
    $errorMSG .= "<li>Please enter your contact email.</li>";
} else if (!filter_var($_POST["contact_email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "<li>Please enter a valid email.</li>";
} else {
    $contact_email = $_POST["contact_email"];
}

//*********************************    JUDGE FIRST NAME    *********************************/

if (empty($_POST["judge_first_name"])) {
    $errorMSG .= "<li>Please enter the first name of the Judge.</li>";
} else {
    $judge_first_name = $_POST["judge_first_name"];
}

//*********************************    JUDGE LAST NAME    *********************************/

if (empty($_POST["judge_last_name"])) {
    $errorMSG .= "<li>Please enter the last name of the Judge.</li>";
} else {
    $judge_last_name = $_POST["judge_last_name"];
}

//*********************************    JUDGE QUALIFICATION    *********************************/

if (empty($_POST["judge_qualification"])) {
    $errorMSG .= "<li>Please select the qualification of the Judge.</li>";
} else {
    $judge_qualification = $_POST["judge_qualification"];
}

//***************************************************************************************/

if (empty($errorMSG)) {

    // START inserting form data to DataBase
    $dbName = "justinos_baze";
    $user = "projekto_pavadinimas";
    $password = "projektas";

    // create connection - new php document object
    $conn = new PDO('mysql:host=localhost;dbname=' . $dbName . ';charset=utf8mb4', $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //*********************************    CLUB INFO    *********************************/

    // prepare sql and bind parameters
    $stmt1 = $conn->prepare("INSERT INTO club_info (club, isu_member, contact_person, contact_email)
    VALUES(:club, :isu_member, :contact_person, :contact_email)");
    $stmt1->bindParam(':club', $club);
    $stmt1->bindParam(':isu_member', $isu_member);
    $stmt1->bindParam(':contact_person', $contact_person);
    $stmt1->bindParam(':contact_email', $contact_email);
    $stmt1->execute();

    $club_id = $conn->lastInsertId();

    //*********************************    JUDGE INFO    *********************************/

    // prepare sql and bind parameters
    $stmt2 = $conn->prepare("INSERT INTO judge_info (judge_first_name, judge_last_name, judge_qualification, club_id)
    VALUES(:judge_first_name, :judge_last_name, :judge_qualification, :club_id)");
    $stmt2->bindParam(':judge_first_name', $judge_first_name);
    $stmt2->bindParam(':judge_last_name', $judge_last_name);
    $stmt2->bindParam(':judge_qualification', $judge_qualification);
    $stmt2->bindParam(':club_id', $club_id);
    $stmt2->execute();

    $conn = null;
    // END inserting form data to DataBase

    // Informing client about success
    $msg = "Klubas: ".$club.", Šalis: ".$isu_member.", Kontaktinis asmuo: ".$contact_person.", Kontaktinis el.paštas: ".$contact_email."<br>
    Teisėjo vardas: ".$judge_first_name.", Teisėjo pavardė: ".$judge_last_name.", Teisėjo kvalifikacija: ".$judge_qualification;
    echo json_encode(['code'=>200, 'msg'=>$msg]);

    // deleting/unseting error messages
    unset($club, $isu_member, $contact_person, $contact_email);

    exit;
}

echo json_encode(['code'=>404, 'msg'=>$errorMSG]);

?>