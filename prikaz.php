<?php 
    if(!isset($_SESSION)) session_start();
    if($_SESSION["student"] != "")
    {        
        $dao = new DAO();
        $student = $dao-> getStudent($_SESSION["student"]);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Indeks</th>
        </tr>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['ime'] ?></td>
            <td><?= $student['prezime'] ?></td>
            <td><?= $student['indeks'] ?></td>
            <a href="controller.php?action=logout"> LOGOUT</a>
        </tr>
    </table>
    
</body>
</html>
    <?php }
    else{
        header('location:index.php');
    }
    ?>