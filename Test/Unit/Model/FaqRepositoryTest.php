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
use function _PHPStan_532094bc1\assertArgs;
use function PHPStan\Testing\assertType;

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

    public function testReturnItemsFromColletion()
    {
        $items = $this->object->getList();
        $this->assertIsArray($items, "Method does not return an array");
    }

    public function testDeletesEntity(){
        $items = $this->object->getList();

        if(empty($items)){
            $this->assertIsArray($items, "There is no entities inside of the collection");
        }

        $testId = $items[0]->getId();
        $this->faqRepositoryInterfaceMock->deleteById($testId);

        $this->assertNull($testId, "The item was not deleted by id.");
    }
}
