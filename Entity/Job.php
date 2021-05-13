<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use LSB\UtilityBundle\Translatable\TranslatableTrait;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\UuidTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Job
 * @package LSB\MessengerBundle\Entity
 * @UniqueEntity("job")
 * @MappedSuperclass
 */
class Job implements JobInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->generateUuid();
    }

}
