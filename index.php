<?php

//  init variables
$countryAbrievErr = $addressErr = $zipcodeErr = $cityErr = $stateErr = "";
$countryAbriev = $continent = $address = $zipcode = $city = $state = "";

//  NOTE I tried to find an API so I could do address verifications through API calls,
// and GET the continent - but I couldn't find one

// NOTE If I was working on this on my own for a longer period of time I would find an API for this, at best
// - or at worst, build a little database so that I don't have to deal with a huge array in my index.php
$country = array(
  "AD" => "Europe",
  "AE"=> "Asia",
  "AF"=> "Asia",
  "AG"=> "North America",
  "AI"=> "North America",
  "AL"=> "Europe",
  "AM"=> "Asia",
  "AN"=> "North America",
  "AO"=> "Africa",
  "AQ"=> "Antarctica",
  "AR"=> "South America",
  "AS"=> "Australia",
  "AT"=> "Europe",
  "AU"=> "Australia",
  "AW"=> "North America",
  "AZ"=> "Asia",
  "BA"=> "Europe",
  "BB"=> "North America",
  "BD"=> "Asia",
  "BE"=> "Europe",
  "BF"=> "Africa",
  "BG"=> "Europe",
  "BH"=> "Asia",
  "BI"=> "Africa",
  "BJ"=> "Africa",
  "BM"=> "North America",
  "BN"=> "Asia",
  "BO"=> "South America",
  "BR"=> "South America",
  "BS"=> "North America",
  "BT"=> "Asia",
  "BW"=> "Africa",
  "BY"=> "Europe",
  "BZ"=> "North America",
  "CA"=> "North America",
  "CC"=> "Asia",
  "CD"=> "Africa",
  "CF"=> "Africa",
  "CG"=> "Africa",
  "CH"=> "Europe",
  "CI"=> "Africa",
  "CK"=> "Australia",
  "CL"=> "South America",
  "CM"=> "Africa",
  "CN"=> "Asia",
  "CO"=> "South America",
  "CR"=> "North America",
  "CU"=> "North America",
  "CV"=> "Africa",
  "CX"=> "Asia",
  "CY"=> "Asia",
  "CZ"=> "Europe",
  "DE"=> "Europe",
  "DJ"=> "Africa",
  "DK"=> "Europe",
  "DM"=> "North America",
  "DO"=> "North America",
  "DZ"=> "Africa",
  "EC"=> "South America",
  "EE"=> "Europe",
  "EG"=> "Africa",
  "EH"=> "Africa",
  "ER"=> "Africa",
  "ES"=> "Europe",
  "ET"=> "Africa",
  "FI"=> "Europe",
  "FJ"=> "Australia",
  "FK"=> "South America",
  "FM"=> "Australia",
  "FO"=> "Europe",
  "FR"=> "Europe",
  "GA"=> "Africa",
  "GB"=> "Europe",
  "GD"=> "North America",
  "GE"=> "Asia",
  "GF"=> "South America",
  "GG"=> "Europe",
  "GH"=> "Africa",
  "GI"=> "Europe",
  "GL"=> "North America",
  "GM"=> "Africa",
  "GN"=> "Africa",
  "GP"=> "North America",
  "GQ"=> "Africa",
  "GR"=> "Europe",
  "GS"=> "Antarctica",
  "GT"=> "North America",
  "GU"=> "Australia",
  "GW"=> "Africa",
  "GY"=> "South America",
  "HK"=> "Asia",
  "HN"=> "North America",
  "HR"=> "Europe",
  "HT"=> "North America",
  "HU"=> "Europe",
  "ID"=> "Asia",
  "IE"=> "Europe",
  "IL"=> "Asia",
  "IM"=> "Europe",
  "IN"=> "Asia",
  "IO"=> "Asia",
  "IQ"=> "Asia",
  "IR"=> "Asia",
  "IS"=> "Europe",
  "IT"=> "Europe",
  "JE"=> "Europe",
  "JM"=> "North America",
  "JO"=> "Asia",
  "JP"=> "Asia",
  "KE"=> "Africa",
  "KG"=> "Asia",
  "KH"=> "Asia",
  "KI"=> "Australia",
  "KM"=> "Africa",
  "KN"=> "North America",
  "KP"=> "Asia",
  "KR"=> "Asia",
  "KW"=> "Asia",
  "KY"=> "North America",
  "KZ"=> "Asia",
  "LA"=> "Asia",
  "LB"=> "Asia",
  "LC"=> "North America",
  "LI"=> "Europe",
  "LK"=>"Asia",
  "LR"=> "Africa",
  "LS"=> "Africa",
  "LT"=> "Europe",
  "LU"=> "Europe",
  "LV"=> "Europe",
  "LY"=> "Africa",
  "MA"=> "Africa",
  "MC"=> "Europe",
  "MD"=> "Europe",
  "ME"=> "Europe",
  "MG"=> "Africa",
  "MH"=> "Australia",
  "MK"=> "Europe",
  "ML"=> "Africa",
  "MM"=> "Asia",
  "MN"=> "Asia",
  "MO"=> "Asia",
  "MP"=> "Australia",
  "MQ"=> "North America",
  "MR"=> "Africa",
  "MS"=> "North America",
  "MT"=> "Europe",
  "MU"=> "Africa",
  "MV"=> "Asia",
  "MW"=> "Africa",
  "MX"=> "North America",
  "MY"=> "Asia",
  "MZ"=> "Africa",
  "NA"=> "Africa",
  "NC"=> "Australia",
  "NE"=> "Africa",
  "NF"=> "Australia",
  "NG"=> "Africa",
  "NI"=> "North America",
  "NL"=> "Europe",
  "NO"=> "Europe",
  "NP"=> "Asia",
  "NR"=> "Australia",
  "NU"=> "Australia",
  "NZ"=> "Australia",
  "OM"=> "Asia",
  "PA"=> "North America",
  "PE"=> "South America",
  "PF"=> "Australia",
  "PG"=> "Australia",
  "PH"=> "Asia",
  "PK"=> "Asia",
  "PL"=> "Europe",
  "PM"=> "North America",
  "PN"=> "Australia",
  "PR"=> "North America",
  "PS"=> "Asia",
  "PT"=> "Europe",
  "PW"=> "Australia",
  "PY"=> "South America",
  "QA"=> "Asia",
  "RE"=> "Africa",
  "RO"=> "Europe",
  "RS"=> "Europe",
  "RU"=> "Europe",
  "RW"=> "Africa",
  "SA"=> "Asia",
  "SB"=> "Australia",
  "SC"=> "Africa",
  "SD"=> "Africa",
  "SE"=> "Europe",
  "SG"=> "Asia",
  "SH"=> "Africa",
  "SI"=> "Europe",
  "SJ"=> "Europe",
  "SK"=> "Europe",
  "SL"=> "Africa",
  "SM"=> "Europe",
  "SN"=> "Africa",
  "SO"=> "Africa",
  "SR"=> "South America",
  "ST"=> "Africa",
  "SV"=> "North America",
  "SY"=> "Asia",
  "SZ"=> "Africa",
  "TC"=> "North America",
  "TD"=> "Africa",
  "TF"=> "Antarctica",
  "TG"=> "Africa",
  "TH"=> "Asia",
  "TJ"=> "Asia",
  "TK"=> "Australia",
  "TM"=> "Asia",
  "TN"=> "Africa",
  "TO"=> "Australia",
  "TR"=> "Asia",
  "TT"=> "North America",
  "TV"=> "Australia",
  "TW"=> "Asia",
  "TZ"=> "Africa",
  "UA"=> "Europe",
  "UG"=> "Africa",
  "US"=> "North America",
  "UY"=> "South America",
  "UZ"=> "Asia",
  "VC"=> "North America",
  "VE"=> "South America",
  "VG"=> "North America",
  "VI"=> "North America",
  "VN"=> "Asia",
  "VU"=> "Australia",
  "WF"=> "Australia",
  "WS"=> "Australia",
  "YE"=> "Asia",
  "YT"=> "Africa",
  "ZA"=> "Africa",
  "ZM"=> "Africa",
  "ZW"=> "Africa"
);

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

<!-- Begining HTML view -->
<html>
    <head>
        <title>Address Finder</title>
        <link rel="stylesheet" type="text/css" href="test.css">
    </head>
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
