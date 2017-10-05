<?php

namespace Lakion\CmsPlugin\Fixture;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class StaticContentFixture extends AbstractResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'lakion_cms_static_content';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode): void
    {
        $resourceNode
            ->children()
                ->scalarNode('title')->end()
                ->scalarNode('name')->end()
                ->scalarNode('body')->end()
                ->scalarNode('meta_keywords')->end()
                ->scalarNode('meta_description')->end()
                ->booleanNode('publishable')->end()
        ;
    }
}
