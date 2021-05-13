<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\DependencyInjection;

use LSB\UtilityBundle\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    const CONFIG_KEY = 'lsb_product';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIG_KEY);

//        $treeBuilder
//            ->getRootNode()
//            ->children()
//            ->bundleTranslationDomainScalar(LSBProductBundle::class)->end()
//            ->resourcesNode()
//            ->children()
//            ->resourceNode(
//                'job',
//                Product::class,
//                ProductInterface::class,
//                ProductFactory::class,
//                ProductRepository::class,
//                ProductManager::class,
//                ProductType::class,
//                ProductTranslation::class,
//                ProductTranslationInterface::class,
//                ProductTranslationType::class
//            )
//            ->end()
//            ->end()
//            ->end()
//            ->end();

        return $treeBuilder;
    }
}
