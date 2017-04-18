<?php

namespace Lakion\CmsPlugin\Form\Type;

use Doctrine\Bundle\PHPCRBundle\Form\Type\DocumentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class StaticContentChoiceType extends AbstractType
{
    /**
     * @var string
     */
    private $dataClass;

    /**
     * @param string $dataClass
     */
    public function __construct($dataClass)
    {
        $this->dataClass = $dataClass;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('class', $this->dataClass);
    }

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
        return 'lakion_cms_static_content_choice';
    }
}
