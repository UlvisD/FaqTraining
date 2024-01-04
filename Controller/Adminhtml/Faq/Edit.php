<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Faq;

use Magebit\Faq\Model\FaqRepository;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{
    /**
     * @var PageFactory $pageFactory
     */
    private PageFactory $pageFactory;

    /**
     * @var FaqRepository $faqRepository
     */
    private FaqRepository $faqRepository;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory, FaqRepository $faqRepository)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->faqRepository = $faqRepository;
    }

    public function execute()
    {
//        $id = $this->getRequest()->getParam('id');
//        $faq = $this->faqRepository->get($id);
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend("FAQ Question");
        return $page;
    }
}
