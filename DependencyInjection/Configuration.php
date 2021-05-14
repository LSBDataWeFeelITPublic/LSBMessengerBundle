<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\DependencyInjection;

use LSB\MessengerBundle\Entity\Job;
use LSB\MessengerBundle\Entity\JobInterface;
use LSB\MessengerBundle\Factory\JobFactory;
use LSB\MessengerBundle\Form\JobType;
use LSB\MessengerBundle\Manager\JobManager;
use LSB\MessengerBundle\Repository\JobRepository;
use LSB\UtilityBundle\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    const CONFIG_KEY = 'lsb_messenger';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIG_KEY);

        $treeBuilder
            ->getRootNode()
            ->children()
            ->resourcesNode()
            ->children()
            ->resourceNode(
                'job',
                Job::class,
                JobInterface::class,
                JobFactory::class,
                JobRepository::class,
                JobManager::class,
                JobType::class
            )
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
