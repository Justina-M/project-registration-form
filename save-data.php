<?php
$dbName = "justinos_baze";
$user = "projekto_pavadinimas";
$password = "projektas";

if (isset($_POST['submit'])) {
    $isuMember = $_REQUEST['isu-member'];
    $club = $_REQUEST['club'];
    $contactPerson = $_REQUEST['contact-person'];
    $contactEmail = $_REQUEST['contact-email'];

    $judgeFirstName = $_REQUEST['judge-first-name'];
    $judgeLastName = $_REQUEST['judge-last-name'];
    $judgeQualification = $_REQUEST['judge-qualification'];

    $competitorFirstName = $_REQUEST['competitor-first-name'];
    $competitorLastName = $_REQUEST['competitor-last-name'];
    $birthDate = $_REQUEST['birth-date'];
    $category = $_REQUEST['category'];

    // $shortProgramMusic = basename($_FILES['short-program-music']['name']);
    // $freeSkatingMusic = $_FILES['free-skating-music']['name'];

    $sp1 = $_REQUEST['1-sp'];
    $sp2 = $_REQUEST['2-sp'];
    $sp3 = $_REQUEST['3-sp'];
    $sp4 = $_REQUEST['4-sp'];
    $sp5 = $_REQUEST['5-sp'];
    $sp6 = $_REQUEST['6-sp'];
    $sp7 = $_REQUEST['7-sp'];
    $sp8 = $_REQUEST['8-sp'];
    $sp9 = $_REQUEST['9-sp'];
    $sp10 = $_REQUEST['10-sp'];
    $sp11 = $_REQUEST['11-sp'];
    $sp12 = $_REQUEST['12-sp'];
    $sp13 = $_REQUEST['13-sp'];

    $fs1 = $_REQUEST['1-fs'];
    $fs2 = $_REQUEST['2-fs'];
    $fs3 = $_REQUEST['3-fs'];
    $fs4 = $_REQUEST['4-fs'];
    $fs5 = $_REQUEST['5-fs'];
    $fs6 = $_REQUEST['6-fs'];
    $fs7 = $_REQUEST['7-fs'];
    $fs8 = $_REQUEST['8-fs'];
    $fs9 = $_REQUEST['9-fs'];
    $fs10 = $_REQUEST['10-fs'];
    $fs11 = $_REQUEST['11-fs'];
    $fs12 = $_REQUEST['12-fs'];
    $fs13 = $_REQUEST['13-fs'];
}

    
// try-catch method - when a specified error (exception) occurs the code catches it
try {
    // create connection - new php document object
    $conn = new PDO('mysql:host=localhost;dbname=' . $dbName . ';charset=utf8mb4', $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//*********************************    CLUB INFO    *********************************/

    // prepare sql and bind parameters
    $stmt1 = $conn->prepare("INSERT INTO club_info (club, isu_member, contact_person, contact_email)
    VALUES(:club, :isu_member, :contact_person, :contact_email)");
    $stmt1->bindParam(':club', $club);
    $stmt1->bindParam(':isu_member', $isuMember);
    $stmt1->bindParam(':contact_person', $contactPerson);
    $stmt1->bindParam(':contact_email', $contactEmail);
    $stmt1->execute();

    $club_id = $conn->lastInsertId();

//*********************************    JUDGE INFO    *********************************/

    $stmt2 = $conn->prepare("INSERT INTO judge_info (judge_first_name, judge_last_name, judge_qualification, club_id)
    VALUES(:judge_first_name, :judge_last_name, :judge_qualification, :club_id)");
    
        if ($judgeFirstName != '' && $judgeLastName != '' && $judgeQualification != '') {
            $stmt2->bindParam(':judge_first_name', $judgeFirstName);
            $stmt2->bindParam(':judge_last_name', $judgeLastName);
            $stmt2->bindParam(':judge_qualification', $judgeQualification);
            $stmt2->bindParam(':club_id', $club_id);

            $stmt2->execute();
        }  

//*********************************    COMPETITOR INFO    *********************************/

    $competitorFirstName = filter_input_array(INPUT_POST)['competitor-first-name'];
    $competitorLastName = filter_input_array(INPUT_POST)['competitor-last-name'];
    $birthDate = filter_input_array(INPUT_POST)['birth-date'];
    $category = filter_input_array(INPUT_POST)['category'];

    $sp1 = filter_input_array(INPUT_POST)['1-sp'];
    $sp2 = filter_input_array(INPUT_POST)['2-sp'];
    $sp3 = filter_input_array(INPUT_POST)['3-sp'];
    $sp4 = filter_input_array(INPUT_POST)['4-sp'];
    $sp5 = filter_input_array(INPUT_POST)['5-sp'];
    $sp6 = filter_input_array(INPUT_POST)['6-sp'];
    $sp7 = filter_input_array(INPUT_POST)['7-sp'];
    $sp8 = filter_input_array(INPUT_POST)['8-sp'];
    $sp9 = filter_input_array(INPUT_POST)['9-sp'];
    $sp10 = filter_input_array(INPUT_POST)['10-sp'];
    $sp11 = filter_input_array(INPUT_POST)['11-sp'];
    $sp12 = filter_input_array(INPUT_POST)['12-sp'];
    $sp13 = filter_input_array(INPUT_POST)['13-sp'];

    $fs1 = filter_input_array(INPUT_POST)['1-fs'];
    $fs2 = filter_input_array(INPUT_POST)['2-fs'];
    $fs3 = filter_input_array(INPUT_POST)['3-fs'];
    $fs4 = filter_input_array(INPUT_POST)['4-fs'];
    $fs5 = filter_input_array(INPUT_POST)['5-fs'];
    $fs6 = filter_input_array(INPUT_POST)['6-fs'];
    $fs7 = filter_input_array(INPUT_POST)['7-fs'];
    $fs8 = filter_input_array(INPUT_POST)['8-fs'];
    $fs9 = filter_input_array(INPUT_POST)['9-fs'];
    $fs10 = filter_input_array(INPUT_POST)['10-fs'];
    $fs11 = filter_input_array(INPUT_POST)['11-fs'];
    $fs12 = filter_input_array(INPUT_POST)['12-fs'];
    $fs13 = filter_input_array(INPUT_POST)['13-fs'];

    // $shortProgramMusic = filter_var_array(basename($_FILES['short-program-music']['name']));

    var_dump($judgeFirstName);
    echo "<br>";
    var_dump($judgeQualification);
    echo "<br>";
    var_dump($competitorFirstName);
    echo "<br>";
    var_dump($competitorLastName);
    echo "<br>";
    var_dump($birthDate);
    echo "<br>";
    var_dump($category);
    echo "<br>";
    var_dump($sp1);
    echo "<br>";

    if(is_array($competitorFirstName) && isset($competitorFirstName) 
    && is_array($competitorLastName) && isset($competitorLastName)
    && is_array($birthDate) && isset($birthDate)
    && is_array($category) && isset($category) ){
        $stmt3 = $conn->prepare("INSERT INTO competitor_info (competitor_first_name, competitor_last_name, birth_date, category, club_id,
                                1_sp, 2_sp, 3_sp, 4_sp, 5_sp, 6_sp, 7_sp, 8_sp, 9_sp, 10_sp, 11_sp, 12_sp, 13_sp,
                                1_fs, 2_fs, 3_fs, 4_fs, 5_fs, 6_fs, 7_fs, 8_fs, 9_fs, 10_fs, 11_fs, 12_fs, 13_fs) 
                                VALUES (:competitor_first_name, :competitor_last_name, :birth_date, :category, :club_id,
                                :1_sp, :2_sp, :3_sp, :4_sp, :5_sp, :6_sp, :7_sp, :8_sp, :9_sp, :10_sp, :11_sp, :12_sp, :13_sp,
                                :1_fs, :2_fs, :3_fs, :4_fs, :5_fs, :6_fs, :7_fs, :8_fs, :9_fs, :10_fs, :11_fs, :12_fs, :13_fs)");
        
        for($i = 0; $i < count($competitorFirstName); $i++) {
            if ($competitorFirstName[$i] != '' && $competitorLastName[$i] != '' && $birthDate[$i] != '' && $category[$i] != '') {
                $competitor = array(':competitor_first_name' => $competitorFirstName[$i],
                        ':competitor_last_name' => $competitorLastName[$i],
                        ':competitor_last_name' => $competitorLastName[$i],
                        ':birth_date' => $birthDate[$i],
                        ':category' => $category[$i],
                        ':club_id' => $club_id,
                        ':1_sp' => $sp1[$i],
                        ':2_sp' => $sp2[$i],
                        ':3_sp' => $sp3[$i],
                        ':4_sp' => $sp4[$i],
                        ':5_sp' => $sp5[$i],
                        ':6_sp' => $sp6[$i],
                        ':7_sp' => $sp7[$i],
                        ':8_sp' => $sp8[$i],
                        ':9_sp' => $sp9[$i],
                        ':10_sp' => $sp10[$i],
                        ':11_sp' => $sp11[$i],
                        ':12_sp' => $sp12[$i],
                        ':13_sp' => $sp13[$i],
                        ':1_fs' => $fs1[$i],
                        ':2_fs' => $fs2[$i],
                        ':3_fs' => $fs3[$i],
                        ':4_fs' => $fs4[$i],
                        ':5_fs' => $fs5[$i],
                        ':6_fs' => $fs6[$i],
                        ':7_fs' => $fs7[$i],
                        ':8_fs' => $fs8[$i],
                        ':9_fs' => $fs9[$i],
                        ':10_fs' => $fs10[$i],
                        ':11_fs' => $fs11[$i],
                        ':12_fs' => $fs12[$i],
                        ':13_fs' => $fs13[$i]
                );
                $stmt3->execute($competitor);
            }  
        }
    }
        else {
        echo "not array<br>";
    }
    header('location:thank-you.html');

}
// create an object containing the exception information
catch(PDOException $ex) {
    echo "ERROR : " . $ex->getMessage();
}
$conn = null;
?>