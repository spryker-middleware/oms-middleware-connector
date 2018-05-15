<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\OmsMiddlewareConnector\Communication\Plugin\Command;

use Generated\Shared\Transfer\IteratorConfigTransfer;
use Generated\Shared\Transfer\LoggerConfigTransfer;
use Generated\Shared\Transfer\ProcessSettingsTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;

/**
 * @method \SprykerMiddleware\Zed\OmsMiddlewareConnector\Communication\OmsMiddlewareConnectorCommunicationFactory getFactory()
 */
class TriggerOrderExportProcessCommand extends AbstractCommand implements CommandByOrderInterface
{
    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $orderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @return array
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data): array
    {
        $processSettingsTransfer = $this->getProcessSettingsTransfer($orderEntity);

        $this->getFactory()
            ->getProcessFacade()
            ->process($processSettingsTransfer);

        return [];
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     *
     * @return \Generated\Shared\Transfer\ProcessSettingsTransfer
     */
    protected function getProcessSettingsTransfer(SpySalesOrder $orderEntity): ProcessSettingsTransfer
    {
        $processSettingsTransfer = new ProcessSettingsTransfer();
        $processSettingsTransfer->setInputPath($orderEntity->getIdSalesOrder());
        $processSettingsTransfer->setOutputPath('php://stdout');
        $processSettingsTransfer->setIteratorConfig(new IteratorConfigTransfer());
        $processSettingsTransfer->setLoggerConfig(new LoggerConfigTransfer());
        $processSettingsTransfer->setName($this->getFactory()->getConfig()->getOrderExportProcessName());

        return $processSettingsTransfer;
    }
}
