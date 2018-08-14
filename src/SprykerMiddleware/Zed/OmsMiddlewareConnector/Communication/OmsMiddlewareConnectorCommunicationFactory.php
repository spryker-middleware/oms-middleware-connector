<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Stream\StreamFactory;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Stream\StreamFactoryInterface;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToProcessFacadeBridgeInterface;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToSalesFacadeBridgeInterface;
use SprykerMiddleware\Zed\OmsMiddlewareConnector\OmsMiddlewareConnectorDependencyProvider;

/**
 * @method \SprykerMiddleware\Zed\OmsMiddlewareConnector\OmsMiddlewareConnectorConfig getConfig()
 */
class OmsMiddlewareConnectorCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\Stream\StreamFactoryInterface
     */
    public function createStreamFactory(): StreamFactoryInterface
    {
        return new StreamFactory($this->getSalesFacade());
    }

    /**
     * @return \SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToProcessFacadeBridgeInterface
     */
    public function getProcessFacade(): OmsMiddlewareConnectorToProcessFacadeBridgeInterface
    {
        return $this->getProvidedDependency(OmsMiddlewareConnectorDependencyProvider::FACADE_PROCESS);
    }

    /**
     * @return \SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade\OmsMiddlewareConnectorToSalesFacadeBridgeInterface
     */
    public function getSalesFacade(): OmsMiddlewareConnectorToSalesFacadeBridgeInterface
    {
        return $this->getProvidedDependency(OmsMiddlewareConnectorDependencyProvider::FACADE_SALES);
    }
}
