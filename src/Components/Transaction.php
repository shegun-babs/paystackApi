<?php

namespace ShegunBabs\PayStack\Components;

use ShegunBabs\PayStack\HttpQuery;

class Transaction extends HttpQuery
{

    public function initialize(array $params)
    {
        $url = 'transaction/initialize';
        return $this->params($params)->post($url);
    }


    public function verify($transaction_ref)
    {
        $url = "transaction/verify/$transaction_ref";
        return $this->get($url);
    }
}