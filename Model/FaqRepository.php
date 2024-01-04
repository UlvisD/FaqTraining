<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\{
    Data\FaqInterface,
    FaqRepositoryInterface
};

use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;
use Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Framework\Exception\AlreadyExistsException;

class FaqRepository implements FaqRepositoryInterface
{
    /**
     * @var FaqFactory
     */
    protected FaqFactory $faqFactory;

    /**
     * @var FaqResource
     */
    protected FaqResource $faqResource;

    /**
     * @var CollectionFactory $collectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @param FaqFactory $faqFactory
     * @param FaqResource $faqResource
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(FaqFactory $faqFactory, FaqResource $faqResource, CollectionFactory $collectionFactory)
    {
        $this->faqFactory = $faqFactory;
        $this->faqResource = $faqResource;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get a single row
     * @param int $id
     *
     * @return FaqInterface
     * */
    public function get(int $id): FaqInterface
    {
        $faq = $this->faqFactory->create();
        $this->faqResource->load($faq, $id);
        return $faq;
    }

    /**
     * Save an entity
     * @param FaqInterface $faq
     *
     * @return void
     *
     * */
    public function save(FaqInterface $faq): void
    {
        $faq->setUpdatedAt(null);

        try {
            $this->faqResource->save($faq);
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
        }
    }

    /**
     * Get list
     *
     * @return FaqInterface[]
     * */
    public function getList(): array
    {
        $collection = $this->collectionFactory->create();

        return $collection->getItems();
    }

    /**
     * Delete an entity
     * @param FaqInterface $faq
     *
     * @return void
     *
     * */
    public function delete(FaqInterface $faq): void
    {
        $this->faqResource->delete($faq);
    }

    /**
     * Delete an entity by id
     * @param int $id
     *
     * @return void
     * */
    public function deleteById(int $id): void
    {
        $faq = $this->faqFactory->create();
        $this->faqResource->load($faq, $id);
        $this->faqResource->delete($faq);
    }
}
