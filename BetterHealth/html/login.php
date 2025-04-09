<?php
session_start();

// Get old inputs or set defaults
$name = $_SESSION['old']['name'] ?? '';
$email = $_SESSION['old']['email'] ?? '';
$preferences = $_SESSION['old']['preferences'] ?? [];
$subscriptionPlan = $_SESSION['old']['subscriptionPlan'] ?? '';
$contactMethod = $_SESSION['old']['contactMethod'] ?? '';
$termsAgreement = $_SESSION['old']['termsAgreement'] ?? false;
$errors = $_SESSION['errors'] ?? [];

// Clear old session data after use
unset($_SESSION['old'], $_SESSION['errors']);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Nurfans</title>
</head>
<body>
  <?php if (!empty($errors)): ?>
    <ul style="color: red;">
      <?php foreach ($errors as $error): ?>
        <li><?php echo htmlspecialchars($error); ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form action="action.php" method="POST" onsubmit="return confirmSubmit()">

    <label for="name">Enter Your Full Name:</label>
    <input name="name" type="text" value="<?php echo htmlspecialchars($name); ?>">
    <br>

    <label for="email">Enter Your Email Address:</label>
    <input name="email" type="email" value="<?php echo htmlspecialchars($email); ?>">
    <br>

    <label for="email">Enter Your Password:</label>
    <input name="password" type="password" value="<?php echo htmlspecialchars($email); ?>">
    <br>



    <label for="termsAgreement">Terms & Conditions Agreement:</label>
    <input name="termsAgreement" type="checkbox" value="accepted" <?php if ($termsAgreement) echo "checked"; ?>>
    <label for="termsAgreement">Agree</label>
    <br>

    <button type="submit" name="submit" value="submit">Submit Form</button>
    <button type="reset" name="clear" value="clear">Clear Form</button>
  </form>

  <script>
    function confirmSubmit() {
      return confirm("Matte Kudasai! Are you sure you want to submit?");
    }
  </script>
</body>
</html>