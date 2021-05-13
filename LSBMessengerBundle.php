<?php
declare(strict_types=1);

namespace LSB\MessengerBundle;

use LSB\MessengerBundle\DependencyInjection\Compiler\AddManagerResourcePass;
use LSB\MessengerBundle\DependencyInjection\Compiler\AddResolveEntitiesPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class LSBMessengerBundle
 * @package LSB\MessengerBundle
 */
class LSBMessengerBundle extends Bundle
{
    public function build(ContainerBuilder $builder)
    {
        parent::build($builder);

        $builder
            ->addCompilerPass(new AddManagerResourcePass())
            ->addCompilerPass(new AddResolveEntitiesPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1);
        ;
    }
}
