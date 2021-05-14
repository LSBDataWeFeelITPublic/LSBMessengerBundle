<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Entity;

use LSB\UserBundle\Entity\UserInterface;
use LSB\UtilityBundle\Interfaces\UuidInterface;
use DateTime;

/**
 * Interface JobInterface
 * @package LSB\MessengerBundle\Entity
 */
interface JobInterface extends UuidInterface
{
    const STATUS_NEW = 10;
    const STATUS_PROCESSING = 20;
    const STATUS_COMPLETED = 30;
    const STATUS_FAILED = 40;

    const RESULT_LOG = 'log';

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self;

    /**
     * @return int
     */
    public function getProcessingCnt(): int;

    /**
     * @param int $processingCnt
     * @return $this
     */
    public function setProcessingCnt(int $processingCnt): self;

    /**
     * @return array
     */
    public function getResult(): array;

    /**
     * @param array $result
     * @return $this
     */
    public function setResult(array $result): self;

    /**
     * @return string|null
     */
    public function getRefId(): ?string;

    /**
     * @param string|null $refId
     * @return $this
     */
    public function setRefId(?string $refId): self;

    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface;

    /**
     * @param UserInterface|null $user
     * @return $this
     */
    public function setUser(?UserInterface $user): self;

    /**
     * @return DateTime|null
     */
    public function getCompletedAt(): ?DateTime;

    /**
     * @param DateTime|null $completedAt
     * @return $this
     */
    public function setCompletedAt(?DateTime $completedAt): self;

    public function increaseProcessingCnt(): void;
}