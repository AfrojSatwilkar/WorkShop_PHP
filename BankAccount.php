<?php
interface BankAccount {
    public function balanceInquiry($accountNumber, $name);
    public function withdraw($accountNumber, $name, $amount);
    public function deposit($accountNumber, $name, $amount);
}
?>