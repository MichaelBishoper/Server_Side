<!DOCTYPE html>
<html>
    <head>
        <title> Nurfans </title>
    </head>
    <body>
        <form action="Action.php" method="POST" onsubmit="return confirmSubmit()">

            <!-- Name : Text -->
            <label for="name"> Enter Your Full Name: </label>
            <input name="name" type="text" value="<?php $_POST["name"] ?? ""; ?>"> 
            <br>

            <!-- Email : Email -->
            <label for="email"> Enter Your Email Address: </label>
            <input name="email" type="email" value="<?php $email; ?>"> <!-- Test -->
            <br>

            <!-- Subscription Preferences : Checkbox -->
            <label for="subscriptionPreference"> List Your Subscription Preferences: </label>
            
            <input name="preferences[]" type="checkbox" value="technology" <?php if (!empty($Preferences) && in_array("technology", $Preferences)) echo "checked"; ?>>
            <label> Technology </label>
            
            <input name="preferences[]" type="checkbox" value="sports" <?php if (!empty($Preferences) && in_array("sports", $Preferences)) echo "checked"; ?>>
            <label> Sports </label>
            
            <input name="preferences[]" type="checkbox" value="business" <?php if (!empty($Preferences) && in_array("business", $Preferences)) echo "checked"; ?>>
            <label> Business </label>
            
            <input name="preferences[]" type="checkbox" value="health" <?php if (!empty($Preferences) && in_array("health", $Preferences)) echo "checked"; ?>>
            <label> Health & Wellness </label>
            
            <input name="preferences[]" type="checkbox" value="entertainment" <?php if (!empty($Preferences) && in_array("entertainment", $Preferences)) echo "checked"; ?>>
            <label> Entertainment </label>
            <br>

            <!-- Subscription Plan : Radio -->
            <label> List Your Subscription Plans: </label> <br>
            <input type="radio" name="subscriptionPlan[]" value="free" id="free">
            <label for="free">Free Plan</label><br>
            <input type="radio" name="subscriptionPlan[]" value="premium" id="premium">
            <label for="premium">Premium Plan</label>
            <br>

            <!-- Contact Method : Dropdown -->
            <label for="contactMethod"> Prefrred Contact Method: </label>
            <select name="contactMethod"> 
                <option name="emailOption"> Email </option>
                <option name="smsOption"> SMS </option>
                <option name="bothOption"> Email & SMS </option>
            </select> 
            <br>

            <!-- Terms & Conditions : Checkbox -->
            <label for="termsAgreement"> Terms & Conditions Agreement: </label>
            <label for="termsAgreement"> Agree </label>
            <input name="termsAgreement" type="checkbox" value="accepted">
            <br>

            <!-- Submit and Clear Buttons -->
            <button type="submit" name="submit" value="submit"> Submit Form </button>
            <button type="reset" name="clear" value="clear"> Clear Form </button>

        </form>
        
            <script>
            function confirmSubmit() {
                return confirm("Matte Kudasai! Are you sure you want to submit?");
            }
            </script>

    </body>
</html>

<!-- ADD STICKY FIELDs -->