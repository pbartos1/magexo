<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Api\Data;

interface MemberCardSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get MemberCard list.
     * @return \Magexo\MemberCard\Api\Data\MemberCardInterface[]
     */
    public function getItems();

    /**
     * Set customer_id list.
     * @param \Magexo\MemberCard\Api\Data\MemberCardInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

