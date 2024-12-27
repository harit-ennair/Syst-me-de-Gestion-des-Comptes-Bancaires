<!-- 
class SavingsAccount extends account
{
    protected $interestRate;



    public function __construct($name, $email, $balance, $interestRate)
    {
        
        parent::__construct($name, $email, $balance);

       
        $this->interestRate = $interestRate;
    }
} -->
<?php
include_once(__DIR__  . '/account.php');

class SavingsAccount extends Account{
private $intrest_rate;
private $minimum_balance;

public function __construct($accT, $Bal,$email,$intrstRate,$minBalanc) {
    $this->intrest_rate=$intrstRate;
    $this->minimum_balance=$minBalanc;
    parent::__construct($accT,$Bal,$email);
}

public function getInterstRate(){
    return $this->intrest_rate;
}
public function getMinBalance(){
    return $this->minimum_balance;
}

}
?>

