<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
