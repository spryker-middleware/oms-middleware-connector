<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Communication\Plugin\Stream;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;

/**
 * @method \SprykerMiddleware\Zed\OmsMiddlewareConnector\Communication\OmsMiddlewareConnectorCommunicationFactory getFactory()
 * @method \SprykerMiddleware\Zed\OmsMiddlewareConnector\Business\OmsMiddlewareConnectorFacade getFacade()
 */
class OrderReadStreamPlugin extends AbstractPlugin implements InputStreamPluginInterface
{
    protected const PLUGIN_NAME = 'OrderReadStreamPlugin';

    /**
     * @param string $path
     *
     * @return \SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface
     */
    public function getInputStream(string $path): ReadStreamInterface
    {
        return $this->getFactory()
            ->createStreamFactory()
            ->createOrderReadStream($path);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::PLUGIN_NAME;
    }
}
