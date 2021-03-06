<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Stream;

use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader\OrderReader;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader\OrderReaderInterface;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToSalesFacadeBridgeInterface;

class StreamFactory implements StreamFactoryInterface
{
    /**
     * @var \SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToSalesFacadeBridgeInterface
     */
    protected $salesFacade;

    /**
     * @param \SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToSalesFacadeBridgeInterface $salesFacade
     */
    public function __construct(OmsMiddlewareConnectorToSalesFacadeBridgeInterface $salesFacade)
    {
        $this->salesFacade = $salesFacade;
    }

    /**
     * @param string $path
     *
     * @return \SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface
     */
    public function createOrderReadStream(string $path): ReadStreamInterface
    {
        return new OrderReadStream($path, $this->createOrderReader());
    }

    /**
     * @return \SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader\OrderReaderInterface
     */
    protected function createOrderReader(): OrderReaderInterface
    {
        return new OrderReader($this->salesFacade);
    }
}
