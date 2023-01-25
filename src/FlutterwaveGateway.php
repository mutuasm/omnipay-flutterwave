<?php

namespace Omnipay\Flutterwave;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Flutterwave\Message\CompletePurchaseRequest;
use Omnipay\Flutterwave\Message\PurchaseRequest;
use Omnipay\Flutterwave\Traits\GatewayParamsTrait;

/**
 * Flutterwave Gateway
 */
class FlutterwaveGateway extends AbstractGateway
{

    public function getName(): string
    {
        return 'Flutterwave';
    }

    
    /**
     * Get gateway short name
     *
     * This name can be used with GatewayFactory as an alias of the gateway class,
     * to create new instances of this gateway.
     */
    public function getShortName()
    {
        return 'flutterwave';
    }


    public function getDefaultParameters() : array
    {
        return [
            'key' => '',
        ];
    }

    /**
     * completePuchase function to be called on provider's callback
     *
     * @param array $options
     * @return \Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $options = []): RequestInterface
    {
        $options = array_merge($this->getParameters(), $options);

        return $this->createRequest(
            CompletePurchaseRequest::class,
            $options
        );
    }

    /**
     * purchase function to be called to initiate a purchase
     *
     * @param  array $parameters
     * @return RequestInterface
     */
    public function purchase(array $options = []): RequestInterface
    {
        $options = array_merge($this->getParameters(), $options);

        return $this->createRequest(
            PurchaseRequest::class,
            $options
        );
    }

}
