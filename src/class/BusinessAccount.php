





<?php
include_once(__DIR__ . '/account.php');
class BusinessAccount extends Account{
private $cridit_limite;
private $transaction_fee;

public function __construct($accT, $Bal,$email,$CriLi,$TranFee) {
    $this->cridit_limite=$CriLi;
    $this->transaction_fee=$TranFee;
    parent::__construct($accT,$Bal,$email);
}
public function getCriditLimite(){
    return $this->cridit_limite;
}
public function getTransactionFee(){
    return $this->transaction_fee;
}


}

?>