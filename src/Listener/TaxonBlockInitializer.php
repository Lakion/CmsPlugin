<?php

namespace Lakion\CmsPlugin\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Lakion\CmsPlugin\Document\TaxonBlock;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class TaxonBlockInitializer
{
    /**
     * @var RepositoryInterface
     */
    private $taxonRepository;

    /**
     * @param RepositoryInterface $taxonRepository
     */
    public function __construct(RepositoryInterface $taxonRepository)
    {
        $this->taxonRepository = $taxonRepository;
    }

    public function postLoad(LifecycleEventArgs $event)
    {
        $taxonBlock = $event->getObject();

        if (!$taxonBlock instanceof TaxonBlock) {
            return;
        }

        /** @var TaxonInterface|null $taxon */
        $taxon = $this->taxonRepository->findOneBy(['code' => $taxonBlock->getTaxonCode()]);

        $taxonBlock->setTaxon($taxon);
    }
}
