<?php

namespace Lakion\SyliusCmsBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class ContentMenuBuilder
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function configureMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $content = $menu
            ->addChild('content')
            ->setLabel('lakion_sylius_cms.menu.admin.main.content.header')
        ;
        $content
            ->addChild('static_contents', ['route' => 'lakion_sylius_cms_admin_static_content_index'])
            ->setLabel('lakion_sylius_cms.menu.admin.main.content.static_contents')
            ->setLabelAttribute('icon', 'file')
        ;
        $content
            ->addChild('routes', ['route' => 'lakion_sylius_cms_admin_route_index'])
            ->setLabel('lakion_sylius_cms.menu.admin.main.content.routes')
            ->setLabelAttribute('icon', 'sitemap')
        ;

        $content
            ->addChild('string_blocks', ['route' => 'lakion_sylius_cms_admin_string_block_index'])
            ->setLabel('lakion_sylius_cms.menu.admin.main.content.string_blocks')
            ->setLabelAttribute('icon', 'font')
        ;
    }
}
