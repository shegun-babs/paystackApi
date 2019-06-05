<?php

namespace ShegunBabs\PayStack;

class Transaction extends HttpQuery
{

    /**
     * @method \ShegunBabs\PayStack\Transaction initialize()
     * @method \ShegunBabs\PayStack\Transaction verify()
     */

    public function initialize(array $data)
    {
        $url = 'transaction/initialize';
        return $this->params($data)->post($url);
    }


    public function verify($transaction_ref)
    {
        $url = "transaction/verify/$transaction_ref";
        return $this->get($url);
    }
}