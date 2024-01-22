<?php

namespace Magebit\Faq\Setup\Patch\Data;

use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class PopulateTableAttributes implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @return void
     */
    public function apply(): void
    {

        $jsonData = file_get_contents('app/code/Magebit/Faq/data/faqdata.json');
        $decodedData = json_decode($jsonData, true);
        $this->moduleDataSetup->getConnection()->startSetup();
        foreach($decodedData['data'] as $data){
            $this->moduleDataSetup->getConnection()->insert(FaqInterface::TABLE, $data);
        }
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @return array|string[]
     */
    public function getAliases(): array
    {
        return [];
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies(): array
    {
        return [];
    }
}
