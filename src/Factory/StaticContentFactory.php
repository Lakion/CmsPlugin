<?php

namespace Lakion\SyliusCmsBundle\Factory;

use Doctrine\Common\Persistence\ObjectManager;
use Lakion\SyliusCmsBundle\Document\StaticContent;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class StaticContentFactory implements FactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $decoratedFactory;

    /**
     * @var ObjectManager
     */
    private $documentManager;

    /**
     * @var string
     */
    private $staticContentParentPath;

    /**
     * @param FactoryInterface $decoratedFactory
     * @param ObjectManager $documentManager
     * @param string $staticContentParentPath
     */
    public function __construct(FactoryInterface $decoratedFactory, ObjectManager $documentManager, $staticContentParentPath)
    {
        $this->decoratedFactory = $decoratedFactory;
        $this->documentManager = $documentManager;
        $this->staticContentParentPath = $staticContentParentPath;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        /** @var StaticContent $staticContent */
        $staticContent = $this->decoratedFactory->createNew();
        $staticContent->setParentDocument($this->documentManager->find(null, $this->staticContentParentPath));

        return $staticContent;
    }
}
