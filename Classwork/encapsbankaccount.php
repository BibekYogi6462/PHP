<?php

class BankAccount {
    public $accountNumber;
    public $accountHolder;
    private $balance;

    public function __construct($accountNumber, $accountHolder, $balance) {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        } else {
            echo "Deposit amount must be greater than 0.<br>";
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        } else if ($amount <= 0) {
            echo "Withdrawal amount must be greater than 0.<br>";
        } else {
            echo "Insufficient balance.<br>";
        }
    }

    public function displayInfo() {
        echo "Account Holder: " . $this->accountHolder . "<br>";
        echo "Account Number: " . $this->accountNumber . "<br>";
        echo "Balance: " . $this->balance . "<br>";
    }

    public function getBalance() {
      return $this->balance;
    }
}

$user = new BankAccount(12345, "Bibek", 100);

$user->deposit(1000);  
$user->withdraw(1000);

$user->displayInfo();

echo $user->getBalance();

?>
1`2-