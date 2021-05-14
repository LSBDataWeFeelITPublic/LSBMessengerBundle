<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Message;

use LSB\MessengerBundle\Entity\JobInterface;

/**
 * Interface MessageInterface
 * @package LSB\MessengerBundle\Message
 */
interface MessageInterface
{

    /**
     * @return JobInterface|null
     */
    public function getJob(): ?JobInterface;

    /**
     * @param JobInterface|null $job
     * @return $this
     */
    public function setJob(?JobInterface $job): self;
}