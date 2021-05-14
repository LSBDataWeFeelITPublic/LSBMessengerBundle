<?php


namespace LSB\MessengerBundle\Stamp;

use Symfony\Component\Messenger\Stamp\StampInterface;

/**
 * Interface JobStampInterface
 * @package LSB\MessengerBundle\Stamp
 */
interface JobStampInterface extends StampInterface
{
    public function getJobUuid(): string;
}