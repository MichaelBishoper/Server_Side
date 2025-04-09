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

    <label>List Your Subscription Preferences:</label><br>
    <?php
    $topics = ["technology", "sports", "business", "health", "entertainment"];
    foreach ($topics as $topic) {
        $checked = in_array($topic, $preferences) ? "checked" : "";
        echo "<input name='preferences[]' type='checkbox' value='$topic' $checked> <label>" . ucfirst($topic) . "</label><br>";
    }
    ?>

    <label>List Your Subscription Plans:</label><br>
    <input type="radio" name="subscriptionPlan" value="free" id="free" <?php if ($subscriptionPlan === "free") echo "checked"; ?>>
    <label for="free">Free Plan</label><br>
    <input type="radio" name="subscriptionPlan" value="premium" id="premium" <?php if ($subscriptionPlan === "premium") echo "checked"; ?>>
    <label for="premium">Premium Plan</label>
    <br>

    <label for="contactMethod">Preferred Contact Method:</label>
    <select name="contactMethod">
      <option value="Email" <?php if ($contactMethod === "Email") echo "selected"; ?>>Email</option>
      <option value="SMS" <?php if ($contactMethod === "SMS") echo "selected"; ?>>SMS</option>
      <option value="Email & SMS" <?php if ($contactMethod === "Email & SMS") echo "selected"; ?>>Email & SMS</option>
    </select>
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
