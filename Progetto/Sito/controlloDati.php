<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tabella</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="imagesTable/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fontsTable/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="cssTable/util.css">
    <link rel="stylesheet" type="text/css" href="cssTable/main.css">
    <!--===============================================================================================-->
    <script>
        (function (global) {

            if (typeof (global) === "undefined") {
                throw new Error("window is undefined");
            }

            var _hash = "!";
            var noBackPlease = function () {
                global.location.href += "#";

                // making sure we have the fruit available for juice (^__^)
                global.setTimeout(function () {
                    global.location.href += "!";
                }, 50);
            };

            global.onhashchange = function () {
                if (global.location.hash !== _hash) {
                    global.location.hash = _hash;
                }
            };

            global.onload = function () {
                noBackPlease();

                // disables backspace on page except on input fields and textarea..
                document.body.onkeydown = function (e) {
                    var elm = e.target.nodeName.toLowerCase();
                    if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                        e.preventDefault();
                    }
                    // stopping event bubbling up the DOM tree..
                    e.stopPropagation();
                };
            }

        })(window);

        function redirect(){
            window.location='index.html';
        }
    </script>
</head>

<body>

    <!--===============================================================================================-->
    <script src="vendorTable/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendorTable/bootstrap/js/popper.js"></script>
    <script src="vendorTable/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendorTable/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="jsTable/main.js"></script>

</body>

</html>
<?php
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : "";
$street = isset($_POST['street']) ? $_POST['street'] : "";
$civic = isset($_POST['civic']) ? $_POST['civic'] : "";
$city = isset($_POST['city']) ? $_POST['city'] : "";
$cap = isset($_POST['cap']) ? $_POST['cap'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$hobby = isset($_POST['hobby']) ? $_POST['hobby'] : "";
$job = isset($_POST['job']) ? $_POST['job'] : "";

function validateGender($input)
{
    $pattern = "/^[a-zA-Zàáâäãåaccèéìínòóùú ,.'-]+$/u";
    return preg_match($pattern, $input) ? true : false;
}

function validateCharAndSpace($input)
{
    $pattern = "/^[a-zA-Zàáâäãåaccèéìínòóùú ,.'-]+$/u";
    return preg_match($pattern, $input) ? true : false;
}

function validateVia($input)
{
    $pattern = "/^[a-zA-Z ]+$/";
    return preg_match($pattern, $input) ? true : false;
}

function validateCivicNumber($input)
{
    $pattern = "/^\d{1,3}[a-zA-Z]{0,1}$/";
    return preg_match($pattern, $input) ? true : false;
}

function validateCAP($input)
{
    $pattern = "/^\d{4,5}$/";
    return preg_match($pattern, $input) ? true : false;
}

function checkAll($first_name, $last_name, $birthday, $street, $civic, $city, $email, $cap, $phone, $gender, $hobby, $job)
{
    $inputs = array(
        $first_name,
        $last_name,
        $birthday,
        $street,
        $civic,
        $city,
        $email,
        $cap,
        $phone,
        $gender,
        $hobby,
        $job
    );

    if (validateCAP($cap) && validateCivicNumber($civic) && validateVia($street) && validateCharAndSpace($first_name) && validateCharAndSpace($last_name) && validateCharAndSpace($city)) {
        $today = date("Y-m-d");

        $csvDate = date("Y-m-d H:i:s");

        $list = array(
            array($csvDate, $first_name, $last_name, $birthday, $street, $civic, $city, $email, $cap, $phone, $gender, $hobby, $job)
        );

        if (!(file_exists("Registrazioni/Registrazioni_tutte.csv"))) {
            $file = fopen("Registrazioni/Registrazioni_tutte.csv", "a+");
            foreach ($list as $line) {
                fputcsv($file, $line, ";");
            }

            fclose($file);
            if (!(file_exists("Registrazioni/Registrazione_" . $today . ".csv"))) {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }


                echo "
                <div class='page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins'>
                    <div class='wrapper wrapper--w680'>
                        <div class='card card-4'>
                            <div class='card-body'>
                                <table>
                                    <thead>
                                        <tr class='table100-head'>
                                            <th>Data registrazione</th>
                                            <th>Nome</th>
                                            <th>Cognome</th>
                                            <th>Data di nascita</th>
                                            <th>Via</th>
                                            <th>Numero civico</th>
                                            <th>Città</th>
                                            <th>Email</th>
                                            <th>CAP</th>
                                            <th>Numero di telefono</th>
                                            <th>Sesso</th>
                                            <th>Hobby</th>
                                            <th>Lavoro</th>
                                        </tr>
                                    </thead>";
                
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($csvDateA, $first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$csvDateA</td>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            } else {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }


                echo "
                <div class='limiter'>
                    <div class='container-table100'>
                        <div class='wrap-table100'>
                            <div class='table100'>
                                <table>
                                    <thead>
                                        <tr class='table100-head'>
                                            <th>Data registrazione</th>
                                            <th>Nome</th>
                                            <th>Cognome</th>
                                            <th>Data di nascita</th>
                                            <th>Via</th>
                                            <th>Numero civico</th>
                                            <th>Città</th>
                                            <th>Email</th>
                                            <th>CAP</th>
                                            <th>Numero di telefono</th>
                                            <th>Sesso</th>
                                            <th>Hobby</th>
                                            <th>Lavoro</th>
                                        </tr>
                                    </thead>";
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($csvDateA, $first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$csvDateA</td>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            }
            echo "<button class='btn btn--radius-2 btn--blue' onclick='redirect()'>Fine</button>";
        } else {
            $file = fopen("Registrazioni/Registrazioni_tutte.csv", "a+");
            foreach ($list as $line) {
                fputcsv($file, $line, ";");
            }

            fclose($file);
            if (!(file_exists("Registrazioni/Registrazione_" . $today . ".csv"))) {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }

                echo "
                <div class='limiter'>
                    <div class='container-table100'>
                        <div class='wrap-table100'>
                            <div class='table100'>
                                <table>
                                    <thead>
                                        <tr class='table100-head'>
                                            <th>Data registrazione</th>
                                            <th>Nome</th>
                                            <th>Cognome</th>
                                            <th>Data di nascita</th>
                                            <th>Via</th>
                                            <th>Numero civico</th>
                                            <th>Città</th>
                                            <th>Email</th>
                                            <th>CAP</th>
                                            <th>Numero di telefono</th>
                                            <th>Sesso</th>
                                            <th>Hobby</th>
                                            <th>Lavoro</th>
                                        </tr>
                                    </thead>";
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($csvDateA, $first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$csvDateA</td>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            } else {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }

                echo "
                <div class='limiter'>
                    <div class='container-table100'>
                        <div class='wrap-table100'>
                            <div class='table100'>
                                <table>
                                    <thead>
                                        <tr class='table100-head'>
                                            <th>Data registrazione</th>
                                            <th>Nome</th>
                                            <th>Cognome</th>
                                            <th>Data di nascita</th>
                                            <th>Via</th>
                                            <th>Numero civico</th>
                                            <th>Città</th>
                                            <th>Email</th>
                                            <th>CAP</th>
                                            <th>Numero di telefono</th>
                                            <th>Sesso</th>
                                            <th>Hobby</th>
                                            <th>Lavoro</th>
                                        </tr>
                                    </thead>";
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($csvDateA, $first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$csvDateA</td>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            }
            echo "<button class='btn btn--radius-2 btn--blue' onclick='redirect()'>Fine</button>";
        }
    }
}

checkAll($first_name, $last_name, $birthday, $street, $civic, $city, $email, $cap, $phone, $gender, $hobby, $job);

?>