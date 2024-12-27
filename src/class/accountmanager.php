<?php
include '../databais/conn.php';
include_once(__DIR__ . '/account.php');

class AccountManager {
    public static function insert(Account $acc) {
        global $pdo;
        
            $sql = "INSERT INTO `customer` (`_name`, `email`, `balance`) VALUES (:name, :email, :balance)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "name" => $acc->getTitulaireDuCompte(),
                "email" => $acc->getEmail(),
                "balance" => $acc->getBalance()
            ]);
            $lastId = $pdo->lastInsertId();
            // echo "Customer inserted with ID: $lastId<br>";
    
            if ($acc instanceof CurrentAccount) {
                $sql = "INSERT INTO `currentaccount` (`customer_id`, `overdraft_limit`, `monthlyFee`) VALUES (:id, :overdraft_limit, :monthlyFee)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "id" => $lastId,
                    "overdraft_limit" => $acc->getOverdraftLimit(),
                    "monthlyFee" => $acc->getMonthlyFee()
                ]);
                // echo "Current account details inserted.<br>";
            } else if ($acc instanceof BusinessAccount) {
                $sql = "INSERT INTO `businessaccount` (`customer_id`, `credit_limit`, `transaction_fee`) VALUES (:id, :credit_limit, :transaction_fee)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "id" => $lastId,
                    "credit_limit" => $acc->getCriditLimite(),
                    "transaction_fee" => $acc->getTransactionFee()
                ]);
                // echo "Business account details inserted.<br>";
            } else if ($acc instanceof SavingsAccount) {
                $sql = "INSERT INTO `savingsaccount` (`customer_id`, `interest_rate`, `minimum_balance`) VALUES (:id, :interest_rate, :minimum_balance)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "id" => $lastId,
                    "interest_rate" => $acc->getInterstRate(),
                    "minimum_balance" => $acc->getMinBalance()
                ]);
                // echo "Savings account details inserted.<br>";
            }




            // switch ($this->accountType) {
            //                 case 'savings':
            //                     $sql = "INSERT INTO `savingsaccount` (`customer_id`, `interest_rate`, `minimum_balance`) VALUES (:id, :interest_rate, :minimum_balance)";
            //                     $stmt = $pdo->prepare($sql);
            //                     $stmt->execute([
            //                         "id" => $lastId,
            //                         "interest_rate" => $acc->getInterstRate(),
            //                         "minimum_balance" => $acc->getMinBalance()
            //                     ]);
            //                     break;
                
            //                 case 'current':
            //                     $sql = "INSERT INTO `currentaccount` (`customer_id`, `overdraft_limit`, `monthlyFee`) VALUES (:id, :overdraft_limit, :monthlyFee)";
            //                     $stmt = $pdo->prepare($sql);
            //                     $stmt->execute([
            //                         "id" => $lastId,
            //                         "overdraft_limit" => $acc->getOverdraftLimit(),
            //                         "monthlyFee" => $acc->getMonthlyFee()
            //                     ]);
            //                     break;
                
            //                 case 'business':
            //                     $sql = "INSERT INTO `businessaccount` (`customer_id`, `credit_limit`, `transaction_fee`) VALUES (:id, :credit_limit, :transaction_fee)";
            //                     $stmt = $pdo->prepare($sql);
            //                     $stmt->execute([
            //                         "id" => $lastId,
            //                         "credit_limit" => $acc->getCriditLimite(),
            //                         "transaction_fee" => $acc->getTransactionFee()
            //                     ]);
            //                     break;
            //             }
                
        
    }
    
    public static function select($tabelNAme) {
        global $pdo;
        $sql = "SELECT * FROM customer JOIN $tabelNAme ON customer.customer_id=$tabelNAme.customer_id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>