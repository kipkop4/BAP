<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="beheren.css">
    <title>beheren</title>
</head>
<body>


<?php


// 1. Connectie maken met de DB
$dbc = mysqli_connect('localhost', 'thomas_gebruiker', '123456', 'thomas_db') or die('error connecting');


// 2. kijken in de database en alle mailadressen tevoorschijn halen
$query = "SELECT * FROM nieuwsbrief";
$result = mysqli_query($dbc,$query) or die ('Error querying');

echo '<table>' ;


// 3. Loop waarin  alle mailadressen in beeld worden gebracht
while ($row = mysqli_fetch_array($result)) {


    $id = $row['id'];
    $voornaam = $row['voornaam'];
    $tussenvoegsel = $row['tussenvoegsel'];
    $achternaam = $row['achternaam'];
    $mailadres = $row['mailadres'];



    echo '<tr>';
    echo "<td>$id</td><td>$voornaam</td><td>$tussenvoegsel</td><td>$achternaam</td><td>$mailadres</td>";
    echo '<td>';
    echo '<a href="delete.php?id=' . $id . '">DELETE</a>';
    echo '</td>';
    echo '<td>';
    echo '<a href="edit.php?id=' . $id . '&voornaam=' . $voornaam . '&tussenvoegsel=' . $tussenvoegsel . '&achternaam=' . $achternaam . '&mailadres=' . $mailadres . '">EDIT</a>';
    echo '</td>';
    echo '</tr>';

}

echo '</table>';


?>


</body>
</html>