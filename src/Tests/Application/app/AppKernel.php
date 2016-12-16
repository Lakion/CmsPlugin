<?php

use Sylius\Bundle\CoreBundle\Application\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

final class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return array_merge([
            new \Lakion\SyliusCmsBundle\LakionSyliusCmsBundle(),
        ], parent::registerBundles(), [
            new \Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
            new \Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new \Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new \Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new \Symfony\Cmf\Bundle\MediaBundle\CmfMediaBundle(),

            new \Sonata\BlockBundle\SonataBlockBundle(),
            new \Sonata\CoreBundle\SonataCoreBundle(),
            new \Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),

            new \Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
            new \Sylius\Bundle\ShopBundle\SyliusShopBundle(),

            new \FOS\OAuthServerBundle\FOSOAuthServerBundle(), // Required by SyliusApiBundle
            new \Sylius\Bundle\ApiBundle\SyliusApiBundle(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config.yml');
    }
}
