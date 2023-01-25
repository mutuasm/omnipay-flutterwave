<?php

namespace Omnipay\Flutterwave\Message;

use Omnipay\Flutterwave\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Exception\InvalidResponseException;

/**
 * Response
 */
class PurchaseResponse extends AbstractResponse
{

    const RESULT_SUCCESS = 'success';

    public function __construct(RequestInterface $request, array $jsonData)
    {
        $this->request = $request;
        $this->data = $jsonData;
        if (!isset($this->data['status'])) {
            throw new InvalidResponseException;
        }
    }

    public function isSuccessful()
    {
        return isset($this->data['success']);
    }

    /**
     * Returns true if the response from the gateway is successful
     *
     * @return bool
     */
    public function isRedirect(): bool
    {
        return isset($this->data['status'])
            && static::RESULT_SUCCESS === $this->data['status'];
    }

    /**
     * @return string|null
     */
    public function getMessage(): string
    {
        return $this->data['message'];
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->data['data']['link'];
    }

    /**
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * @return array
     */
    public function getRedirectData()
    {
        return $this->data;
    }

}
