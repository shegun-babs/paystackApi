<?php

namespace ShegunBabs\PayStack;

use ShegunBabs\PayStack\Transaction;

class PayStack
{

    public $transaction;

    public function __construct($secret)
    {
        $this->transaction = Transaction::withConfig($secret);
    }
}