<!DOCTYPE HTML>
<!-- Begining HTML view -->
<html>
    <head>
        <title>Address Finder</title>
        <link rel="stylesheet" type="text/css" href="test.css">
    </head>
    <?php

    //  init variables
    $countryAbrievErr = $addressErr = $zipcodeErr = $cityErr = $stateErr = "";
    $countryAbriev = $continent = $address = $zipcode = $city = $state = "";

    //  NOTE I tried to find an API so I could do address verifications through API calls,
    // and GET the continent - but I couldn't find one

    // NOTE If I was working on this on my own for a longer period of time I would find an API for this, at best
    // - or at worst, build a little database so that I don't have to deal with a huge array in my index.php
    include 'countries.php';

    // if server recieves POST run conditional
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["countryAbriev"])) {
            $countryAbrievErr = "Enter Abrieviation";
        } else {
            $countryAbriev = trim_input($_POST["countryAbriev"]);
            $countryAbriev = strtoupper($countryAbriev);
            if (!preg_match("/^[a-zA-Z ]*$/",$countryAbriev)) {
                $countryAbrievErr = "Enter Abrieviation";
            }
        }

        if (empty($_POST["address"])) {
            $addressErr = "Enter Street Address";
            $address = "";
        } else {
            $address = trim_input($_POST["address"]);
        }

        if (empty($_POST["city"])) {
            $cityErr = "Enter City";
            $city = "";
        } else {
            $city = trim_input($_POST["city"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
                $cityErr = "Enter City";
            }
        }

        if (empty($_POST["state"])) {
            $stateErr = "Enter Abrieviation";
            $state = "";
        } else {
            $state = trim_input($_POST["state"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
                $stateErr = "Enter Abrieviation";
            }
        }

        if (!is_numeric($_POST["zipcode"])) {
            $zipcodeErr = "Enter Your Zipcode";
            $zipcode = "";
        } else {
            $zipcode = trim_input($_POST["zipcode"]);
            if (!is_numeric($zipcode)) {
                $zipcodeErr = "Enter Only Numbers";
            }
        }
    }

    // basic trimming of input
    function trim_input($location) {
        $location = trim($location);
        $location = stripslashes($location);
        $location = htmlspecialchars($location);
        $location = ucwords($location);
        return $location;
    }
    ?>
    <body>
        <h1>The Address Form</h1>

        <!-- form input -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Address: <input class="input" type="text" name="address" value="<?php echo $address;?>">
                <span class="error"><?php echo $addressErr;?></span>
            <br><br>
            City: <input class="input" type="text" name="city" value="<?php echo $city;?>">
                <span class="error"><?php echo $cityErr;?></span>
            <br><br>
            State Abbrieviation: <input class="input" type="text" name="state" maxlength="2" minlength="2" value="<?php echo $state;?>">
                <span class="error"><?php echo $stateErr;?></span>
            <br><br>
            Zipcode: <input class="input" type="text" name="zipcode" maxlength="5" minlength="5" value="<?php echo $zipcode;?>">
                <span class="error"><?php echo $zipcodeErr;?></span>
            <br><br>
            Country Abbrieviation: <input class="input" type="text" name="countryAbriev" maxlength="2" minlength="2" value="<?php echo $countryAbriev;?>">
                <span class="error">* <?php echo $countryAbrievErr;?></span>
            <br><br>
            <div class="button">
                <input class="submission" type="submit" name="submit" value="Submit">
            </div>
        </form>
        <?php
        // Loop through BAD ARRAY!!! and when we get a match, we interpolate our variables
            foreach ($country as $key => $value) {
                if ($countryAbriev == $key) {
                    echo "<p class='address'>Address: $address, $zipcode</p>";
                    echo "<p class='address'>City/State: $city, $state</p>";
                    echo "<p class='address'>Country: $key, $value</p>";
                }
            }
        ?>
    </body>
</html>
