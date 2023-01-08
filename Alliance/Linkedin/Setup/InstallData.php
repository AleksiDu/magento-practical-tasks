<?php
namespace AlLiance\Linkedin\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetup
     */
    private $eavSetup;
    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @param EavSetup $eavSetup
     * @param Config $config
     */
    public function __construct(EavSetup $eavSetup, Config $config){
        $this->eavSetup = $eavSetup;
        $this->eavConfig = $config;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'linkedin_profile',
            [
                'type' => 'varchar',
                'label' => 'Linkedin Profile',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'sort_order' => 1000,
                'position' => 1000,
                'system' => false,
            ]
        );

        $linkedin = $this->eavConfig->getAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'linkedin_profile');

        $linkedin->setData(
            'used_in_forms',
            ['adminhtml_customer', 'adminhtml_checkout', 'customer_account_create', 'customer_account_edit']
        );

        $linkedin->save();

        $setup->endSetup();
    }

}

