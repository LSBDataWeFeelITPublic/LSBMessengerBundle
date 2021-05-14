<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\EventListener;

use LSB\MessengerBundle\Entity\JobInterface;
use LSB\MessengerBundle\Manager\JobManager;
use LSB\MessengerBundle\Stamp\JobStamp;
use LSB\MessengerBundle\Stamp\JobStampInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\Event\WorkerMessageFailedEvent;

/**
 * Class BaseFailedMessageListener
 * @package LSB\MessengerBundle\EventListener
 */
abstract class BaseFailedMessageListener implements EventSubscriberInterface
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
     * @param WorkerMessageFailedEvent $event
     */
    public function onMessageFailed(WorkerMessageFailedEvent $event)
    {
        if ($event->willRetry()) {
            return;
        }
        $envelope = $event->getEnvelope();

        $lastJobStamp = $envelope->last(JobStamp::class);

        if ($lastJobStamp instanceof JobStampInterface) {
            $job = $this->jobManager->getRepository()->findOneBy(['uuid' => (string)$lastJobStamp->getJobUuid()]);
            if ($job instanceof JobInterface) {
                $job->setStatus(JobInterface::STATUS_FAILED);
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
            WorkerMessageFailedEvent::class => ['onMessageFailed', -90],
        ];
    }
}