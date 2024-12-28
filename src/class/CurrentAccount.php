

<?php
include_once(__DIR__  . '/account.php');

class CurrentAccount extends Account{
private $overdraft_limit;
private $monthly_fee;

public function __construct($accT, $Bal,$email,$overDraftLimit,$Month_fee) {
    $this->overdraft_limit=$overDraftLimit;
    $this->monthly_fee=$Month_fee;
    parent::__construct($accT,$Bal,$email);
}

public function getOverdraftLimit(){
    return $this->overdraft_limit;
}
public function getMonthlyFee(){
    return $this->monthly_fee;
}

}
?>