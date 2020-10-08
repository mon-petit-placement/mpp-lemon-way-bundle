<?php

namespace Mpp\LemonWayClientBundle;

use Mpp\LemonWayClientBundle\DependencyInjection\Compiler\MppLemonWayClientCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MppLemonWayClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new MppLemonWayClientCompilerPass());
    }
}
