<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use LSB\MessengerBundle\Entity\JobInterface;
use LSB\MessengerBundle\Manager\JobManager;
use LSB\MessengerBundle\Message\MessageInterface;
use LSB\MessengerBundle\Stamp\JobStamp;
use LSB\MessengerBundle\Stamp\JobStampInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\Event\WorkerMessageHandledEvent;

/**
 * Class BaseHandledMessageListener
 * @package LSB\MessengerBundle\EventListener
 */
abstract class BaseHandledMessageListener implements EventSubscriberInterface
{
    /**
     * @var JobManager
     */
    protected JobManager $jobManager;

    /**
     * FailedMessageListener constructor.
     * @param JobManager $jobManager
     */
    public function __construct(JobManager $jobManager)
    {
        $this->jobManager = $jobManager;
    }

    /**
     * @param WorkerMessageHandledEvent $event
     */
    public function onMessageHandled(WorkerMessageHandledEvent $event)
    {
        $envelope = $event->getEnvelope();

        $lastJobStamp = $envelope->last(JobStamp::class);

        if ($lastJobStamp instanceof JobStampInterface) {
            $job = $this->jobManager->getRepository()->findOneBy(['uuid' => (string)$lastJobStamp->getJobUuid()]);
            if ($job instanceof JobInterface) {
                $job
                    ->setStatus(JobInterface::STATUS_COMPLETED)
                ;

                if ($envelope->getMessage() instanceof MessageInterface) {
                    $job
                        ->setResult($envelope->getMessage()->getJob()->getResult())
                        ->setRefId($envelope->getMessage()->getJob()->getRefId())
                        ->setCompletedAt(new \DateTime('now'))
                    ;
                }

                $this->jobManager->flush();
            }
        }
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            WorkerMessageHandledEvent::class => ['onMessageHandled', -90],
        ];
    }
}