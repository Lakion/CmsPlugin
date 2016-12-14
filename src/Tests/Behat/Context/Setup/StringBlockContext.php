<?php

namespace Lakion\SyliusCmsBundle\Tests\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class StringBlockContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param FactoryInterface $factory
     * @param ObjectManager $manager
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        FactoryInterface $factory,
        ObjectManager $manager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->factory = $factory;
        $this->manager = $manager;
    }

    /**
     * @Given the store has string block :name
     */
    public function theStoreHasStringBlock($name)
    {
        $this->theStoreHasStringBlockWithBody($name, 'Random content');
    }

    /**
     * @Given the store has string block :name with body :body
     */
    public function theStoreHasStringBlockWithBody($name, $body)
    {
        $block = $this->factory->createNew();

        $block->setName($name);
        $block->setBody($body);

        $this->manager->persist($block);
        $this->manager->flush();

        $this->sharedStorage->set('string_block', $block);
    }
}
