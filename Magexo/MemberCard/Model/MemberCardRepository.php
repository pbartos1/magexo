<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magexo\MemberCard\Api\Data\MemberCardInterface;
use Magexo\MemberCard\Api\Data\MemberCardInterfaceFactory;
use Magexo\MemberCard\Api\Data\MemberCardSearchResultsInterfaceFactory;
use Magexo\MemberCard\Api\MemberCardRepositoryInterface;
use Magexo\MemberCard\Model\ResourceModel\MemberCard as ResourceMemberCard;
use Magexo\MemberCard\Model\ResourceModel\MemberCard\CollectionFactory as MemberCardCollectionFactory;

class MemberCardRepository implements MemberCardRepositoryInterface
{

    /**
     * @var MemberCardCollectionFactory
     */
    protected $memberCardCollectionFactory;

    /**
     * @var MemberCard
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceMemberCard
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var MemberCardInterfaceFactory
     */
    protected $memberCardFactory;


    /**
     * @param ResourceMemberCard $resource
     * @param MemberCardInterfaceFactory $memberCardFactory
     * @param MemberCardCollectionFactory $memberCardCollectionFactory
     * @param MemberCardSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceMemberCard $resource,
        MemberCardInterfaceFactory $memberCardFactory,
        MemberCardCollectionFactory $memberCardCollectionFactory,
        MemberCardSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->memberCardFactory = $memberCardFactory;
        $this->memberCardCollectionFactory = $memberCardCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(MemberCardInterface $memberCard)
    {
        try {
            $this->resource->save($memberCard);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the memberCard: %1',
                $exception->getMessage()
            ));
        }
        return $memberCard;
    }

    /**
     * @inheritDoc
     */
    public function get($memberCardId)
    {
        $memberCard = $this->memberCardFactory->create();
        $this->resource->load($memberCard, $memberCardId);
        if (!$memberCard->getId()) {
            throw new NoSuchEntityException(__('MemberCard with id "%1" does not exist.', $memberCardId));
        }
        return $memberCard;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->memberCardCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(MemberCardInterface $memberCard)
    {
        try {
            $memberCardModel = $this->memberCardFactory->create();
            $this->resource->load($memberCardModel, $memberCard->getMembercardId());
            $this->resource->delete($memberCardModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the MemberCard: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($memberCardId)
    {
        return $this->delete($this->get($memberCardId));
    }
}

