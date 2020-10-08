<?php

namespace Mpp\LemonWayClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const CONFIGURATION_ROOT = 'mpp_lemon_way_client';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIGURATION_ROOT);

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('http_client')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('basic_auth_token')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('basic_auth_token_url')->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
