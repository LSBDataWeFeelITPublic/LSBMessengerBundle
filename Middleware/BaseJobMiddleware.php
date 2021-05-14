<?php

namespace LSB\MessengerBundle\Middleware;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use LSB\MessengerBundle\Entity\JobInterface;
use LSB\MessengerBundle\Manager\JobManager;
use LSB\MessengerBundle\Stamp\JobStamp;
use LSB\MessengerBundle\Stamp\JobStampInterface;
use LSB\UserBundle\Entity\UserInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class BaseJobMiddleware
 * @package LSB\MessengerBundle\Middleware
 */
abstract class BaseJobMiddleware implements MiddlewareInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $jobManager;

    /**
     * @var Security
     */
    protected $security;

    /**
     * BaseJobMiddleware constructor.
     * @param JobManager $jobManager
     */
    public function __construct(JobManager $jobManager, Security $security)
    {
        $this->jobManager = $jobManager;
        $this->security = $security;
    }

    /**
     * @param Envelope $envelope
     * @param StackInterface $stack
     * @return Envelope
     */
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $lastJobStamp = $envelope->last(JobStamp::class);

        if (null === $lastJobStamp) {
            $job = $this->jobManager->createNew();
            $job->setUser($this->security->getUser() instanceof UserInterface ? $this->security->getUser() : null);
            $this->jobManager->persist($job);
            $envelope = $envelope->with(new JobStamp($job));
        } else {
            $job = $this->jobManager->getRepository()->findOneBy(['uuid' => (string) $lastJobStamp->getJobUuid()]);

            if ($job instanceof JobInterface) {
                $job->increaseProcessingCnt();
                $job->setStatus(Job::STATUS_PROCESSING);
                $envelope->getMessage()->setJob($job);
            }
        }


        $this->jobManager->flush();
        return $stack->next()->handle($envelope, $stack);
    }
}