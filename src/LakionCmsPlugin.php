<?php

namespace Lakion\CmsPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

final class LakionCmsPlugin extends AbstractResourceBundle
{
    use SyliusPluginTrait;

    /**
     * {@inheritdoc}
     */
    public function getSupportedDrivers(): array
    {
        return [SyliusResourceBundle::DRIVER_DOCTRINE_PHPCR_ODM];
    }
}
