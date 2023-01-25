<?php

namespace Omnipay\Flutterwave\Message;
use Omnipay\Flutterwave\Message\CompletePurchaseResponse;

class CompletePurchaseRequest extends AbstractRequest
{

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->httpRequest->query->all();
    }

    /**
     * @param mixed $data
     *
     * @return \Omnipay\Flutterwave\Message\CompletePurchaseResponse
     */
    public function sendData($data): CompletePurchaseResponse
    {

        $jsonData = json_encode($data);

        $httpResponse = $this->httpClient->get(
            $this->getEndpoint(),
            $this->getHeaders()
            // , $jsonData
        )->send();

        return $this->response = new CompletePurchaseResponse(
            $this,
            $httpResponse->json()
        );
    }

}