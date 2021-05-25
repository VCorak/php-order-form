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

    $alerts = [];
    $errors = [];


    // E-MAIL
    if (empty($_POST["email"])) {
        echo $alerts[] = "Please fill in your <a href='#email' class='alert-link'>E-mail</a>!";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well formatted
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "<a href='#email' class='alert-link'>$email</a> is not a valid email addres!";
        }
    }

    // ADDRESS
    $street = test_input($_POST["street"]);
    $number = test_input($_POST["streetnumber"]);
    $city = test_input($_POST["city"]);
    $zipCode = test_input($_POST["zipcode"]);

    if (empty($_POST["street"])) {
        echo $alerts[] = "Please fill in your <a href='#street' class='alert-link'>street</a>!";
    }


    if (empty($_POST["streetnumber"])) {
        echo $alerts[] = "Please fill in your <a href='#streetnumber' class='alert-link'>street number</a>!";
    } else {
        $number = test_input($_POST["streetnumber"]);
        // check if name only contains numbers
        if (!is_numeric($number)) {
            echo $errors[] = "<a href='#streetnumber' class='alert-link'>Street Number</a> only accepts numbers!";
        }
    }


    if (empty($_POST["city"])) {
        echo $alerts[] = "Please fill in your <a href='#city' class='alert-link'>city</a>!";
    }



    if (empty($_POST["zipcode"])) {
        echo $alerts[] = "Please fill in your <a href='#zipcode' class='alert-link'>zipcode</a>!";
    } else {
        $zipCode = test_input($_POST["zipcode"]);
        // check if name only contains numbers
        if (!is_numeric($zipCode)) {
            $errors[] = "<a href ='#zipcode' class='alert-link'>Zipcode</a> only accepts numbers!";
        }
    }

}
// MAKE SURE THEY ORDERED SOMETHING

$checked = [];

if (!empty($_POST["products"])) {
$checked= $_POST["products"];
}

if (empty($checked)) {
    $errors[] = "You didn't <a href ='#products' class='alert-link'>order</a> anything!";
}

// DISPLAY SUCCESS ORDER ALERT

if(empty($alerts) && empty($errors)) {
    echo ("<div class='alert alert-success text-center' role='alert'><h4 class='alert-heading'>Hooray!</h4>
           <p>You've successfully placed your order! Please check your mailbox.</p></div>");
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
    $_SESSION["streetnumber"] = $_POST["number"];
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

// DISPLAY ERRORS
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo ("<div class='alert alert-danger' role='alert'>" . $error . "</div>");
    }
}

// DISPLAY ALERTS
if (!empty($alerts)) {
    foreach ($alerts as $alert) {
        echo ("<div class='alert alert-danger' role='alert'>" . $alert . "</div>");
    }
}



require 'form-view.php';
