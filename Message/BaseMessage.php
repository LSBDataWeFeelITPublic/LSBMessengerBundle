<?php

namespace LSB\MessengerBundle\Message;

use LSB\MessengerBundle\Entity\JobInterface;

/**
 * Class BaseMessage
 * @package LSB\MessengerBundle\Message
 */
abstract class BaseMessage implements MessageInterface
{
    /**
     * @var JobInterface|null
     */
    protected $job;

    /**
     * @return JobInterface|null
     */
    public function getJob(): ?JobInterface
    {
        return $this->job;
    }

    /**
     * @param JobInterface|null $job
     * @return $this
     */
    public function setJob(?JobInterface $job): self
    {
        $this->job = $job;
        return $this;
    }
}