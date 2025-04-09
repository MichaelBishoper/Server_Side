<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "betterhealth";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Collect form data safely
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$preferences = $_POST['preferences'] ?? [];
$subscriptionPlan = $_POST['subscriptionPlan'] ?? '';
$contactMethod = $_POST['contactMethod'] ?? '';
$termsAgreement = isset($_POST['termsAgreement']) ? 1 : 0;

$errors = [];

// Basic validation
if (empty($name)) $errors[] = "Name is required.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
if (!in_array($subscriptionPlan, ['free', 'premium'])) $errors[] = "Choose a valid subscription plan.";
$validMethods = ['Email', 'SMS', 'Email & SMS'];
if (!in_array($contactMethod, $validMethods)) $errors[] = "Choose a valid contact method.";
if (!$termsAgreement) $errors[] = "You must agree to the terms.";

// If errors, return to login.php with data
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'name' => $name,
        'email' => $email,
        'preferences' => $preferences,
        'subscriptionPlan' => $subscriptionPlan,
        'contactMethod' => $contactMethod,
        'termsAgreement' => $termsAgreement
    ];
    header("Location: login.php");
    exit;
}

// Filter valid preferences
$allowedPrefs = ['technology', 'sports', 'business', 'health', 'entertainment'];
$preferences = array_intersect($preferences, $allowedPrefs);
$preferencesStr = implode(", ", $preferences);

// Prepare and execute insert
$sql = "INSERT INTO users (fullname, email, preferences, plan, contact_method, terms_agreed) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $name, $email, $preferencesStr, $subscriptionPlan, $contactMethod, $termsAgreement);

if ($stmt->execute()) {
    echo "✅ Data saved successfully!";
} else {
    echo "❌ Failed to save data: " . $stmt->error;
}

$stmt->close();
$conn->close();
