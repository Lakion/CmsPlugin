# CMS Plugin by Lakion [![License](https://img.shields.io/packagist/l/lakion/cms-plugin.svg)](https://packagist.org/packages/lakion/cms-plugin) [![Version](https://img.shields.io/packagist/v/lakion/cms-plugin.svg)](https://packagist.org/packages/lakion/cms-plugin) [![Build status on Linux](https://img.shields.io/travis/Lakion/CmsPlugin/master.svg)](http://travis-ci.org/Lakion/CmsPlugin) [![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/Lakion/CmsPlugin.svg)](https://scrutinizer-ci.com/g/Lakion/CmsPlugin/)

Simple CMS for Sylius.

## Usage

1. Install PHPCR implementation of your choice:

    ```bash
    $ composer require jackalope/jackalope-doctrine-dbal
    ```

2. Install this bundle:

    ```bash
    $ composer require lakion/cms-plugin
    ```

3. Add this bundle & dependent ones to `AppKernel.php` if they do not exist yet:

    ```php
    new \Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
    new \Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
    new \Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
    new \Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
    new \Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
    new \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
    new \Lakion\CmsPlugin\LakionCmsPlugin(),
    ```

4. Import config file in `app/config/config.yml`:

    ```yaml
    imports:
       - { resource: "@LakionCmsPlugin/Resources/config/app/config.yml" }
    ```

5. Import routing files in `app/config/routing.yml`:

    ```yaml
    lakion_cms_admin:
        resource: "@LakionCmsPlugin/Resources/config/app/admin_routing.yml"
        prefix: /admin # root path of SyliusAdmin

    lakion_cms_shop:
        resource: "@LakionCmsPlugin/Resources/config/app/shop_routing.yml"
    ```

6. Configure Doctrine PHPCR Bundle (`doctrine_phpcr`) in `app/config/config.yml`:

    ```yaml
    doctrine_phpcr:
        session:
            backend:
                type: doctrinedbal
                connection: default
            workspace: default
        odm:
            auto_mapping: true
            auto_generate_proxy_classes: "%kernel.debug%"

    sylius_resource:
         drivers:
            - doctrine/orm
            - doctrine/phpcr-odm

    sylius_grid:
         drivers:
            - doctrine/orm
            - doctrine/phpcr-odm
    ```

7. Update your database schema when using Doctrine

    Using the schema updater:

    ```bash
    $ bin/console doctrine:schema:update
    ```

    Or migrations:

    ```bash
    $ bin/console doctrine:migrations:diff
    $ bin/console doctrine:migrations:migrate
    ```

8. Initialize the Doctrine PHPCR repository

    ```bash
    $ bin/console doctrine:phpcr:repository:init
    ```

## Complementary documentation

- [Sylius ResourceBundle](http://docs.sylius.org/en/latest/bundles/SyliusResourceBundle/)
- [Sylius GridBundle](http://docs.sylius.org/en/latest/bundles/SyliusGridBundle/)
