<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecten</title>
    <link rel="stylesheet" href="../style/display.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../scripts/code.js"></script>
</head>
<body>
<div class="navigation">

            <div class="navbar">
                <a href="../index.html">Home</a>
                <a class="active">Projects</a>
                <a href="../pages/about.html">About</a>
                <a href="../pages/contact.html">Contact</a>
              </div>
        </div>

        <h1>Mijn Projecten <span id="codeButton">+</span></h1>
        
    <div class="kaarten-container">
        <?php

        include_once '../config/config.inc.php'; 

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM items";
            $stmt = $pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="kaart">';
                echo '<img src="' . $row["afbeelding"] . '" alt="Afbeelding">';
                echo '<div class="kaart-titel">' . $row["titel"] . '</div>';
                echo '<div class="kaart-beschrijving">' . $row["beschrijving"] . '</div>';
                echo '<div class="kaart-datum">' . $row["datum"] . '</div>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        $pdo = null;
        ?>
    </div>
</body>
</html>
