# Sylius CMS Bundle by Lakion [![License](https://img.shields.io/packagist/l/lakion/sylius-cms-bundle.svg)](https://packagist.org/packages/lakion/sylius-cms-bundle) [![Version](https://img.shields.io/packagist/v/lakion/sylius-cms-bundle.svg)](https://packagist.org/packages/lakion/sylius-cms-bundle) [![Build status on Linux](https://img.shields.io/travis/Lakion/SyliusCmsBundle/master.svg)](http://travis-ci.org/Lakion/SyliusCmsBundle) [![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/Lakion/SyliusCmsBundle.svg)](https://scrutinizer-ci.com/g/Lakion/SyliusCmsBundle/)

Simple CMS for Sylius.

## Usage

1. Install PHPCR implementation of your choice:
 
    ```bash
    $ composer require jackalope/jackalope-doctrine-dbal
    ```

2. Install this bundle:

    ```bash
    $ composer require lakion/sylius-cms-bundle
    ```
    
3. Add this bundle & dependent ones to `AppKernel.php` if they do not exist yet:

    ```php
    new \Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
    new \Sonata\BlockBundle\SonataBlockBundle(),
    new \Sonata\CoreBundle\SonataCoreBundle(),
    new \Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
    new \Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
    new \Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
    new \Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
    new \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
    new \Lakion\SyliusCmsBundle\LakionSyliusCmsBundle(),
    ```

4. Import config file in `app/config/config.yml`:

    ```yaml
    imports:
       - { resource: "@LakionSyliusCmsBundle/Resources/config/app/config.yml" }
    ```

5. Import routing files in `app/config/routing.yml`:

    ```yaml
    lakion_sylius_cms_admin:
        resource: "@LakionSyliusCmsBundle/Resources/config/app/admin_routing.yml"
        prefix: /admin # root path of SyliusAdmin
    
    lakion_sylius_cms_shop:
        resource: "@LakionSyliusCmsBundle/Resources/config/app/shop_routing.yml"
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
    

## Complementary documentation

- [Sylius ResourceBundle](http://docs.sylius.org/en/latest/bundles/SyliusResourceBundle/)
- [Sylius GridBundle](http://docs.sylius.org/en/latest/bundles/SyliusGridBundle/)
