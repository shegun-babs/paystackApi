<?php

namespace ShegunBabs\PayStack\Init;


use ShegunBabs\PayStack\Components\Transaction;

/**
 * @method initialize(array $params)
 * @method verify(string $transaction_ref)
 *
 *
 *
 */

class Boot
{

    private $component_name;
    private $component_argument;


    public function __construct($name, $obj)
    {
        $this->component_name = $name;
        $this->component_argument = $obj;
    }


    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        $componentNamespace = "ShegunBabs\\PayStack\\Components\\";
        $classMethod = $method;
        $methodArgument = $args[0];
        $secret = $this->component_argument->key;
        $fullClass = $componentNamespace.ucfirst($this->component_name);


        // Call the ComponentClass::withConfig($secret)
        $calledObject = call_user_func_array([$fullClass, 'withConfig'], [$secret]);

        // Call ComponentClass->$classMethod($methodArgument)
        return call_user_func_array([$calledObject, $classMethod], [$methodArgument]);
    }


    private function createInstance($class, $params)
    {
        $reflectionClass = new ReflectionClass($class);
        return $reflectionClass->newInstanceArgs($params);
    }
}
