<?php

namespace Victoire\ArchiveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\CmsBundle\Form\EntityProxyFormType;
use Victoire\CmsBundle\Form\WidgetType;


/**
 * WidgetArchive form type
 */
class WidgetArchiveType extends WidgetType
{

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('page', null,
                    array(
                        "label" => "",
                        "attr" =>array("class" => "hide")
                    )
                )
                ->add('slot', 'hidden');
    }


    /**
     * bind form to WidgetRedactor entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Victoire\ArchiveBundle\Entity\WidgetArchive',
            'widget' => 'archive'
        ));
    }


    /**
     * get form name
     */
    public function getName()
    {
        return 'appventus_venatorcmsbundle_widgetarchivetype';
    }
}
