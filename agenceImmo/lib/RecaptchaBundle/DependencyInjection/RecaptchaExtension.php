<?php
namespace Lrnflx\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Lrnflx\RecaptchaBundle\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class RecaptchaExtension extends Extension 
{
    public function load(array $configs, ContainerBuilder $container)
    {
       
        //to load resources/config/services.yaml
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
            // new FileLocator(realpath(dirname(__FILE__)).'/../Resources/config/')
        );
        $loader->load('services.yaml');
        // dd($loader->load('services.yaml'));
        // dd($container);

 
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration,$configs);
        // dump($config); die();
        $container->setParameter('recaptcha.key', $config['key']);
        $container->setParameter('recaptcha.secret', $config['secret']);
        

    } 
} 