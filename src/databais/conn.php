<?php
    $host = 'localhost';
    $dbname = 'bank';
    $username = 'root';
    $password = '';
           
    try {
        $conn = "mysql:host=".$host.";dbname=".$dbname;
        $pdo = new PDO($conn,$username,$password);
        

    } catch (PDOException $e) {
        
        echo "connection failed";

    }



    include_once('../class/account.php');
    include_once('../class/accountmanager.php');
    include_once('../class/BusinessAccount.php');
    include_once('../class/CurrentAccount.php');
    include_once('../class/SavingsAccount.php');



    if (isset($_POST['submit']) ) {
      
         $name = $_POST['accountNama'];
         $email = $_POST['email'];
         $balance = $_POST['balannce'];
         $accountType = $_POST['accountType'];
         
        
   


         if($accountType =="business"){

            $interest_rate =  $_POST['taskTransaction']  ;
            $minimum_balance =  $_POST['taskTransaction1']  ;

            $businessA = new BusinessAccount($name,$balance,$email, $interest_rate, $minimum_balance);
            AccountManager::insert($businessA);

         }else if($accountType =="current"){


            $overdraft_limit =  $_POST['overdraftLimit'] ;
            $monthlyFee =  $_POST['overdraftLimit1']  ;

            $currentA = new CurrentAccount($name,$balance,$email, $overdraft_limit, $monthlyFee);
            AccountManager::insert($currentA);

         }else if($accountType =="saving"){


            $credit_limit = $_POST['interestRate'] ;
            $transaction_fee = $_POST['interestRate1'] ;

            $savingA = new SavingsAccount($name,$balance,$email, $credit_limit, $transaction_fee);
            AccountManager::insert($savingA);

         }
        


    }

    header('Location:http://localhost/Syst%c3%a8me%20de%20Gestion%20des%20Comptes%20Bancaires/index.php');
    
    ?>

