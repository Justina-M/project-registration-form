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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Thank you</title>
</head>
<body>
    <div class="thank-you-page">
        <div class="thank-you-page__logo-box">
            <img src="images/logo.svg" class="thank-you-page__logo-box--logo" alt="Competition logo">
        </div>
        <div class="thank-you-page__heading">
            <div class="checkmark"></div>
            <span>Thank you !</span>
        </div>
        <p class="thank-you-page__text thank-you-page__count-message">';

        $countCompetitors = $_GET['competitors'];
        $countJudges = $_GET['judges'];

        if ($countCompetitors == 1 && $countJudges == 1) {
            echo "We have received your registration of " . $countCompetitors . " competitor and " . $countJudges . " judge.</p>";
        } elseif ($countCompetitors == 1 && $countJudges == 0) {
            echo "We have received your registration of " . $countCompetitors . " competitor.</p>";
        } elseif ($countCompetitors > 1 && $countJudges == 1) {
            echo "We have received your registration of " . $countCompetitors . " competitors and " . $countJudges . " judge.</p>";
        } else {
            echo "We have received your registration of " . $countCompetitors . " competitors.</p>";
        }

    echo '<p class="thank-you-page__text">
            The list of participants and the time schedule will be available shortly after the registration deadline. All the information will be sent to your indicated email.
        </p>
    </div>
</body>
</html>';

?>