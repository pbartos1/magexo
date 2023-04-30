<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Ui\Component\Create\Form\Customer;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory as CustomerCollectionFactory;
use Magento\Framework\App\RequestInterface;

/**
 * Options tree for "Categories" field
 */
class Options implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory
     */
    protected $customerCollectionFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var array
     */
    protected $customerTree;

    /**
     * @param CustomerCollectionFactory $customerCollectionFactory
     * @param RequestInterface $request
     */
    public function __construct(
        CustomerCollectionFactory $customerCollectionFactory,
        RequestInterface $request
    ) {
        $this->customerCollectionFactory = $customerCollectionFactory;
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {
        return $this->getCustomerTree();
    }

    /**
     * Retrieve categories tree
     *
     * @return array
     */
    protected function getCustomerTree()
    {
        if ($this->customerTree === null) {
            $collection = $this->customerCollectionFactory->create();

            $collection->addNameToSelect();

            foreach ($collection as $customer) {
                $customerId = $customer->getEntityId();
                if (!isset($customerById[$customerId])) {
                    $customerById[$customerId] = [
                        'value' => $customerId
                    ];
                }
                $customerById[$customerId]['label'] = $customer->getName();
            }
            $this->customerTree = $customerById;
        }
        return $this->customerTree;
    }
}
