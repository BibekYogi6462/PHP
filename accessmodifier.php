<?php
  class BankAccount{
    private $balance;
  

  public function deposit($amount)
  {
    $this->balance += $amount;
  }

  public function withdraw($amount)
  {
    if($amount <= $this->balance)
    {
      $this->balance -= $amount;
      return true;
    }
    return false;
  } 
  
  protected function getBalance()
  {
    return $this->balance;
  }

}

$account = new BankAccount();
$account -> deposit(1000);   
$account -> withdraw(500);
//$account->balance; error: balance is private
//$account->getBalance(); balance id protected


?>