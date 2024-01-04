<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Faq;

use Magebit\Faq\Model\FaqFactory;
use Magebit\Faq\Model\FaqRepository;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Delete extends Action
{
    /**
     * @var FaqRepository $faqRepository
     */
    private FaqRepository $faqRepository;

    /**
     * @var RedirectFactory $resultRedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * @param Context $context
     * @param FaqRepository $faqFactory
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Context $context,
        FaqRepository $faqFactory,
        RedirectFactory $resultRedirectFactory,
    ) {
        parent::__construct($context);
        $this->faqRepository = $faqFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $this->faqRepository->deleteById(intval($id));
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('magebitfaq/faq/index');
        return $redirect;
    }
}
