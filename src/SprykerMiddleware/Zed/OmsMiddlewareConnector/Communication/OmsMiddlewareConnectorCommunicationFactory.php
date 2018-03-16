<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Communication;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToProcessFacadeBridgeInterface;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\OmsMiddlewareConnectorDependencyProvider;

/**
 * @method \SprykerMiddleware\Zed\OmsMiddlewareConnector\OmsMiddlewareConnectorConfig getConfig()
 */
class OmsMiddlewareConnectorCommunicationFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToProcessFacadeBridgeInterface
     */
    public function getProcessFacade(): OmsMiddlewareConnectorToProcessFacadeBridgeInterface
    {
        return $this->getProvidedDependency(OmsMiddlewareConnectorDependencyProvider::FACADE_PROCESS);
    }
}
