<?php

namespace ShegunBabs\PayStack;

use Symfony\Component\DependencyInjection\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->register('transaction', 'Transaction');
$containerBuilder->addMethodCall('withConfig', ['secretkey']);