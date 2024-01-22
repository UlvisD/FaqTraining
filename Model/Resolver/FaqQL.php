<?php

namespace Magebit\Faq\Model\Resolver;

use Magebit\Faq\Api\Data\FaqInterface;
use Magebit\Faq\Model\FaqRepository;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class FaqQL implements ResolverInterface
{

    /**
     * @var FaqRepository $faqRepository
     */
    private FaqRepository $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * @param Field $field
     * @param $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|FaqInterface
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null): FaqInterface | array
    {
        return $this->getFaqData();
    }

    /**
     * @return FaqInterface | array
     */
    public function getFaqData(): FaqInterface | array
    {
        $data = $this->faqRepository->getList();
        if(empty($data)){
            return [];
        }
        return $data;
    }

}
