<?php

namespace Omnipay\Flutterwave\Traits;

/**
 * Parameters that can be set at the gateway class, and so
 * must also be available at the request message class.
 */
trait GatewayParamsTrait
{

    /**
     * @param $value
     *
     * @return mixed
     */
    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->getParameter('key');
    }
}