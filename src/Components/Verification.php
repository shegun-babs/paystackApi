<?php

namespace ShegunBabs\PayStack\Components;

use ShegunBabs\PayStack\HttpQuery;

class Verification extends HttpQuery
{

    /**
     * Resolve BVN
     * @param string $bvn
     * @return array
     */
    public function resolveBVN(string $bvn) : array //GET
    {
        $url = "bank/resolve_bvn/$bvn";
        return $this->get($url);
    }


    /**
     * @param array $params
     * @return array
     */
    public function resolveAccountNumber(array $params) : array//GET
    {
        $url = 'bank/resolve';
        return $this->params($params)->post($url);
    }


    /**
     * @param $bin
     * @return array
     */
    public function resolveCardBin($bin) : array//GET
    {
        $url = "decision/bin/$bin";
        return $this->get($url);
    }
}