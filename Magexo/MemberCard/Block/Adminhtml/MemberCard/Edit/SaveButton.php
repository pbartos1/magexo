<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Block\Adminhtml\MemberCard\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Membercard'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}

