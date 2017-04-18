<?php

namespace Lakion\CmsPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class StaticContentType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = [])
    {
        $builder
            ->add('publishable', CheckboxType::class, [
                'label' => 'lakion_cms.form.static_content.publishable',
            ])
            ->add('id', TextType::class, [
                'label' => 'lakion_cms.form.static_content.id',
            ])
            ->add('name', TextType::class, [
                'label' => 'lakion_cms.form.static_content.internal_name',
            ])
            ->add('locale', TextType::class, [
                'label' => 'lakion_cms.form.static_content.locale',
            ])
            ->add('title', TextType::class, [
                'label' => 'lakion_cms.form.static_content.title',
            ])
            ->add('routes', CollectionType::class, [
                'entry_type' => RouteType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'lakion_cms.form.static_content.routes',
             ])
            ->add('body', TextareaType::class, [
                'required' => false,
                'label' => 'lakion_cms.form.static_content.body',
            ])
            ->add('publishStartDate', DateTimeType::class, [
                'label' => 'lakion_cms.form.static_content.publish_start_date',
                'placeholder' => ['year' => '-', 'month' => '-', 'day' => '-'],
                'time_widget' => 'text',
            ])
            ->add('publishEndDate', DateTimeType::class, [
                'label' => 'lakion_cms.form.static_content.publish_end_date',
                'placeholder' => ['year' => '-', 'month' => '-', 'day' => '-'],
                'time_widget' => 'text',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lakion_cms_static_content';
    }
}
