<?php

namespace ShegunBabs\PayStack;

use ShegunBabs\PayStack\Components\Transaction;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use ShegunBabs\PayStack\Init\Boot;

/**
 *
 * @property array|Boot transaction
 * @property array|Boot verification
 *
 */
class PayStack
{

    //public $transaction;


    public $key;

    /**
     * PayStack constructor.
     * @param $secret
     */
    public function __construct($secret)
    {
        //$this->transaction = Transaction::withConfig($secret);
        $this->key = $secret;
        $params = [];
        $this->transaction->initialize($params);
    }


    //@TODO auto invoke method by searching Component class methods
    public function __call($method, $args)
    {
        $this->{$method} = $args;
        print_r($this->{$method});
    }


    public function __get($name)
    {
        return new Boot($name, $this);
    }
}