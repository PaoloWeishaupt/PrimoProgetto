<!DOCTYPE html>
<html lang="it">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registrazione</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <!-- Telephone input library-->
    <link href="intl-tel-input-14.0.0/build/css/intlTelInput.css " rel="stylesheet">

    <script src="js/jquery-3.3.1.js"></script>

    <script src="intl-tel-input-14.0.0/examples/js/prism.js"></script>
    <link rel="stylesheet" href="intl-tel-input-14.0.0/examples/css/isValidNumber.css">
    <link rel="stylesheet" href="intl-tel-input-14.0.0/examples/css/prism.css">
    <!-- My JavaScript-->
    <script src="js/inputCheck.js"></script>
    <script>(function (global) {

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
    </script>

</head>

<body>
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
    ?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="titleData">Compila i seguenti campi</h2>
                    <h5>I campi seguiti da un * sono obbligatori</h5>
                    <form method="POST" id="data" action="riassuntoDati.php" onsubmit="return checkAll();">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nome*</label>
                                    <input class="input--style-4" type="text" name="first_name" required id="name"
                                        title="Il nome deve contenere solo lettere ed eventuali spazi" onkeyup="validateCharAndSpace('name')"
                                        maxlength="50" <?php echo isset($first_name) ? "value ='$first_name'" : "" ?>>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Cognome*</label>
                                    <input class="input--style-4" type="text" name="last_name" required id="cognome"
                                        title="Il cognome deve contenere solo lettere ed eventuali spazi" onkeyup="validateCharAndSpace('cognome')"
                                        maxlength="50" <?php echo isset($last_name) ? "value ='$last_name'" : "" ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Data di nascita*</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday" id="date"
                                            required <?php echo isset($birthday) ? "value ='$birthday'" : "" ?>
                                        autocomplete="off">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Via*</label>
                                    <input class="input--style-4" type="text" name="street" required id="street" title="La via deve contenere solo lettere ed eventuali spazi"
                                        onkeyup="validateCharAndSpace('street')" maxlength="50" <?php echo
                                        isset($street) ? "value ='$street'" : "" ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Numero civico*</label>
                                    <input class="input--style-4" type="text" name="civic" required id="civic" title="Il numero civico deve contenere da 1 a 3 cifre ed un eventuale carattere"
                                        onkeyup="validateCivicNumber('civic')" <?php echo isset($civic) ?
                                        "value ='$civic'" : "" ?>>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Città*</label>
                                    <input class="input--style-4" type="text" name="city" required id="city" title="La città deve contenere solo lettere ed eventuali spazi"
                                        onkeyup="validateCharAndSpace('city')" maxlength="50" <?php echo isset($city) ?
                                        "value ='$city'" : "" ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">CAP*</label>
                                    <!-- Diario problemi -->
                                    <input class="input--style-4" type="number" name="cap" required id="cap" onkeyup="validateCAP('cap');javascript: return event.keyCode == 69 ? false : true"
                                        title="Inserisci un CAP tra 4 e 5 cifre" <?php echo isset($cap) ?
                                        "value ='$cap'" : "" ?>>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Numero di telefono*</label>
                                    <input class="input--style-4" type="tel" name="phone" id="phone" required <?php
                                        echo isset($phone) ? "value ='$phone'" : "" ?>>
                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                    <span id="error-msg" class="hide"></span>
                                    <!--Script for the personalized number input-->
                                    <script src="intl-tel-input-14.0.0/build/js/intlTelInput.js"></script>
                                    <script>
                                        var input = document.querySelector("#phone"),
                                            errorMsg = document.querySelector("#error-msg"),
                                            validMsg = document.querySelector("#valid-msg");

                                        // here, the index maps to the error code returned from getValidationError - see readme
                                        var errorMap = ["Numero non valido", "Prefisso non valido", "Troppo corto", "Troppo lungo", "Invalid number"];

                                        // initialise plugin
                                        var iti = window.intlTelInput(input, {
                                            initialCountry: "auto",
                                            autoPlaceholder: "aggressive",
                                            geoIpLookup: function (success, failure) {
                                                $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
                                                    var countryCode = (resp && resp.country) ? resp.country : "";
                                                    success(countryCode);
                                                });
                                            },
                                            utilsScript: "intl-tel-input-14.0.0/build/js/utils.js",
                                        });
                                        var reset = function () {
                                            // set input value
                                            input.value = iti.getNumber();
                                            input.classList.remove("error");
                                            errorMsg.innerHTML = "";
                                            errorMsg.classList.add("hide");
                                            validMsg.classList.add("hide");
                                        };

                                        // on blur: validate
                                        input.addEventListener('blur', function () {
                                            reset();
                                            if (input.value.trim()) {
                                                if (iti.isValidNumber()) {
                                                    validMsg.classList.remove("hide");
                                                    validateNumber(true);
                                                } else {
                                                    input.classList.add("error");
                                                    var errorCode = iti.getValidationError();
                                                    errorMsg.innerHTML = errorMap[errorCode];
                                                    errorMsg.classList.remove("hide");
                                                    validateNumber(false);
                                                }
                                            }
                                        });

                                        // on keyup / change flag: reset
                                        input.addEventListener('change', reset);
                                        input.addEventListener('keyup', reset);

                                    </script>
                                    <script class="iti-load-utils" async="" src="intl-tel-input-14.0.0/build/js/utils.js"></script>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email*</label>
                                    <input class="input--style-4" type="email" id="mail" name="email" maxlength="50" required
                                        <?php echo isset($email) ? "value ='$email'" : "" ?> onkeyup="validateMail('mail')">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Sesso*</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">M
                                            <input type="radio" name="gender" value="Maschio" id="mal" required checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">F
                                            <input type="radio" name="gender" value="Femmina" id="fem">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Hobby</label>
                                    <input class="input--style-4" type="text" id="hobby" name="hobby" maxlength="500"
                                        pattern="[a-zA-Z\s,]*$" title="L'hobby' deve contenere solo lettere ed eventuali spazi"
                                        onkeyup="validateNotReq('hobby')" <?php echo isset($hobby) ? "value ='$hobby'"
                                        : "" ?>>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Professione</label>
                                    <input class="input--style-4" type="text" id="job" name="job" maxlength="500"
                                        pattern="[a-zA-Z\s,]*$" title="La professione deve contenere solo lettere ed eventuali spazi"
                                        onkeyup="validateNotReq('job')" <?php echo isset($job) ? "value ='$job'" : "" ?>>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="button" onclick="deleteData()">Cancella</button>
                            <button class="btnAvanti btn--radius-2 btn--blue" type="submit" onclick="validateGender('gender')">Avanti</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(".js-datepicker").on('keydown paste', function (e) {
            e.preventDefault();
        });
    </script>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->