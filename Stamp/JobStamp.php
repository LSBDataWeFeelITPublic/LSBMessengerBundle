<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Stamp;

use LSB\MessengerBundle\Entity\JobInterface;

/**
 * Class JobStamp
 * @package LSB\MessengerBundle\Stamp
 */
class JobStamp implements JobStampInterface
{
    /**
     * @var string
     */
    protected string $jobUuid;

    /**
     * JobStamp constructor.
     * @param JobInterface $job
     */
    public function __construct(JobInterface $job)
    {
        $this->jobUuid = $job->getUuid();
    }

    /**
     * @return string
     */
    public function getJobUuid(): string
    {
        return $this->jobUuid;
    }
}