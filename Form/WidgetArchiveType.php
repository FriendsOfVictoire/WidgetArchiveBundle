<?php

namespace Victoire\Widget\ArchiveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\EntityProxyFormType;
use Victoire\Bundle\CoreBundle\Form\WidgetType;


/**
 * WidgetArchive form type
 */
class WidgetArchiveType extends WidgetType
{
    /**
     * Define form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('page',
            null,
            array(
                "label" => "",
                "attr" => array("class" => "hide")
            )
        );
        $builder->add('slot', 'hidden');
    }

    /**
     * bind form to WidgetRedactor entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Victoire\Widget\ArchiveBundle\Entity\WidgetArchive',
            'widget' => 'archive'
        ));
    }

    /**
     * get form name
     *
     * @return String The widget name
     */
    public function getName()
    {
        return 'victoire_widget_form_archive';
    }
}
