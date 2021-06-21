<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\MessengerBundle\Entity\Job;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class JobRepository
 * @package LSB\MessengerBundle\Repository
 */
class JobRepository extends BaseRepository implements JobRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * JobRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Job::class);
    }

}
