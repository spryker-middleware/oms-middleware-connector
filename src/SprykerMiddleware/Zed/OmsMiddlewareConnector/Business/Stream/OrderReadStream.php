<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Stream;

use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader\OrderReaderInterface;

class OrderReadStream implements ReadStreamInterface
{
    /**
     * @var \SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader\OrderReaderInterface
     */
    protected $orderReader;

    /**
     * @var string
     */
    protected $orderIdsString;

    /**
     * @var string[]
     */
    protected $idSalesOrderList;

    /**
     * @var int
     */
    protected $position;

    /**
     * @param string $orderIdsString
     * @param \SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader\OrderReaderInterface $orderReader
     */
    public function __construct(string $orderIdsString, OrderReaderInterface $orderReader)
    {
        $this->orderIdsString = $orderIdsString;
        $this->orderReader = $orderReader;
    }

    /**
     * @return mixed
     */
    public function read()
    {
        return $this->orderReader
            ->readOrder($this->idSalesOrderList[$this->position++]);
    }

    /**
     * @return bool
     */
    public function open(): bool
    {
        $this->idSalesOrderList = explode(' ', $this->orderIdsString);
        $this->position = 0;

        return true;
    }

    /**
     * @return bool
     */
    public function close(): bool
    {
        return true;
    }

    /**
     * @param int $offset
     * @param int $whence
     *
     * @return int
     */
    public function seek(int $offset, int $whence): int
    {
        return -1;
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return $this->position >= count($this->idSalesOrderList);
    }
}
