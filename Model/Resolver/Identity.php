<?php

namespace Magebit\Faq\Model\Resolver;

use Magento\Framework\GraphQl\Query\Resolver\IdentityInterface;

class Identity implements IdentityInterface
{
    /**
     * @var string
     */
    private $cacheTag = "magebit_faq_get_graph_data";

    public function getIdentities(array $resolvedData): array
    {
        return [$this->cacheTag];
    }
}
