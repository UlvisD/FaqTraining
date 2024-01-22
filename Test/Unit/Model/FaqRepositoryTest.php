<?php

namespace Magebit\Faq\Test\Unit\Model;

use Magebit\Faq\Api\{
    Data\FaqInterface,
    FaqRepositoryInterface
};

use Magebit\Faq\Model\FaqFactory;
use Magebit\Faq\Model\FaqRepository;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;
use Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class FaqRepositoryTest extends TestCase
{
    /**
     * @var FaqResource $faqResourceMock
     */
    private FaqResource $faqResourceMock;

    /**
     * @var CollectionFactory $collectionFactoryMock
     */
    private CollectionFactory $collectionFactoryMock;

    /**
     * @var FaqInterface | MockObject $faqInterfaceMock
     */
    private $faqInterfaceMock;

    /**
     * @var FaqRepositoryInterface $faqRepositoryInterfaceMock
     */
    private FaqRepositoryInterface $faqRepositoryInterfaceMock;

    /**
     * @var FaqFactory $faqFactoryMock
     */
    private FaqFactory $faqFactoryMock;
    private $object;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->faqFactoryMock = $this->getMockBuilder(FaqFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->faqResourceMock = $this->getMockBuilder(FaqResource::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->collectionFactoryMock = $this->getMockBuilder(CollectionFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->object = new FaqRepository($this->faqFactoryMock, $this->faqResourceMock, $this->collectionFactoryMock);
    }

    // To run tests - vendor/phpunit/phpunit/phpunit app/code/Magebit/Faq
    public function testHasGetAttribute()
    {

        $jsonData = $this->object->getJson();
        $decoded = json_decode($jsonData, true);

        $this->assertArrayHasKey("id", $decoded, "Does not have the key");
    }
}
