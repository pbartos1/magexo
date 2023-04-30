<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface MemberCardRepositoryInterface
{

    /**
     * Save MemberCard
     * @param \Magexo\MemberCard\Api\Data\MemberCardInterface $memberCard
     * @return \Magexo\MemberCard\Api\Data\MemberCardInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magexo\MemberCard\Api\Data\MemberCardInterface $memberCard
    );

    /**
     * Retrieve MemberCard
     * @param string $membercardId
     * @return \Magexo\MemberCard\Api\Data\MemberCardInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($membercardId);

    /**
     * Retrieve MemberCard matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magexo\MemberCard\Api\Data\MemberCardSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete MemberCard
     * @param \Magexo\MemberCard\Api\Data\MemberCardInterface $memberCard
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magexo\MemberCard\Api\Data\MemberCardInterface $memberCard
    );

    /**
     * Delete MemberCard by ID
     * @param string $membercardId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($membercardId);
}

