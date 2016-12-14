<?php

namespace Lakion\SyliusCmsBundle\Factory;

use Doctrine\Common\Persistence\ObjectManager;
use Lakion\SyliusCmsBundle\Document\StringBlock;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class StringBlockFactory implements FactoryInterface
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
    private $stringBlockParentPath;

    /**
     * @param FactoryInterface $decoratedFactory
     * @param ObjectManager $documentManager
     * @param string $stringBlockParentPath
     */
    public function __construct(FactoryInterface $decoratedFactory, ObjectManager $documentManager, $stringBlockParentPath)
    {
        $this->decoratedFactory = $decoratedFactory;
        $this->documentManager = $documentManager;
        $this->stringBlockParentPath = $stringBlockParentPath;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        /** @var StringBlock $stringBlock */
        $stringBlock = $this->decoratedFactory->createNew();
        $stringBlock->setParentDocument($this->documentManager->find(null, $this->stringBlockParentPath));

        return $stringBlock;
    }
}
