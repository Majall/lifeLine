<?php
include 'header.php';
include 'CRUD/hospital_signup_process.php';
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/hospital_signup.css" />
</head>

<body>

  <main>
    <form class="signup" method="post" action="CRUD/hospital_signup_process.php" onsubmit="return validateForm()">
      
        <legend class="legend">Create New Account</legend>
        <div class="first_line">
          <div class="first">
        <input class="input-field" id="name" type="text" name="name" placeholder="Hospital Name" required />
          </div>
        </div>
        <div class="second_line">
          <div class="second">
          <input class="input-field" id="tel_no" type="text" name="tel_no" placeholder="Telephone Number" maxlength="10" required />
          </div>
          <div class="second">
             <input class="input-field" id="email" type="email" name="email" placeholder="Email" required />
          </div>
        </div>
        <hr />
      
        <div class="third_line">
          <div class="third">
            <input class="input-field" id="line1" type="text" name="line1" placeholder="Address Line 1" required />
          </div>
          <div class="third">
          <input class="input-field" id="city" type="text" name="city" placeholder="City" required />
          </div>
        </div>
        <div class="fourth_line">
          <div class="fourth">
            <input class="input-field" id="postal_code" type="text" name="postal_code" placeholder="Postal Code" required />
          </div>
          <div class="fourth">
            <input class="input-field" id="country" type="text" name="country" placeholder="Country" required />
          </div>
        </div>
        <hr />
        <div class="fifth_line">
          <div class="fifth">
           <input class="input-field" id="password" type="password" name="password" placeholder="Password" required />
          </div>
          <div class="fifth">
           <input class="input-field" id="cPassword" type="password" name="cPassword" placeholder="Confirm Password" required />
          </div>
        </div>
        <hr />
        <div class="seventh-line">
          <div class="seventh">
            <input type="checkbox" name="terms" id="terms" required /><label for="terms">I agree to the Lifeline <a href="terms.php">Terms</a> & <a href="privacy.php ">Privacy Policy</a></label>
          </div>
        </div>
        <hr />
        <div class="sixth-line">
          <div class="sixth">
            <input id="reset" type="reset" name="reset" />
          </div>
          <div class="sixth">
            <input type="submit" name="submit" onclick="return confirm('Ensure that all the provided data is accurate. Due to security reasons, editing most of the data is restricted.')" />
          </div>
        </div>
      
    </form>
  </main>

  <script>
    function validateForm() {
   
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("cPassword").value;
      if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }

   
      var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (!passwordRegex.test(password)) {
        alert("Password must contain at least 8 characters including one uppercase letter, one special character, and one digit.");
        return false;
      }

     
      var termsCheckbox = document.getElementById("terms");
      if (!termsCheckbox.checked) {
        alert("Please agree to the Terms & Privacy Policy.");
        return false;
      }

      return true;
    }
  </script>
<?php
include 'footer.php';
?>
</body>

</html>
