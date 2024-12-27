<?php

    include '../databais/conn.php';
    
abstract class Account {
    protected $AccountNumber;
    protected $TitulaireDuCompte;
    protected $balance;
    protected $email;

    public function __construct($TitulaireDuCompte, $Bal,$email) {
        $this->TitulaireDuCompte = $TitulaireDuCompte;
        $this->balance = $Bal;
        $this->email = $email;
    }

 
    public function getAccountNumber() {
        return $this->AccountNumber;
    }

    public function getTitulaireDuCompte() {
        return $this->TitulaireDuCompte;
    }

    public function getBalance() {
        return $this->balance;
    }
    public function getEmail() {
        return $this->email;
    }
}



// header("Location: Système de Gestion des Comptes Bancaires/src/class/accountmanager.php");
// exit()

?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--     
    
    
    
    
    
    
    
    
    
    
    
    // class Account
    // {
    
    //     protected $accountID;
    //     protected $accountNAME;
    //     protected $accountEMAIL;
    //     protected $balance;
    
    //     public function __construct( $accountNAME, $accountEMAIL, $balance)
    //     {
    
    //         $this->accountNAME = $accountNAME;
    //         $this->accountEMAIL = $accountEMAIL;
    //         $this->balance = $balance;
    //     }
    
        
        
        
        
        
    
    
        
    // }    





// public function getAccountID()
// {
//     return $this->accountID;
// }

// public function setAccountID($accountID)
// {
//     $this->accountID = $accountID;
// }

// public function getAccountNAME()
// {
//     return $this->accountNAME;
// }

// public function setAccountNAME($accountNAME)
// {
//     $this->accountNAME = $accountNAME;
// }

// public function getAccountEMAIL()
// {
//     return $this->accountEMAIL;
// }

// public function setAccountEMAIL($accountEMAIL)
// {
//     $this->accountEMAIL = $accountEMAIL;
// }

// public function getBalance()
// {
//     return $this->balance;
// }

// public function setBalance($balance)
// {
//     $this->balance = $balance;
// }




// public function insert()
// {
//     try {
   
//         $this->pdo->beginTransaction();

     
//         $query = "INSERT INTO account (accountNumber, holderName, balance) VALUES (:accountNumber, :holderName, :balance)";
//         $stmt = $this->pdo->prepare($query);
//         $stmt->bindParam(':accountNumber', $this->accountNumber);
//         $stmt->bindParam(':holderName', $this->holderName);
//         $stmt->bindParam(':balance', $this->balance);

//         if (!$stmt->execute()) {
//             $this->pdo->rollBack();
//             return false;
//         }

//         $this->accountID = $this->pdo->lastInsertId(); 

        
//         switch ($this->accountType) {
//             case 'savings':
//                 $query = "INSERT INTO savingAccount (savingAccountID, interestRate) VALUES (:accountId, :rate)";
//                 $stmt = $this->pdo->prepare($query);
//                 $stmt->bindParam(':accountId', $this->accountID);
//                 $stmt->bindParam(':rate', $this->interestRate);
//                 break;

//             case 'current':
//                 $query = "INSERT INTO currentAccount (overdraftLimit, accountID) VALUES (:accountId, :overdraftLimit)";
//                 $stmt = $this->pdo->prepare($query);
//                 $stmt->bindParam(':accountId', $this->accountID);
//                 $stmt->bindParam(':overdraftLimit', $this->overdraftLimit);
//                 break;

//             case 'business':
//                 $query = "INSERT INTO businessAccount (account_id, task) VALUES (:accountId, :task)";
//                 $stmt = $this->pdo->prepare($query);
//                 $stmt->bindParam(':accountId', $this->accountID);
//                 $stmt->bindParam(':task', $this->taskTransaction);
//                 break;
//         }

       
//         if (!$stmt->execute()) {
//             $this->pdo->rollBack();
//             return false;
//         }

    
//         $this->pdo->commit();
//         return true;

//     } catch (Exception $e) {
       
//         $this->pdo->rollBack();
    
//         error_log($e->getMessage());
//         return false;
//     }
// } -->