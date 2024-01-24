<?php

declare(strict_types=1);

namespace MageDad\Module\Block\Adminhtml\Order\View\Tab;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Framework\Registry;

class CustomTab extends Template implements TabInterface
{
    protected $_template = 'MageDad_Module::order/view/tab/customtab.phtml';

    public function __construct(
        Context $context,
        public Registry $registry,
        array $data = [],
    ) {
        parent::__construct($context, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Custom Tab Name');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Custom Tab Title');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}