<?php

namespace Magebit\Faq\Block;

use Magebit\Faq\Model\FaqRepository;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class FaqList extends Template
{
    /**
     * @var FaqRepository $faqRepository
     */
    private FaqRepository $faqRepository;

    /**
     * @param FaqRepository $faqRepository
     * @param Context $context
     */
    public function __construct(
        Context $context,
        FaqRepository $faqRepository,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->faqRepository = $faqRepository;
    }

    /**
     * @return array
     */
    public function getAllItems(): array
    {
        $list = $this->faqRepository->getList();
        return $list;
    }
}
