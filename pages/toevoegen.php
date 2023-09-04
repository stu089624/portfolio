<?php
include_once 'config.inc.php'; // Include the database configuration file 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/toevoegen.css">
    <title>Document</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
        <label for="titel">Titel:</label>
        <input type="text" id="titel" name="titel" required><br><br>

        <label for="beschrijving">Beschrijving:</label><br>
        <textarea id="beschrijving" name="beschrijving" rows="4" cols="50" required></textarea><br><br>

        <label for="datum">Datum:</label>
        <input type="date" id="datum" name="datum" required><br><br>

        <label for="afbeelding">Afbeelding:</label>
        <input type="file" id="afbeelding" name="afbeelding" accept="image/*" required><br><br>

        <input type="submit" name="submit" value="Toevoegen">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verwerk hier de POST-gegevens
        $titel = $_POST["titel"];
        $beschrijving = $_POST["beschrijving"];
        $datum = $_POST["datum"];

        // Verwerk de afbeelding upload hier

        // Voeg hier je verdere PHP-verwerking toe
    }
    ?>
</body>
</html>