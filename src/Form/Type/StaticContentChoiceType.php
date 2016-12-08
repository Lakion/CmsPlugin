<?php

namespace Lakion\SyliusCmsBundle\Form\Type;

use Doctrine\Bundle\PHPCRBundle\Form\Type\DocumentType;
use Symfony\Component\Form\AbstractType;

final class StaticContentChoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return DocumentType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lakion_sylius_cms_static_content_choice';
    }
}
