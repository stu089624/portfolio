<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verwerk hier de POST-gegevens
        $titel = $_POST["titel"];
        $beschrijving = $_POST["beschrijving"];
        $datum = $_POST["datum"];
        $uploadFile = ""; // Initialize the uploadFile variable
    
        // Verwerk de afbeelding upload hier
        if(isset($_FILES['afbeelding'])){
            $uploadDir = './uploads/'; 
            $uploadFile = $uploadDir . basename($_FILES['afbeelding']['name']);
    
            if (move_uploaded_file($_FILES['afbeelding']['tmp_name'], $uploadFile)) {
                // Afbeelding is succesvol geüpload
                echo "Afbeelding is succesvol geüpload naar " . $uploadFile . "<br>";
            } else {
                echo "Er is een fout opgetreden bij het uploaden van de afbeelding.<br>";
            }
        }
    
        // Verbind met de database met behulp van PDO
        $servername = "localhost:3306";
        $username = "db089624";
        $password = "ow8_rT289";
        $dbname = "project_db";
    
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Zet PDO in de juiste modus om fouten te tonen
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Voeg gegevens toe aan de database (vervang 'items' door de daadwerkelijke tabelnaam)
            $sql = "INSERT INTO items (titel, beschrijving, datum, afbeelding) VALUES (:titel, :beschrijving, :datum, :afbeelding)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titel', $titel);
            $stmt->bindParam(':beschrijving', $beschrijving);
            $stmt->bindParam(':datum', $datum);
            $stmt->bindParam(':afbeelding', $uploadFile);
    
            $stmt->execute();
            
            echo "Gegevens zijn succesvol toegevoegd aan de database.<br>";
        } catch (PDOException $e) {
            echo "Er is een fout opgetreden bij het toevoegen van de gegevens: " . $e->getMessage() . "<br>";
        }
    
        // Sluit de databaseverbinding
        $pdo = null;
    }
    ?>
    