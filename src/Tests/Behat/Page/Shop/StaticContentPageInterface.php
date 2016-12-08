<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lakion\SyliusCmsBundle\Tests\Behat\Page\Shop;

use Lakion\SyliusCmsBundle\Tests\Behat\Page\SymfonyPageInterface;
use Lakion\SyliusCmsBundle\Document\StaticContent;

/**
 * @author Kamil Kokot <kamil.kokot@lakion.com>
 */
interface StaticContentPageInterface extends SymfonyPageInterface
{
    /**
     * @param string $path
     */
    public function access($path);

    /**
     * @param StaticContent $staticContent
     *
     * @throws \InvalidArgumentException
     */
    public function assertPageHasContent(StaticContent $staticContent);
}
