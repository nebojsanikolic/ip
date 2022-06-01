<?php 
$msg = isset($msg)?($msg):"";
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
    <div class="container mt-5">
    <form action="controller.php" method="POST">
        ID:<br>
        <input type="number" name="id"><br>
        Ime: <br>
        <input type="text" name="ime"><br>
        Prezime :<br>
        <input type="text" name="prezime"><br>
        Indeks : <br>
        <input type="text" name="indeks"><br><br>
        <input class="btn-success" type="submit" name="action" value="update">
        <?= $msg ?>
        </div>
    </form>
</body>
</html>