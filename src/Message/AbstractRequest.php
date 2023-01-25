<?php

namespace Omnipay\Flutterwave\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $endpoint = 'https://api.flutterwave.com/v3/payments';

    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

     /**
     * @return array
     */
    protected function getHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->getKey(),
            'Content-Type' => 'application/json',
        ];
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint();
        $jsonData = json_encode($data);
        $httpResponse = $this->httpClient->post(
            $this->getEndpoint(),
            $this->getHeaders(),
            $jsonData
        )->send();

        return $httpResponse;
    }

    protected function getEndpoint()
    {
        return $this->endpoint;
    }
}
