<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Panel</title>
</head>
<body>
    <header class="admin-header">
        <div class="admin-header__competition">
            <div class="admin-header__logo-box">
                <img src="images/logo.svg" class="admin-header__logo-box--logo" alt="Competition logo">
            </div>
            <div class="admin-header__competition--name">
                <h2>Kaunas Ice Winter Cup 2020</h2>
            </div>
        </div>
        <div class="admin-header__admin-panel">
            <p class="admin-header__admin-panel--left">Form administrator</p>
            <p class="admin-header__admin-panel--right"><a href="logout.php">Log out</a></p>
        </div>
    </header>
    <main class="admin-content">
        <div class="admin-content__tab">
            <button class="admin-content__tab--tablinks" onclick="openTab(event, \'clubs\')" id="defaultOpen">Clubs</button>
            <button class="admin-content__tab--tablinks" onclick="openTab(event, \'competitors\')">Competitors</button>
            <button class="admin-content__tab--tablinks" onclick="openTab(event, \'judges\')">Judges</button>
            <button class="admin-content__tab--tablinks" onclick="openTab(event, \'ppc\')">Planned Program Content</button>
        </div>
        <div class="admin-content__bg">';

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "projekto_pavadinimas";
$password = "projektas";
$dbname = "justinos_baze";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//*********************************    CLUB INFO    *********************************/

    echo '<div id="clubs" class="admin-content__tab-content">
            <h2>Club Info</h2>
            <table class="tab-table">
                <tr>
                    <th>No.</th>
                    <th>Club</th>
                    <th>ISU Member Federation</th>
                    <th>Contact person</th>
                    <th>Contact email</th>
                    <th>Registration date</th>
                </tr>';

    $stmt1 = $conn->prepare("SELECT 
        id, club, isu_member, contact_person, contact_email, registration_date 
        FROM
        club_info;");
    $stmt1->execute();
    //set the resulting array to associative
    $result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt1->fetchAll())) as $k=>$v) {
        echo $v;
    }
    echo '</table></div>';

//*********************************    COMPETITOR INFO    *********************************/

    echo '<div id="competitors" class="admin-content__tab-content">
            <h2>Competitor Info</h2>
            <table class="tab-table">
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Category</th>
                    <th>Club</th>
                    <th>ISU Member Federation</th>
                </tr>';

    $stmt2 = $conn->prepare("SELECT 
        competitor_info.id, 
        competitor_info.competitor_first_name, 
        competitor_info.competitor_last_name, 
        competitor_info.birth_date,
        competitor_info.category,
        club_info.club,
        club_info.isu_member
        FROM
        competitor_info
        INNER JOIN club_info
        ON competitor_info.club_id=club_info.id;");
    $stmt2->execute();
    //set the resulting array to associative
    $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt2->fetchAll())) as $k=>$v) {
        echo $v;
    }
    echo '</table></div>';

//*********************************    JUDGE INFO    *********************************/

    echo '<div id="judges" class="admin-content__tab-content">
            <h2>Judge Info</h2>
            <table class="tab-table">
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Qualification</th>
                    <th>Club</th>
                    <th>ISU Member Federation</th>
                    <th>Contact person</th>
                    <th>Contact email</th>
                </tr>';

    $stmt3 = $conn->prepare("SELECT 
        judge_info.id, 
        judge_info.judge_first_name, 
        judge_info.judge_last_name,
        judge_info.judge_qualification, 
        club_info.club,
        club_info.isu_member,
        club_info.contact_person,
        club_info.contact_email
        FROM judge_info
        INNER JOIN club_info
        ON judge_info.club_id=club_info.id;");
    $stmt3->execute();

    //set the resulting array to associative
    $result = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt3->fetchAll())) as $k=>$v) {
        echo $v;
    }
    echo '</table></div>';

//*********************************    PLANNED PROGRAM CONTENT    *********************************/

    echo '<div id="ppc" class="admin-content__tab-content">
            <h2>Planned Program Content</h2>
            <table class="tab-table tab-table__ppc">';

    $stmt4 = $conn->prepare("SELECT 
        competitor_first_name, competitor_last_name,
        1_sp, 2_sp, 3_sp, 4_sp, 5_sp, 6_sp, 7_sp, 8_sp, 9_sp, 10_sp, 11_sp, 12_sp, 13_sp,
        1_fs, 2_fs, 3_fs, 4_fs, 5_fs, 6_fs, 7_fs, 8_fs, 9_fs, 10_fs, 11_fs, 12_fs, 13_fs
        FROM competitor_info;");
    $test = $stmt4->execute();
    $result = $stmt4->setFetchMode(PDO::FETCH_ASSOC);
    
    $ppcArray = $stmt4->fetchAll();

    $j=0;
    while ($j < count($ppcArray)) {
        $competitor = $ppcArray[$j];
        $keys = array_keys($competitor);
        echo "<tr><th colspan='3'>" . $competitor['competitor_first_name'] . " " . $competitor['competitor_last_name'] . "</th></tr>";
        echo "<tr><td></td><td>SHORT PROGRAM</td><td>FREE SKATING</td></tr>";
        echo "<tr><td>1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>11<br>13<br></td><td>";
        $i = 2;
        while ($i < 15) {
            echo $competitor[$keys[$i]] . "<br>";
            $i++;
        }
        echo "</td><td>";
        while ($i > 14 && $i < 28) {
            echo $competitor[$keys[$i]] . "<br>";
            $i++;
        }
        echo "</td></tr>";
        $j++;
    }

    echo '</table></div>';

}
catch(PDOException $ex) {
    echo "Error: " . $ex->getMessage();
}
$conn = null;

echo '</div>
</main>
<script>
function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="admin-content__tab-content" and hide them
    tabcontent = document.getElementsByClassName("admin-content__tab-content");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="admin-content__tab--tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("admin-content__tab--tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>';

?>