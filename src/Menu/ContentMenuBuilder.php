<?php

namespace Lakion\SyliusCmsBundle\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class ContentMenuBuilder
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function configureRouteMenu(MenuBuilderEvent $event)
    {
        $contentMenu = $this->getContentMenu($event);

        $contentMenu
            ->addChild('routes', ['route' => 'lakion_sylius_cms_admin_route_index'])
            ->setLabel('lakion_sylius_cms.menu.admin.routes')
            ->setLabelAttribute('icon', 'sitemap')
        ;
    }

    /**
     * @param MenuBuilderEvent $event
     */
    public function configureStaticContentMenu(MenuBuilderEvent $event)
    {
        $contentMenu = $this->getContentMenu($event);

        $contentMenu
            ->addChild('static_contents', ['route' => 'lakion_sylius_cms_admin_static_content_index'])
            ->setLabel('lakion_sylius_cms.menu.admin.static_contents')
            ->setLabelAttribute('icon', 'file')
        ;
    }

    /**
     * @param MenuBuilderEvent $event
     */
    public function configureStringBlockMenu(MenuBuilderEvent $event)
    {
        $contentMenu = $this->getContentMenu($event);

        $contentMenu
            ->addChild('string_blocks', ['route' => 'lakion_sylius_cms_admin_string_block_index'])
            ->setLabel('lakion_sylius_cms.menu.admin.string_blocks')
            ->setLabelAttribute('icon', 'font')
        ;
    }

    /**
     * @param MenuBuilderEvent $event
     *
     * @return ItemInterface
     */
    private function getContentMenu(MenuBuilderEvent $event)
    {
        $adminMenu = $event->getMenu();
        $contentMenu = $adminMenu->getChild('content');

        if (null === $contentMenu) {
            $contentMenu = $adminMenu
                ->addChild('content')
                ->setLabel('lakion_sylius_cms.menu.admin.header')
            ;
        }

        return $contentMenu;
    }
}
