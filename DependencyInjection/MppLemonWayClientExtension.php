<?php

namespace Mpp\LemonWayClientBundle\DependencyInjection;

use Mpp\LemonWayClientBundle\Client\LemonWayClientInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MppLemonWayClientExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration($container->getParameter('kernel.debug'));
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        $container->setParameter(Configuration::CONFIGURATION_ROOT, $config);
        $container->setParameter(sprintf('%s.basic_auth_token', Configuration::CONFIGURATION_ROOT), $config['basic_auth_token']);
        $container->setParameter(sprintf('%s.basic_auth_token_url', Configuration::CONFIGURATION_ROOT), $config['basic_auth_token_url']);

        $container
           ->registerForAutoconfiguration(LemonWayClientInterface::class)
           ->addTag(sprintf('%s.client', Configuration::CONFIGURATION_ROOT))
       ;
    }
}
