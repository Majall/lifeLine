<?php
include 'dbh.crud.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])){
    $AdminID = $_SESSION['userID'];

    $conn->query("SET FOREIGN_KEY_CHECKS=0");

    $delete_query = "DELETE FROM admin WHERE Admin_id='$AdminID'";
    
    if($conn->query($delete_query)===TRUE){
        echo '<script>';
        echo 'alert("Record Deleted Successfully !!");';
        echo '</script>';
        header("Location: ./logout.php");
    }else{
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    $conn->close();
   
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $AdminID = $_SESSION['userID'];
    $Email = $_POST["email"];
    $Phone = $_POST["number"];


    $sql = "UPDATE admin SET Email='$Email', Phone_no='$Phone' WHERE Admin_id = $AdminID  ";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Record Updated Successfully !!");';
        echo 'window.location.href = "./admin_panel.php";';
        echo '</script>';
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function validatePassword($Password)
{
     return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $Password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change'])) {


    $AdminID = $_SESSION['userID'];
    $Password = $_POST["password"];
    $cPassword = $_POST["cPassword"];

    if (!validatePassword($Password)) {
        die("Password must contain at least 8 characters including one uppercase letter, one special character, and one digit.");
    }

    if ($Password !== $cPassword) {
        die("Passwords do not match.");
    }

    $sql = "UPDATE admin SET A_Password='$Password' WHERE Admin_id='$AdminID'";

    if ($conn->query($sql) === TRUE) {  
        echo '<script>';
        echo 'alert("Record Updated Successfully !!");';
        echo '</script>';
        header("Location: ./admin_panel.php");
        die();

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
