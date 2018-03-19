<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader;

use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToSalesFacadeBridgeInterface;

class OrderReader implements OrderReaderInterface
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
     * @param int $idSalesOrder
     *
     * @return array
     */
    public function readOrder(int $idSalesOrder): array
    {
        return $this->salesFacade
            ->getOrderByIdSalesOrder($idSalesOrder)
            ->toArray();
    }
}
