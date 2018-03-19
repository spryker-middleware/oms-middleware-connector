<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use SprykerMiddleware\Shared\OmsMiddlewareConnector\OmsMiddlewareConnectorConstants;

class OmsMiddlewareConnectorConfig extends AbstractBundleConfig
{
    /**
     * @return \Spryker\Shared\Config\Config
     */
    public function getOrderExportProcessName()
    {
        return $this->get(OmsMiddlewareConnectorConstants::ORDER_EXPORT_PROCESS_NAME);
    }
}
