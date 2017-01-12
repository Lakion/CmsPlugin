<?php

namespace Lakion\SyliusCmsBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\TaxonomyBundle\Form\Type\TaxonChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class TaxonBlockType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'lakion_sylius_cms.form.taxon_block.name',
            ])
            ->add('title', TextType::class, [
                'label' => 'lakion_sylius_cms.form.taxon_block.title',
            ])
            ->add('body', TextType::class, [
                'label' => 'lakion_sylius_cms.form.taxon_block.body',
            ])
            ->add('linkUrl', TextType::class, [
                'label' => 'lakion_sylius_cms.form.taxon_block.link',
            ])
            ->add('image', FileType::class, [
                'label' => 'lakion_sylius_cms.form.taxon_block.image',
            ])
            ->add('taxon', TaxonChoiceType::class, [
                'label' => 'lakion_sylius_cms.form.taxon_block.taxon',
                'multiple' => false,
                'required' => true,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lakion_sylius_cms_taxon_block';
    }
}
