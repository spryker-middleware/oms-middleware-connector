<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToProcessFacadeBridge;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToSalesFacadeBridge;

class OmsMiddlewareConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_PROCESS = 'FACADE_PROCESS';
    const FACADE_SALES = 'FACADE_SALES';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addProcessFacade($container);
        $container = $this->addSalesFacade($container);

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

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addSalesFacade($container): Container
    {
        $container[self::FACADE_SALES] = function (Container $container) {
            return new OmsMiddlewareConnectorToSalesFacadeBridge($container->getLocator()->sales()->facade());
        };

        return $container;
    }
}
