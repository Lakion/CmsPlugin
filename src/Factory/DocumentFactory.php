<?php

namespace Lakion\CmsPlugin\Factory;

use Doctrine\ODM\PHPCR\DocumentManagerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DocumentFactory implements FactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $decoratedFactory;

    /**
     * @var DocumentManagerInterface
     */
    private $documentManager;

    /**
     * @var string
     */
    private $parentPath;

    /**
     * @param FactoryInterface $decoratedFactory
     * @param DocumentManagerInterface $documentManager
     * @param string $parentPath
     */
    public function __construct(FactoryInterface $decoratedFactory, DocumentManagerInterface $documentManager, $parentPath)
    {
        $this->decoratedFactory = $decoratedFactory;
        $this->documentManager = $documentManager;
        $this->parentPath = $parentPath;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        $document = $this->decoratedFactory->createNew();
        $document->setParentDocument($this->documentManager->find(null, $this->parentPath));

        return $document;
    }
}
