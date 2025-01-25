<?php  
ob_start();
session_start(); 
date_default_timezone_set('UTC');
require_once "includes/config.php";
require_once "templates/header.php";
require_once "templates/style.php";
require_once "templates/navbar.php";

// Check if the user is logged in
if (!isset($_SESSION['sname']) && !isset($_SESSION['spass'])) {
    header("location: ./signin.php");
    exit();
}

$userId = $_SESSION['sname'];

// Function to generate unique p_data
function generatePData() {
    return uniqid();
}

// Function to store payment details in the database
function storePayment($user, $amount, $method, $p_data, $address) {
    global $dbcon;

    $query = "INSERT INTO payment (user, method, amount, p_data, address, date) 
              VALUES ('$user', '$method', '$amount', '$p_data', '$address', CURRENT_TIMESTAMP)";

    if (mysqli_query($dbcon, $query)) {
        return true;
    } else {
        echo "Error: " . mysqli_error($dbcon);
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $user = mysqli_real_escape_string($dbcon, $userId);
    $amount = mysqli_real_escape_string($dbcon, $_POST['amount']);
    $method = mysqli_real_escape_string($dbcon, $_POST['methodpay']); // New field for payment method
    $p_data = generatePData(); // Generate unique p_data
    $address = ''; // Placeholder for address, to be determined based on the selected method

    // Retrieve address based on the selected method
    switch ($method) {
        case "BitcoinPayment":
            $address = "1JgyDtMscx6PWGRDqkZzVRgemzceNX7V1t"; // Replace with the actual BTC address
            break;
        case "LitcoinPayment":
            $address = "LaWa2RJGyUW18XqGgPdid37NqEq9Z55UVE"; // Replace with the actual LTC address
            break;
        case "USDCPayment":
            $address = "0xa749950593bd3db23805895be92d132ce4233ae0"; // Replace with the actual LTC address
            break;
        case "EtherPayment":
            $address = "0xa749950593bd3db23805895be92d132ce4233ae0"; // Replace with the actual LTC address
            break;
        case "XrpPayment":
            $address = "rJn2zAPdFA193sixJwuFixRkYDUtx3apQh"; // Replace with the actual LTC address
            break;
        case "UsdtPayment":
            $address = "TRDjzfoJVcweo5NcL6ubZvvi2UJ4phBTwY"; // Replace with the actual LTC address
            break;
        case "UsdtbscchainPayment":
            $address = "0xa749950593bd3db23805895be92d132ce4233ae0"; // Replace with the actual LTC address
            break;
        case "BinancePayment":
            $address = "0xa749950593bd3db23805895be92d132ce4233ae0"; // Replace with the actual USDT address
            break;
        default:
            // Handle other payment methods
    }

    // Store payment details in the database
    $paymentStored = storePayment($user, $amount, $method, $p_data, $address);

    if ($paymentStored) {
        // Redirect user to payment success page
        header("Location: bitcoin.php?address=" . urlencode($address) . "&p_data=" . urlencode($p_data));
        exit();
    } else {
        echo "Error storing payment details.";
    }
}
?><?php
// Query to select payment history for the current user
$query = "SELECT * FROM payment WHERE user = '$userId'";
$result = mysqli_query($dbcon, $query);
?>
