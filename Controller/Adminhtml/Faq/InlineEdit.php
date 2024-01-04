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
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends Action implements HttpPostActionInterface
{

    /**
     * @var FaqRepository $faqRepository
     */
    private FaqRepository $faqRepository;

    /**
     * @var FaqInterface
     */
    private FaqInterface $faq;

    /**
     * @var JsonFactory $jsonFactory
     */
    private JsonFactory $jsonFactory;

    /**
     * @param Context $context
     * @param FaqRepository $faqRepository
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        FaqRepository $faqRepository,
        JsonFactory $jsonFactory,
    ) {
        $this->faqRepository = $faqRepository;
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $postItems = $this->getRequest()->getParam('items', []);
        foreach (array_keys($postItems) as $faqId){
            $this->faq = $this->faqRepository->get($faqId);
            $this->faq->setQuestion($postItems[$faqId]['question']);
            $this->faq->setStatus(intval($postItems[$faqId]['status']));
            $this->faq->setPosition(intval($postItems[$faqId]['position']));
            $this->faqRepository->save($this->faq);
        }
        return $resultJson->setData(
            [
                'message' => 'ok',
            ]
        );
    }
}
