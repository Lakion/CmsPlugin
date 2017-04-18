<?php

namespace Lakion\CmsPlugin\Fixture;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class ProductBlockFixture extends AbstractResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'lakion_cms_product_block';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode)
    {
        $resourceNode
            ->children()
                ->scalarNode('name')->end()
                ->scalarNode('title')->end()
                ->scalarNode('body')->end()
                ->scalarNode('link')->end()
                ->scalarNode('product')->end()
        ;
    }
}
