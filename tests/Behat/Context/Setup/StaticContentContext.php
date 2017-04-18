<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Lakion\CmsPlugin\Document\StaticContent;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Behat\Service\SharedStorageInterface;

final class StaticContentContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ExampleFactoryInterface
     */
    private $staticContentExampleFactory;

    /**
     * @var ObjectManager
     */
    private $staticContentManager;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ExampleFactoryInterface $staticContentExampleFactory
     * @param ObjectManager $staticContentManager
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ExampleFactoryInterface $staticContentExampleFactory,
        ObjectManager $staticContentManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->staticContentExampleFactory = $staticContentExampleFactory;
        $this->staticContentManager = $staticContentManager;
    }

    /**
     * @Given the store has static content :title
     */
    public function theStoreHasStaticContent($title)
    {
        $staticContent = $this->staticContentExampleFactory->create(['title' => $title, 'publishable' => true]);

        $this->staticContentManager->persist($staticContent);
        $this->staticContentManager->flush();

        $this->sharedStorage->set('static_content', $staticContent);
    }

    /**
     * @Given the store has static contents :firstTitle and :secondTitle
     */
    public function theStoreHasStaticContents(...$titles)
    {
        foreach ($titles as $title) {
            $this->theStoreHasStaticContent($title);
        }
    }

    /**
     * @Given the store has static content :title with body :body
     */
    public function theStoreHasStaticContentWithBody($title, $body)
    {
        $staticContent = $this->staticContentExampleFactory->create([
            'title' => $title,
            'body' => $body,
            'publishable' => true,
        ]);

        $this->staticContentManager->persist($staticContent);
        $this->staticContentManager->flush();

        $this->sharedStorage->set('static_content', $staticContent);
    }

    /**
     * @Given the store has static content :title with name :name
     */
    public function theStoreHasStaticContentWithName($title, $name)
    {
        $staticContent = $this->staticContentExampleFactory->create([
            'title' => $title,
            'name' => $name,
            'publishable' => true,
        ]);

        $this->staticContentManager->persist($staticContent);
        $this->staticContentManager->flush();

        $this->sharedStorage->set('static_content', $staticContent);
    }

    /**
     * @Given /^(it) is not published yet$/
     */
    public function itIsNotPublishedYet(StaticContent $staticContent)
    {
        $staticContent->setPublishable(false);

        $this->staticContentManager->flush();
    }
}
