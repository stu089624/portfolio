<?php
include_once 'config.inc.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecten</title>
</head>
<body>
    
    <h1>Projecten</h1>

        <table>
            <thead>
                <th>Id</th>
                <th>Titel</th>
                <th>Beschrijving</th>
                <th>Datum</th>
                <th>Afbeelding</th>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["titel"]; ?></td>
                        <td><?php echo $row["beschrijving"]; ?></td>
                        <td><?php echo $row["datum"]; ?></td>
                        <td><?php echo $row["afbeelding"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
</body>
</html>