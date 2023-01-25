<?php
namespace Omnipay\Flutterwave\Message;
use Omnipay\Flutterwave\Message\PurchaseResponse;
/**
 * Purchase Request
 *
 * @method Response send()
 */
class PurchaseRequest extends AbstractRequest
{
    
    public function getData()
    {       
        $data = $this->getParameters();
        return $data;
    }

    /**
     * @param array $data
     *
     * @return \Omnipay\Flutterwave\Message\PurchaseResponse
     */
    public function sendData($data): PurchaseResponse
    {
        $httpResponse = parent::sendData($data);

        return $this->response = new PurchaseResponse(
            $this,
            $httpResponse->json()
        );
    }
}
