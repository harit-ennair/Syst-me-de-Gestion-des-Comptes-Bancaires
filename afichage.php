<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body style="background-color: rgb(246, 246, 246);">
    
    <button style="margin:20px;"  type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Secondary</button>


<?php

$host = 'localhost';
$dbname = 'bank';
$username = 'root';
$password = '';


    $conn = "mysql:host=".$host.";dbname=".$dbname;
    $pdo = new PDO($conn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


$sql = "SELECT * FROM customer
    JOIN businessaccount ON customer.customer_id = businessaccount.customer_id;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);
$sql = "SELECT * FROM customer

      JOIN currentaccount ON customer.customer_id = currentaccount.customer_id;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);
$sql = "SELECT * FROM customer
       JOIN savingsaccount ON customer.customer_id = savingsaccount.customer_id;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);


?>




</body>
</html>



