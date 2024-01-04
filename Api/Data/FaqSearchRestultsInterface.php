<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Api\Data;
use Magento\Framework\Api\SearchResultsInterface;
interface FaqSearchRestultsInterface extends SearchResultsInterface
{
    /**
     * @return SearchResultsInterface[]
     * */
    public function getItems(): array;

    /**
     * @param FaqInterface[] $items
     *
     * @return SearchResultsInterface
     * */
    public function setItems(array $items): SearchResultsInterface;

}
