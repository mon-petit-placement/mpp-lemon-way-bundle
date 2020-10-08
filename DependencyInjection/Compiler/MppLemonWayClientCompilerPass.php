<?php

namespace Mpp\LemonWayClientBundle\DependencyInjection\Compiler;

use Mpp\LemonWayClientBundle\Client\LemonWayClientRegistryInterface;
use Mpp\LemonWayClientBundle\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MppLemonWayClientCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $config = $container->getParameter(Configuration::CONFIGURATION_ROOT);

        if (!$container->hasDefinition(LemonWayClientRegistryInterface::class)) {
            return;
        }

        $registryDefinition = $container->getDefinition(LemonWayClientRegistryInterface::class);
        $taggedServices = $container->findTaggedServiceIds(sprintf('%s.domain', Configuration::CONFIGURATION_ROOT));
        foreach ($taggedServices as $class => $tags) {
            $container->getDefinition($class)->setArgument('$httpClient', $container->getDefinition($config['http_client']));

            foreach ($tags as $attributes) {
                $registryDefinition->addMethodCall(
                    'set',
                    [
                        $class::getClientAlias(),
                        new Reference($class),
                    ]
                );
            }
        }
    }
}
