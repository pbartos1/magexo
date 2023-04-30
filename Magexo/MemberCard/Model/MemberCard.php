<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Model;

use Magento\Framework\Model\AbstractModel;
use Magexo\MemberCard\Api\Data\MemberCardInterface;

class MemberCard extends AbstractModel implements MemberCardInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Magexo\MemberCard\Model\ResourceModel\MemberCard::class);
    }

    /**
     * @inheritDoc
     */
    public function getMembercardId()
    {
        return $this->getData(self::MEMBERCARD_ID);
    }

    /**
     * @inheritDoc
     */
    public function setMembercardId($membercardId)
    {
        return $this->setData(self::MEMBERCARD_ID, $membercardId);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * @inheritDoc
     */
    public function getValidFrom()
    {
        return $this->getData(self::VALID_FROM);
    }

    /**
     * @inheritDoc
     */
    public function setValidFrom($validFrom)
    {
        return $this->setData(self::VALID_FROM, $validFrom);
    }

    /**
     * @inheritDoc
     */
    public function getValidTo()
    {
        return $this->getData(self::VALID_TO);
    }

    /**
     * @inheritDoc
     */
    public function setValidTo($validTo)
    {
        return $this->setData(self::VALID_TO, $validTo);
    }
}

