<?php
include_once '../config/config.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titel = $_POST["titel"];
    $beschrijving = $_POST["beschrijving"];
    $datum = $_POST["datum"];
    $uploadFile = "";

    if(isset($_FILES['afbeelding'])){
        $uploadDir = 'uploads/'; 
        $uploadFile = $uploadDir . basename($_FILES['afbeelding']['name']);

        if ($_FILES['afbeelding']['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES['afbeelding']['tmp_name'], $uploadFile)) {
                echo "Afbeelding succesvol geupload." . $uploadFile . "<br>";
            } else {
                echo "There was an error moving the uploaded image.<br>";
                echo "Er was een error met het uploaden van de afbeelding.<br>";
            }
        } else {
            echo "File upload error: " . $_FILES['afbeelding']['error'] . "<br>";
        }
    }

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO items (titel, beschrijving, datum, afbeelding) VALUES (:titel, :beschrijving, :datum, :afbeelding)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titel', $titel);
        $stmt->bindParam(':beschrijving', $beschrijving);
        $stmt->bindParam(':datum', $datum);
        $stmt->bindParam(':afbeelding', $uploadFile);

        $stmt->execute();

        echo "Data is toegevoegd aan de database.<br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }

    $pdo = null;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecten Toevoegen</title>
</head>
<body>
    <h1>Voeg projecten toe</h1>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="titel" placeholder="Titel" required><br>
        <textarea name="beschrijving" placeholder="Beschrijving" required></textarea><br>
        <input type="date" name="datum" required><br>
        <input type="file" name="afbeelding" accept="image/*" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
