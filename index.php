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
if (isset($_GET["food"]) && $_GET["food"] == 0 ) {
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];
} else {

    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];

}

$totalValue = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // define variables and set to empty values
    $emailErr = $streetErr = $numberErr = $cityErr = $zipCodeErr = $checkedErr = "";
    $email = $street = $number = $city = $zipCode = "";



    // E_MAIL
    if (empty($_POST["email"])) {
        echo '<script>alert("Email is required")</script>';
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well formatted
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // ADDRESS
    if (empty($_POST["street"])) {
        echo '<script>alert("Street is required")</script>';
    } else {
        $street = test_input($_POST["street"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $street)) {
            $streetErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["number"])) {
        echo '<script>alert("Street number is required")</script>';
    } else {
        $number = test_input($_POST["number"]);
        // check if name only contains numbers
        if (!is_numeric($number)) {
            $numberErr = "Only numbers allowed";
        }
    }
    if (empty($_POST["city"])) {
        echo '<script>alert("City is required")</script>';
    } else {
        $city = test_input($_POST["city"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["zipcode"])) {
        echo '<script>alert("Zipcode is required")</script>';
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


require 'form-view.php';
