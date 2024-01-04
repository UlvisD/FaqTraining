<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\ResourceModel\Faq;

use Magebit\Faq\Model\ResourceModel\Faq;
use Magebit\Faq\Model\Faq as FaqModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct(): void
    {
        $this->_init(FaqModel::class,
            Faq::class);
    }

}
