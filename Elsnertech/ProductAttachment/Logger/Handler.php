<?php

namespace Elsnertech\ProductAttachment\Logger;

use Magento\Framework\Logger\Handler\Base;


class Handler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/elsnertech_productattachment.log';

    /**
     * @var int
     */
    protected $loggerType = \Monolog\Logger::INFO;
}
