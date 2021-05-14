<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UserBundle\Entity\UserInterface;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\UuidTrait;

/**
 * Class Job
 * @package LSB\MessengerBundle\Entity
 * @MappedSuperclass
 */
class Job implements JobInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected int $status = self::STATUS_NEW;

    /**
     * @var int
     * @ORM\Column(type="integer", options={"default": 0})
     */
    protected int $processingCnt = 0;

    /**
     * @var array
     * @ORM\Column(type="json")
     */
    protected array $result = [];

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    protected ?string $refId;

    /**
     * @var UserInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\UserBundle\Entity\UserInterface")
     */
    protected ?UserInterface $user = null;

    /**
     * @var DateTime|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected ?DateTime $completedAt = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->generateUuid();
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getProcessingCnt(): int
    {
        return $this->processingCnt;
    }

    /**
     * @param int $processingCnt
     * @return $this
     */
    public function setProcessingCnt(int $processingCnt): self
    {
        $this->processingCnt = $processingCnt;
        return $this;
    }

    /**
     *
     */
    public function increaseProcessingCnt(): void
    {
        $this->processingCnt += 1;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @param array $result
     * @return $this
     */
    public function setResult(array $result): self
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRefId(): ?string
    {
        return $this->refId;
    }

    /**
     * @param string|null $refId
     * @return $this
     */
    public function setRefId(?string $refId): self
    {
        $this->refId = $refId;
        return $this;
    }

    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface|null $user
     * @return $this
     */
    public function setUser(?UserInterface $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCompletedAt(): ?DateTime
    {
        return $this->completedAt;
    }

    /**
     * @param DateTime|null $completedAt
     * @return $this
     */
    public function setCompletedAt(?DateTime $completedAt): self
    {
        $this->completedAt = $completedAt;
        return $this;
    }
}
