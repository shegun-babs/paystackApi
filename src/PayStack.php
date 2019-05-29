<?php

namespace ShegunBabs\PayStack;

use ShegunBabs\PayStack\Transaction;

class PayStack
{

    public $transaction;


    /**
     * @method \ShegunBabs\PayStack\Transaction initialize()
     * @method \ShegunBabs\PayStack\Transaction verify()
     * 
     */

    public function __construct($secret)
    {
        $this->transaction = Transaction::withConfig($secret);
    }
}