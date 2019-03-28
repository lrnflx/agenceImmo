<?php
namespace Lrnflx\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {
    
    public function getConfigTreeBuilder(){
        $treeBuilder = new TreeBuilder();
        //NAME OF THE ROOT MUST BE SAME AS BUNDLE NAME LOWERCASE
        $rootNode = $treeBuilder->root('recaptcha');
        $rootNode 
            ->children()
            ->scalarNode('key')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('secret')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}