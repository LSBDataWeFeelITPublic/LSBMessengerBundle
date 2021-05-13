<?php
declare(strict_types=1);

namespace LSB\TemplateVendorSF5Bundle\Tests;

use LSB\TemplateVendorSF5Bundle\Entity\EntityInterface;
use LSB\TemplateVendorSF5Bundle\Factory\EntityFactory;
use LSB\TemplateVendorSF5Bundle\Factory\EntityFactoryInterface;
use LSB\TemplateVendorSF5Bundle\Manager\EntityManager;
use LSB\TemplateVendorSF5Bundle\Repository\EntityRepository;
use LSB\TemplateVendorSF5Bundle\Repository\EntityRepositoryInterface;
use LSB\UtilityBundle\Manager\ObjectManager;
use PHPUnit\Framework\TestCase;

/**
 * Class EntityManagerTest
 * @package LSB\TemplateVendorSF5Bundle\Tests
 */
class EntityManagerTest extends TestCase
{
    /**
     * Assert returned interfaces
     * @throws \Exception
     */
    public function testReturnedInterfaces()
    {
        $objectManagerMock = $this->createMock(ObjectManager::class);
        $entityFactoryMock = $this->createMock(EntityFactory::class);
        $entityRepositoryMock = $this->createMock(EntityRepository::class);

        $entityManager = new EntityManager($objectManagerMock, $entityFactoryMock, $entityRepositoryMock, null);

        $this->assertInstanceOf(EntityInterface::class, $entityManager->createNew());
        $this->assertInstanceOf(EntityFactoryInterface::class, $entityManager->getFactory());
        $this->assertInstanceOf(EntityRepositoryInterface::class, $entityManager->getRepository());
    }
}
