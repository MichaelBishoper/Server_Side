<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db   = "betterhealth";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$preferences = isset($_POST['preferences']) ? implode(", ", $_POST['preferences']) : '';
$subscriptionPlan = isset($_POST['subscriptionPlan'][0]) ? $_POST['subscriptionPlan'][0] : '';
$contactMethod = $_POST['contactMethod'];
$termsAgreement = isset($_POST['termsAgreement']) ? 1 : 0;

$sql = "INSERT INTO users (fullname, email, preferences, plan, contact_method, terms_agreed) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $name, $email, $preferences, $subscriptionPlan, $contactMethod, $termsAgreement);

if ($stmt->execute()) {
    echo "Data saved!";
} else {
    echo "Failed to save data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>