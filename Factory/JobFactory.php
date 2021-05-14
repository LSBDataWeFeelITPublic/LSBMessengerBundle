<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\Factory;

use LSB\MessengerBundle\Entity\JobInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class JobFactory
 * @package LSB\MessengerBundle\Factory
 */
class JobFactory extends BaseFactory implements JobFactoryInterface
{

    /**
     * @return JobInterface
     */
    public function createNew(): JobInterface
    {
        return parent::createNew();
    }

}
