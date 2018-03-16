<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToProcessFacadeBridge;

class OmsMiddlewareConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_PROCESS = 'FACADE_PROCESS';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addProcessFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProcessFacade($container): Container
    {
        $container[self::FACADE_PROCESS] = function (Container $container) {
            return new OmsMiddlewareConnectorToProcessFacadeBridge($container->getLocator()->process()->facade());
        };

        return $container;
    }
}
