<?php

declare(strict_types=1);

namespace MageDad\Module\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\Category;

class AddCodeCategoryAttribute implements DataPatchInterface
{
    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private EavSetupFactory $eavSetupFactory,
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function apply() {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Category::ENTITY, 'code', [
            'type' => 'text',
            'label' => 'Category Code',
            'note' => 'Akeneo code entity',
            'input' => 'text',
            'default' => '',
            'sort_order' => 5,
            'required' => false,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'group' => 'General Information',
            'visible_on_front' => true
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies() {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases() {
        return [];
    }
}
