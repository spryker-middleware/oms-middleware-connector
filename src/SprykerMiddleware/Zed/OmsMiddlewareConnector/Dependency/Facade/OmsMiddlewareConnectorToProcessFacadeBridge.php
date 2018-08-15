<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade;

use Generated\Shared\Transfer\ProcessSettingsTransfer;

class OmsMiddlewareConnectorToProcessFacadeBridge implements OmsMiddlewareConnectorToProcessFacadeBridgeInterface
{
    /**
     * @var \SprykerMiddleware\Zed\Process\Business\ProcessFacadeInterface
     */
    protected $processFacade;

    /**
     * @param \SprykerMiddleware\Zed\Process\Business\ProcessFacadeInterface $processFacade
     */
    public function __construct($processFacade)
    {
        $this->processFacade = $processFacade;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ProcessSettingsTransfer $processSettingsTransfer): void
    {
        $this->processFacade->process($processSettingsTransfer);
    }
}
