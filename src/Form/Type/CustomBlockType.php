<?php

namespace Lakion\CmsPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class CustomBlockType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = [])
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'lakion_cms.form.custom_block.name',
            ])
            ->add('title', TextType::class, [
                'label' => 'lakion_cms.form.custom_block.title',
            ])
            ->add('body', TextType::class, [
                'label' => 'lakion_cms.form.custom_block.body',
            ])
            ->add('linkUrl', TextType::class, [
                'label' => 'lakion_cms.form.custom_block.link',
            ])
            ->add('image', FileType::class, [
                'label' => 'lakion_cms.form.custom_block.image',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lakion_cms_custom_block';
    }
}
