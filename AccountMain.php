<?php
include 'Account.php';

$account = new Account();

while (true) {
    echo "1. for add new account\n2. for deposit\n3. for withdraw\n4. for balance\n0. Exit\n";
    $userInput = readline();

    switch ($userInput) {
        case 1 :
            $account->addAccount();
            break;
        case 2 :
            try {
                $accountNumber = readline("Enter account number : ");
                $name = readline("Enter name : ");
                $amount = readline("Amount : ");
                $account->deposit($accountNumber, $name, $amount);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            break;
        case 3 :
            try {
                $accountNumber = readline("Enter account number : ");
                $name = readline("Enter name : ");
                $amount = readline("Amount : ");
                $account->withdraw($accountNumber, $name, $amount);
            } catch(Exception $ex) {
                echo $ex->getMessage();
            }
            break;
        case 4 :
            $accountNumber = readline("Enter account number : ");
            $name = readline("Enter name : ");
            $balance = $account->balanceInquiry($accountNumber, $name);
            echo "Balance : " . $balance . "\n";
            break;
        case 0 :
            exit();
            break;
        default :
            echo "Invalid Input\n";
            break;
    }
}

?>