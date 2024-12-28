<?php

$host = 'localhost';
$dbname = 'bank';
$username = 'root';
$password = '';


$conn = "mysql:host=" . $host . ";dbname=" . $dbname;
$pdo = new PDO($conn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




include_once('../class/account.php');



class DeleteAccount{
    public static function DeleteAccount($id)  {
        global $pdo;
        $sql="DELETE FROM customer WHERE customer_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "id"=>$id
        ]);
        
    }
}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    DeleteAccount::DeleteAccount($id);
}

header('location:/Système%20de%20Gestion%20des%20Comptes%20Bancaires/afichage.php');






?>
