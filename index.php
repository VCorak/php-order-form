<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


//your products with their price.

$price = [];
$product = [];

if (isset($_GET["food"]) && $_GET["food"] == 0 ) {
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

if ($_POST["products"]) {
    foreach ($price as $key => $product["price"]) {
        $calc = array_sum($price);
        var_dump($calc);
    }
}
} else {

    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];
    if ($_POST["products"]) {
        $totalValue = array_sum($products);
    }
}

$totalValue = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // define variables and set to empty values

    $alerts = [];
    $errors = $emailErr = $streetErr = $numberErr = $cityErr = $zipCodeErr = $checkedErr = "";



    // E-MAIL
    if (empty($_POST["email"])) {
        echo $alerts[] = '<script>alert("Email is required")</script>';
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well formatted
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // ADDRESS
    if (empty($_POST["street"])) {
        echo $alerts[] = '<script>alert("Street is required")</script>';
    } else {
        $street = test_input($_POST["street"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $street)) {
            $streetErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["streetnumber"])) {
        echo $alerts[] = '<script>alert("Street number is required")</script>';
    } else {
        $number = test_input($_POST["streetnumber"]);
        // check if name only contains numbers
        if (!is_numeric($number)) {
            $numberErr = "Only numbers allowed";
        }
    }
    if (empty($_POST["city"])) {
        echo $alerts[] = '<script>alert("City is required")</script>';
    } else {
        $city = test_input($_POST["city"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["zipcode"])) {
        echo $alerts[] = '<script>alert("Zipcode is required")</script>';
    } else {
        $zipCode = test_input($_POST["zipcode"]);
        // check if name only contains numbers
        if (!is_numeric($zipCode)) {
            $zipCodeErr = "Only numbers allowed";
        }
    }

}
// MAKE SURE THEY ORDERED SOMETHING

$checked = [];

if (!empty($_POST["products"])) {

}

if (empty($checked)) {
    $checkedErr = "You didn't make an order";
}

// DISPLAY SUCCESS ORDER ALERT

if(empty($alerts) && empty($errors)) {
    echo $alerts[] = '<script>alert("You successfully placed your order!")</script>';
}

function test_input($data) {
    $data = trim($data); // Strip whitespace (or other characters) from the beginning and end of a string
    $data = stripslashes($data); // Un-quotes a quoted string
    $data = htmlspecialchars($data); // Convert special characters to HTML entities ( < = &lt; , ... )
    return $data;
}

// VARIABLES

$email = "";
$street = "";
$city = "";
$number = "";
$zipCode = "";

if (!empty($_POST)) {
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["street"] = $_POST["street"];
    $_SESSION["city"] = $_POST["city"];
    $_SESSION["streetnumber"] = $_POST["streetnumber"];
    $_SESSION["zipcode"] = $_POST["zipcode"];
}

if (!empty($_SESSION["email"])) {
    $email = $_SESSION["email"];
}

if (!empty($_SESSION["street"])) {
    $street = $_SESSION["street"];
}

if (!empty($_SESSION["city"])) {
    $city = $_SESSION["city"];
}

if (!empty($_SESSION["streetnumber"])) {
    $number = $_SESSION["streetnumber"];
}

if (!empty($_SESSION["zipcode"])) {
    $zipCode = $_SESSION["zipcode"];
}



require 'form-view.php';
