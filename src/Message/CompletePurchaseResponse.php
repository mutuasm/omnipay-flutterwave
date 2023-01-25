<?php

namespace Omnipay\Flutterwave\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class CompletePurchaseResponse extends AbstractResponse
{
    /**
     *
     */
    const RESULT_SUCCESS = 'success';

    /**
     * @param RequestInterface $request
     * @param array            $data
     */
    public function __construct(RequestInterface $request, array $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    /**
     *
     * @return bool
     */
    public function isRedirect(): bool
    {
        return false;
    }

    /**
     *
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return isset($this->data['status'])
            && static::RESULT_SUCCESS === $this->data['status'];
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return isset($this->data['message']) ?
            $this->data['message'] : null;
    }

    /**
     * @return string
     */
    public function getTransactionReference(): string
    {
        return isset($this->data['data']['tx_ref']) ?
            $this->data['data']['tx_ref'] : null;
    }
}