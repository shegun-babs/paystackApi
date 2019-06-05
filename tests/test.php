<?php

require_once __DIR__. "/../vendor/autoload.php";

use ShegunBabs\PayStack\PayStack;



function testVerify()
{
    $paystack = new PayStack('sk_test_d679849ab94260b37321848d3a673f5e29b97a38');
    $username = 'shegun';
    $params = [
        'email' => 'test@example.com',
        'amount' => 4902,
    ];
    return $paystack->transaction->verify('7uwyctyyyww');
}

function testInitialize()
{
    $paystack = new PayStack('sk_test_d679849ab94260b37321848d3a673f5e29b97a38');

    $payload = [
        'email' => 'shegun.babs@gmail.com',
        'amount' => 3000,
        'channels' => 'card',
    ];
    
    $res = $paystack->transaction->initialize($payload);
    
    return $res;
}





dump(testInitialize());
