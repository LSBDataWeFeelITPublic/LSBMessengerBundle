<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Manager;

use LSB\MessengerBundle\Entity\JobInterface;
use LSB\MessengerBundle\Factory\JobFactoryInterface;
use LSB\MessengerBundle\Repository\JobRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class JobManager
* @package LSB\MessengerBundle\Manager
*/
class JobManager extends BaseManager
{

    /**
     * JobManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param JobFactoryInterface $factory
     * @param JobRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        JobFactoryInterface $factory,
        JobRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return JobInterface|object
     */
    public function createNew(): JobInterface
    {
        return parent::createNew();
    }

    /**
     * @return JobFactoryInterface|FactoryInterface
     */
    public function getFactory(): JobFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return JobRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): JobRepositoryInterface
    {
        return parent::getRepository();
    }
}
