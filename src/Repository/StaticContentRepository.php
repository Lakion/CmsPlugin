<?php

namespace Lakion\CmsPlugin\Repository;

use Doctrine\ODM\PHPCR\DocumentManagerInterface;
use Doctrine\ODM\PHPCR\Mapping\ClassMetadata;
use Lakion\CmsPlugin\Document\StaticContent;
use Sylius\Bundle\ResourceBundle\Doctrine\ODM\PHPCR\DocumentRepository;

class StaticContentRepository extends DocumentRepository implements StaticContentRepositoryInterface
{
    /**
     * @var string
     */
    private $staticContentPath;

    /**
     * @param DocumentManagerInterface $dm
     * @param ClassMetadata $class
     * @param string $staticContentPath
     */
    public function __construct(DocumentManagerInterface $dm, ClassMetadata $class, $staticContentPath)
    {
        parent::__construct($dm, $class);

        $this->staticContentPath = $staticContentPath;
    }

    /**
     * {@inheritdoc}
     */
    public function findPublishedOneByName($name)
    {
        /** @var StaticContent|null $staticContent */
        $staticContent = $this->find($this->staticContentPath . '/' . $name);

        if (null === $staticContent || !$staticContent->isPublishable()) {
            return null;
        }

        return $staticContent;
    }
}
