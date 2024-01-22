<?php

namespace Magebit\Faq\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class FaqData extends Template
{

    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getApiData(): array
    {
        $data = file_get_contents('http://magento.local/rest/V1/faqs', true);
        if($data){
            $decoded = json_decode($data, true);
            return $decoded;
        }
        return [];
    }
}
