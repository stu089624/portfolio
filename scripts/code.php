<?php
$secretCode = "123"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $enteredCode = $_POST["code"];
    
    if ($enteredCode === $secretCode) {
        echo "success";
    } else {
        echo "failure";
    }
}
?>
