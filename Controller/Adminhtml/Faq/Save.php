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

    public function execute()
    {
        $product = $this->modelFactory->create();
        $resultRedirect = $this->resultRedirectFactory->create();

        if($this->getRequest()->getParam('id') != null){
            $this->edit($this->getRequest()->getParams());
        }

        $product->setQuestion($this->getRequest()->getParam('question'));
        $product->setAnswer($this->getRequest()->getParam('answer'));
        $product->setStatus(intval($this->getRequest()->getParam('status')));
        $product->setPosition(1);
        $this->faqRepository->save($product);
        $resultRedirect->setPath('magebitfaq/faq/index');
        return $resultRedirect;
    }

    /**
     * @param array $data
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function edit(array $data)
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $this->faq = $this->faqRepository->get(intval($data['id']));
        $this->faq->setPosition(intval($data['position']));
        $this->faq->setStatus(intval($data['status']));
        $this->faq->setQuestion($data['question']);
        $this->faq->setAnswer($data['answer']);
        $this->faqRepository->save($this->faq);
        $resultRedirect->setPath('magebitfaq/faq/index');
        return $resultRedirect;
    }
}
