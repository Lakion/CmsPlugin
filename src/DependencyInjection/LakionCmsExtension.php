<?php

namespace Lakion\CmsPlugin\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Parameter;

final class LakionCmsExtension extends AbstractResourceExtension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $this->registerResources('lakion_cms', SyliusResourceBundle::DRIVER_DOCTRINE_PHPCR_ODM, $config['resources'], $container);

        $loader->load('services.xml');

        $staticContentRepository = $container->getDefinition('lakion_cms.repository.static_content');
        $staticContentRepository->addArgument(new Parameter('cmf_content.persistence.phpcr.content_basepath'));
    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $container->getExtensionConfig($this->getAlias()));

        $this->registerResources('lakion_cms', SyliusResourceBundle::DRIVER_DOCTRINE_PHPCR_ODM, $config['resources'], $container);
    }
}
