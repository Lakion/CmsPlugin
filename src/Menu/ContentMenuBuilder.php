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
            ->setLabel('sylius.menu.admin.main.content.header')
        ;
        $content
            ->addChild('static_contents', ['route' => 'sylius_admin_static_content_index'])
            ->setLabel('sylius.menu.admin.main.content.static_contents')
            ->setLabelAttribute('icon', 'file')
        ;
        $content
            ->addChild('routes', ['route' => 'sylius_admin_route_index'])
            ->setLabel('sylius.menu.admin.main.content.routes')
            ->setLabelAttribute('icon', 'sitemap')
        ;
    }
}
