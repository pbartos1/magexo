<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Api\Data;

interface MemberCardInterface
{

    const CUSTOMER_ID = 'customer_id';
    const MEMBERCARD_ID = 'membercard_id';
    const VALID_TO = 'valid_to';
    const VALID_FROM = 'valid_from';

    /**
     * Get membercard_id
     * @return string|null
     */
    public function getMembercardId();

    /**
     * Set membercard_id
     * @param string $membercardId
     * @return \Magexo\MemberCard\MemberCard\Api\Data\MemberCardInterface
     */
    public function setMembercardId($membercardId);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Magexo\MemberCard\MemberCard\Api\Data\MemberCardInterface
     */
    public function setCustomerId($customerId);

    /**
     * Get valid_from
     * @return string|null
     */
    public function getValidFrom();

    /**
     * Set valid_from
     * @param string $validFrom
     * @return \Magexo\MemberCard\MemberCard\Api\Data\MemberCardInterface
     */
    public function setValidFrom($validFrom);

    /**
     * Get valid_to
     * @return string|null
     */
    public function getValidTo();

    /**
     * Set valid_to
     * @param string $validTo
     * @return \Magexo\MemberCard\MemberCard\Api\Data\MemberCardInterface
     */
    public function setValidTo($validTo);
}

