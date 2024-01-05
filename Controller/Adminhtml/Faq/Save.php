<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Faq;

use Magebit\Faq\Api\Data\FaqInterface;
use Magebit\Faq\Model\FaqRepository;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magebit\Faq\Model\FaqFactory;

class Save extends Action implements HttpPostActionInterface
{

    /**
     * @var FaqFactory $modelFactory
     */
    private FaqFactory $modelFactory;

    /**
     * @var FaqRepository $faqRepository
     */
    private FaqRepository $faqRepository;

    /**
     * @var FaqInterface $faq
     */
    private FaqInterface $faq;

    /**
     * @param Context $context
     * @param FaqFactory $modelFactory
     * @param FaqRepository $faqRepository
     */
    public function __construct(
        Context $context,
        FaqFactory $modelFactory,
        FaqRepository $faqRepository,
    ) {
        parent::__construct($context);

        $this->modelFactory = $modelFactory;
        $this->faqRepository = $faqRepository;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $postParams = $this->getRequest()->getParams();

        if($postParams['id'] != null){
            $faq = $this->faqRepository->get((int)$postParams['id']);
        } else {
            $faq = $this->modelFactory->create();
        }

        $faq->setQuestion($postParams['question']);
        $faq->setAnswer($postParams['answer']);
        $faq->setStatus((int)$postParams['status']);
        $faq->setPosition((int)$postParams['position']);
        $this->faqRepository->save($faq);

        return $this->resultRedirectFactory->create()->setPath('magebitfaq/faq/index');
    }
}

