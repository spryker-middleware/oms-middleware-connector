<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
