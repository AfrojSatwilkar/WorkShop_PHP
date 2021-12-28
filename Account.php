<?php
include 'BankAccount.php';
/**
 * @author Afroj Satwilkar
 * @version PHP 8.1.0
 */
class Account implements BankAccount
{
    protected $account;

    public function __construct()
    {
        $this->account = [];
    }

    /**
     * balanceInquiry method is used to get balance 
     * @param accountNumber name
     * @return integer
     */
    public function balanceInquiry($accountNumber, $name)
    {
        foreach ($this->account as $key => $values) {
            if ($accountNumber == $key) {
                foreach ($values as $balance) {
                    return $balance;
                }
            } else {
                echo "Account Not found \n";
            }
        }
    }

    /**
     * withdraw method is used to withdraw money
     * @param accountNumber
     * @param name
     * @param amount
     */
    public function withdraw($accountNumber, $name, $amount)
    {
        if(array_key_exists($accountNumber, $this->account) && array_key_exists($name, $this->account[$accountNumber])) {
            $balance = $this->balanceInquiry($accountNumber, $name);
            if($balance >= 1000  && $balance >= $amount) {
                $this->account[$accountNumber][$name] = $balance - $amount;
                echo "Balance : " . $this->balanceInquiry($accountNumber, $name) . "\n";
            } else {
                throw new Exception("Not sufficient balance\n");
            }
            
        } else {
            throw new Exception("Invalid Account Number\n");
        }
    }

    /**
     * deposit method is used to deposit money in account
     * @param accountNumber
     * @param name
     * @param amount
     */
    public function deposit($accountNumber, $name, $amount)
    {
        if(array_key_exists($accountNumber, $this->account) && array_key_exists($name, $this->account[$accountNumber])) {
            $this->account[$accountNumber][$name] = $this->balanceInquiry($accountNumber, $name) + $amount;
        } else {
            throw new Exception("Account Number not exists\n");
        }
    }

    /**
     * addAccount method is used to add new account
     * validate name : first letter should be capital
     */
    public function addAccount() {
        $accountNumber = readline("Enter Account Number : ");
        $name = readline("Enter Name : ");
        $validateName = "/^[A-Z][a-z]{2,}$/";
        if(!preg_match($validateName, $name)) {
            echo "First letter should be cap\n";
            $this->addAccount();
        } elseif(array_key_exists($accountNumber, $this->account)) {
            echo "This account number already exists\n";
        } else {
            $this->account[$accountNumber][$name] = NULL;
        }
    }
}

