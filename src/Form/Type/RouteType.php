<?php

namespace Lakion\SyliusCmsBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class RouteType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = [])
    {
        $builder
            ->add('name', null, [
                'label' => 'sylius.form.route.name',
            ])
            ->add('content', 'sylius_static_content_choice', [
                'label' => 'sylius.form.route.content',
                'property' => 'title',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_route';
    }
}
