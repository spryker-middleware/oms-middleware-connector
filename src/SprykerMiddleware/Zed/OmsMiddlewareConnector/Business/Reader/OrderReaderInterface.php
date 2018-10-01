<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Reader;

interface OrderReaderInterface
{
    /**
     * @param int $idSalesOrder
     *
     * @return array
     */
    public function readOrder(int $idSalesOrder): array;
}
