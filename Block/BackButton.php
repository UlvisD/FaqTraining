<?php

namespace Magebit\Faq\Block;

use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;

class BackButton extends Generic
{
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }
    /**
     * Get URL for back
     *
     * @return string
     */
    private function getBackUrl()
    {
        return $this->getUrl('*/*/index');
    }
}
