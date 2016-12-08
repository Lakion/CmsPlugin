<?php

namespace Lakion\SyliusCmsBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

final class LakionSyliusCmsBundle extends AbstractResourceBundle
{
    /**
     * {@inheritdoc}
     */
    public function getSupportedDrivers()
    {
        return [SyliusResourceBundle::DRIVER_DOCTRINE_PHPCR_ODM];
    }
}
