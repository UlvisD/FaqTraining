<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\Question;

use Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{

    /**
     * @var CollectionFactory $collection
     */
    protected $collection;

    public function __construct($name, $primaryFieldName, $requestFieldName, CollectionFactory $collectionFactory, array $meta = [], array $data = [])
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    /**
     * Get data.
     *
     * @return array
     */
    public function getData(): array
    {
        $result = [];

        foreach ($this->collection->getItems() as $item) {
            $result[$item->getId()] = $item->getData();
        }

        return $result;
    }
}
