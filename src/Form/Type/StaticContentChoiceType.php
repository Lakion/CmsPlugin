<?php

namespace Lakion\SyliusCmsBundle\Form\Type;

class StaticContentChoiceType extends ResourceChoiceType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(['property' => 'id']);
    }
}
