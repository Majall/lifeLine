<?php
require 'header.php';
include 'CRUD/add_admin_process.php';

?>


<DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/add_admin.css">
        <script src="js/function.js"></script>
    </head>

    <body>
        <main>
            <br>
            <form id="create-new-account" class="signup" method="post" action="CRUD/add_admin_process.php" onsubmit="return validateForm()">
            <br>
            
                    <legend>
                        <h1>Create New Account</h1>
                    </legend>
                    <div class="first_line">
                        <div id="firstname">
                          
                            <input class="input-field" type="text" id="UserName" name="Uname" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="sec-line">
                        <div class="second">
                          
                            <input class="input-field" type="text" id="nic" name="nic" placeholder="NIC" required>
                        </div>

                        <div class="sec-line">
                            <div class="second">
                                <label for="dob">DOB:</label>
                                <br>
                                <input class="input-field" type="date" id="dob" name="dob" max="<?php echo date('Y-M-D', strtotime('-18 years')); ?>" onchange="verifyAgeOnChange()" required>
                            </div>
                        </div>

                        <div class="third-line">
                            <div class="third">
                                <label for="gender">Gender:</label>
                                <br>
                                <input type="radio" id="gender-male" name="gender" value="MALE">
                                <label for="gender-male">Male</label>
                                <input type="radio" id="gender-female" name="gender" value="FEMALE">
                                <label for="gender-female">Female</label>
                            </div>
                            <div class="third">
                               
                                <input class="input-field" type="text" id="phoneNumber" name="phone" maxlength="10" placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="fourth-line">
                            <div class="fouth">
                            
                                <input class="input-field" type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="pass">
                            <div class="seven">
                              
                                <input class="input-field" type="text" id="passkey" name="passkey" placeholder="Passkey" required>
                            </div>
                        </div>

                        <div class="seventh-line">
                            <div class="seven">
                                
                                <input class="input-field" type="password" id="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="seven">
                             
                                <input class="input-field" type="password" id="confirmPassword" name="cPassword" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <br>
                        <p>
                        <div class="eight"></div>
                        <input type="checkbox" name="terms">I agree to the Lifeline <a href="terms.php">Terms</a> & <a href="privacy.php ">Privacy Policy</a></input>
                        </p>
                        <br>
                        <div class="right">
                            <div class="reset">
                                <input class="res" type="reset" value="Reset">
                            </div>
                            <div class="reset">
                                <input class="rig" type="submit" value="Submit" onclick="return confirm('Ensure that all the provided data is accurate. Due to security reasons, editing most of the data is restricted.')">
                            </div>
                        </div>
                        <br />
                       
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
  <br>
  <br>
    </body>

    </html>

    <?php

    require 'footer.php';
    ?>