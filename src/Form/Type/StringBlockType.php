<?php

namespace Lakion\SyliusCmsBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class StringBlockType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = [])
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'lakion_sylius_cms.form.string_block.name',
            ])
            ->add('body', TextType::class, [
                'label' => 'lakion_sylius_cms.form.string_block.body',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lakion_sylius_cms_string_block';
    }
}
