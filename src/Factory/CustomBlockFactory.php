<?php

namespace Lakion\SyliusCmsBundle\Factory;

use Doctrine\Common\Persistence\ObjectManager;
use Lakion\SyliusCmsBundle\Document\CustomBlock;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class CustomBlockFactory implements FactoryInterface
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
    private $customBlockParentPath;

    /**
     * @param FactoryInterface $decoratedFactory
     * @param ObjectManager $documentManager
     * @param string $customBlockParentPath
     */
    public function __construct(FactoryInterface $decoratedFactory, ObjectManager $documentManager, $customBlockParentPath)
    {
        $this->decoratedFactory = $decoratedFactory;
        $this->documentManager = $documentManager;
        $this->customBlockParentPath = $customBlockParentPath;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        /** @var CustomBlock $customBlock */
        $customBlock = $this->decoratedFactory->createNew();
        $customBlock->setParentDocument($this->documentManager->find(null, $this->customBlockParentPath));

        return $customBlock;
    }
}
