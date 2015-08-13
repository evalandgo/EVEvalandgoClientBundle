<?php

namespace EV\EvalandgoClientBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class EVEvalandgoClientExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        foreach($config['users'] as $userName => $userLogin) {
            $container->setDefinition('ev_evalandgo_client.'.$userName.'.client', new Definition(
                'EvalandgoApiClient\Client',
                array(
                    $userLogin['client_id'],
                    $userLogin['client_secret'],
                    new Reference('ev_evalandgo_client.oauth2.storage.session')
                )
            ));
        }

        //$container->setParameter('ev_secure_switch_user.allowed_to_switch', $config['allowed_to_switch']);
    }
}
