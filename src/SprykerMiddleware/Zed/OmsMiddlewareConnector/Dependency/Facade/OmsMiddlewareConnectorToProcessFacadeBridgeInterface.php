<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Dependency\Facade;

use Generated\Shared\Transfer\ProcessSettingsTransfer;

interface OmsMiddlewareConnectorToProcessFacadeBridgeInterface
{
    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\ProcessSettingsTransfer $processSettingsTransfer
     *
     * @return void
     */
    public function process(ProcessSettingsTransfer $processSettingsTransfer): void;
}
