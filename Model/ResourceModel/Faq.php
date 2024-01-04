<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\ResourceModel;

use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Faq extends AbstractDb
{

    protected $_eventPrefix = 'magebit_faq_resource_model';

    protected function _construct(): void
    {
        $this->_init(FaqInterface::TABLE, FaqInterface::ID);
        $this->_useIsObjectNew = true;
    }
}

