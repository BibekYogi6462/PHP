<?php

class BankAccount {
    public $accountNumber;
    public $accountHolder;
    public $balance;

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
}

// Create an instance of the BankAccount class
$user = new BankAccount(1235466, "Bibek", 5000);

// Perform deposit and withdrawal operations
$user->deposit(100);  
$user->withdraw(1000);

// Display account information
$user->displayInfo();

?>




<!-- Write a program to create a parent class "Shape" with the method getArea(). Extend this class into two child classes Rectangle and Circle.
The Rectangle class should calculate the area using length and width. The circle class should caluclate the area using radius. Create object of both classes , set therir properties and display their areas. -->