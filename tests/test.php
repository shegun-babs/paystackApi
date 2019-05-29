<?php

require_once __DIR__. "/../vendor/autoload.php";

use ShegunBabs\PayStack\PayStack;

$paystack = new PayStack('sk_test_d679849ab94260b37321848d3a673f5e29b97a38');

print_r($paystack->transaction->verify('FQjuyyuusss'));