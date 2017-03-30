<?php

namespace Lakion\SyliusCmsBundle\DependencyInjection;

use Lakion\SyliusCmsBundle\Document\CustomBlock;
use Lakion\SyliusCmsBundle\Document\ProductBlock;
use Lakion\SyliusCmsBundle\Document\Route;
use Lakion\SyliusCmsBundle\Document\StaticContent;
use Lakion\SyliusCmsBundle\Document\StringBlock;
use Lakion\SyliusCmsBundle\Document\TaxonBlock;
use Lakion\SyliusCmsBundle\Form\Type\CustomBlockType;
use Lakion\SyliusCmsBundle\Form\Type\ProductBlockType;
use Lakion\SyliusCmsBundle\Form\Type\RouteType;
use Lakion\SyliusCmsBundle\Form\Type\StaticContentType;
use Lakion\SyliusCmsBundle\Form\Type\StringBlockType;
use Lakion\SyliusCmsBundle\Form\Type\TaxonBlockType;
use Lakion\SyliusCmsBundle\Repository\StaticContentRepository;
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
        $rootNode = $treeBuilder->root('lakion_sylius_cms');

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
}
