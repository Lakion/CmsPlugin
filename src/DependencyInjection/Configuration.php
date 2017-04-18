<?php

namespace Lakion\CmsPlugin\DependencyInjection;

use Lakion\CmsPlugin\Document\CustomBlock;
use Lakion\CmsPlugin\Document\ProductBlock;
use Lakion\CmsPlugin\Document\Route;
use Lakion\CmsPlugin\Document\StaticContent;
use Lakion\CmsPlugin\Document\StringBlock;
use Lakion\CmsPlugin\Form\Type\CustomBlockType;
use Lakion\CmsPlugin\Form\Type\ProductBlockType;
use Lakion\CmsPlugin\Form\Type\RouteType;
use Lakion\CmsPlugin\Form\Type\StaticContentType;
use Lakion\CmsPlugin\Form\Type\StringBlockType;
use Lakion\CmsPlugin\Repository\StaticContentRepository;
use Lakion\CmsPlugin\Document\TaxonBlock;
use Lakion\CmsPlugin\Form\Type\TaxonBlockType;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lakion_cms');

        $this->addResourcesSection($rootNode->children());

        return $treeBuilder;
    }

    /**
     * @param NodeBuilder $rootNodeBuilder
     */
    private function addResourcesSection(NodeBuilder $rootNodeBuilder)
    {
        $resourcesNodeBuilder = $rootNodeBuilder->arrayNode('resources')->addDefaultsIfNotSet()->children();

        $this->addResourcesCustomBlockSection($resourcesNodeBuilder);
        $this->addResourcesProductBlockSection($resourcesNodeBuilder);
        $this->addResourcesRouteSection($resourcesNodeBuilder);
        $this->addResourcesStaticContentSection($resourcesNodeBuilder);
        $this->addResourcesStringBlockSection($resourcesNodeBuilder);
        $this->addResourcesTaxonBlockSection($resourcesNodeBuilder);
    }

    /**
     * @param NodeBuilder $resourcesNodeBuilder
     */
    private function addResourcesCustomBlockSection(NodeBuilder $resourcesNodeBuilder)
    {
        $resourcesNodeBuilder
            ->arrayNode('custom_block')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('classes')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('model')->defaultValue(CustomBlock::class)->cannotBeEmpty()->end()
                            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                            ->scalarNode('repository')->cannotBeEmpty()->end()
                            ->scalarNode('form')->defaultValue(CustomBlockType::class)->cannotBeEmpty()->end()
        ;
    }

    /**
     * @param NodeBuilder $resourcesNodeBuilder
     */
    private function addResourcesProductBlockSection(NodeBuilder $resourcesNodeBuilder)
    {
        $resourcesNodeBuilder
            ->arrayNode('product_block')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('classes')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('model')->defaultValue(ProductBlock::class)->cannotBeEmpty()->end()
                            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                            ->scalarNode('repository')->cannotBeEmpty()->end()
                            ->scalarNode('form')->defaultValue(ProductBlockType::class)->cannotBeEmpty()->end()
        ;
    }

    /**
     * @param NodeBuilder $resourcesNodeBuilder
     */
    private function addResourcesRouteSection(NodeBuilder $resourcesNodeBuilder)
    {
        $resourcesNodeBuilder
            ->arrayNode('route')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('classes')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('model')->defaultValue(Route::class)->cannotBeEmpty()->end()
                            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                            ->scalarNode('repository')->cannotBeEmpty()->end()
                            ->scalarNode('form')->defaultValue(RouteType::class)->cannotBeEmpty()->end()
        ;
    }

    /**
     * @param NodeBuilder $resourcesNodeBuilder
     */
    private function addResourcesStaticContentSection(NodeBuilder $resourcesNodeBuilder)
    {
        $resourcesNodeBuilder
            ->arrayNode('static_content')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('classes')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('model')->defaultValue(StaticContent::class)->cannotBeEmpty()->end()
                            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                            ->scalarNode('repository')->defaultValue(StaticContentRepository::class)->cannotBeEmpty()->end()
                            ->scalarNode('form')->defaultValue(StaticContentType::class)->cannotBeEmpty()->end()
        ;
    }

    /**
     * @param NodeBuilder $resourcesNodeBuilder
     */
    private function addResourcesStringBlockSection(NodeBuilder $resourcesNodeBuilder)
    {
        $resourcesNodeBuilder
            ->arrayNode('string_block')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('classes')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('model')->defaultValue(StringBlock::class)->cannotBeEmpty()->end()
                            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                            ->scalarNode('repository')->cannotBeEmpty()->end()
                            ->scalarNode('form')->defaultValue(StringBlockType::class)->cannotBeEmpty()->end()
        ;
    }

    /**
     * @param NodeBuilder $resourcesNodeBuilder
     */
    private function addResourcesTaxonBlockSection(NodeBuilder $resourcesNodeBuilder)
    {
        $resourcesNodeBuilder
            ->arrayNode('taxon_block')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('classes')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('model')->defaultValue(TaxonBlock::class)->cannotBeEmpty()->end()
                            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                            ->scalarNode('repository')->cannotBeEmpty()->end()
                            ->scalarNode('form')->defaultValue(TaxonBlockType::class)->cannotBeEmpty()->end()
        ;
    }
}
