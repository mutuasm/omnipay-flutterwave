<?php

namespace Omnipay\Flutterwave\Message;

use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

abstract class AbstractResponse extends BaseAbstractResponse implements
    RedirectResponseInterface
{
    /**
     * Returns true if the transaction is successful and complete.
     *
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return false;
    }
}