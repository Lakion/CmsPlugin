<?php

namespace Lakion\CmsPlugin\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Lakion\CmsPlugin\Document\ProductBlock;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class ProductBlockInitializer
{
    /**
     * @var RepositoryInterface
     */
    private $productRepository;

    /**
     * @param RepositoryInterface $productRepository
     */
    public function __construct(RepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function postLoad(LifecycleEventArgs $event)
    {
        $productBlock = $event->getObject();

        if (!$productBlock instanceof ProductBlock) {
            return;
        }

        /** @var ProductInterface|null $product */
        $product = $this->productRepository->findOneBy(['code' => $productBlock->getProductCode()]);

        $productBlock->setProduct($product);
    }
}
