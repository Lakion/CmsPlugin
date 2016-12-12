<?php

namespace Lakion\SyliusCmsBundle\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Parameter;

final class LakionSyliusCmsExtension extends AbstractResourceExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $config = $this->processConfiguration($this->getConfiguration($config, $container), $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $this->registerResources('sylius', SyliusResourceBundle::DRIVER_DOCTRINE_PHPCR_ODM, $config['resources'], $container);

        $loader->load('services.xml');

        $staticContentRepository = $container->getDefinition('sylius.repository.static_content');
        $staticContentRepository->addArgument(new Parameter('cmf_content.persistence.phpcr.content_basepath'));
    }
}
