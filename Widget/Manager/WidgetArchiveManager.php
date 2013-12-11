<?php

namespace Victoire\ArchiveBundle\Widget\Manager;


use Victoire\ArchiveBundle\Form\WidgetArchiveType;
use Victoire\ArchiveBundle\Entity\WidgetArchive;

class WidgetArchiveManager
{
protected $container;

    /**
     * constructor
     *
     * @param ServiceContainer $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * create a new WidgetArchive
     * @param Page   $page
     * @param string $slot
     *
     * @return $widget
     */
    public function newWidget($page, $slot)
    {
        $widget = new WidgetArchive();
        $widget->setPage($page);
        $widget->setslot($slot);

        return $widget;
    }
    /**
     * render the WidgetArchive
     * @param Widget $widget
     *
     * @return widget show
     */
    public function render($widget, $page)
    {

        $articleRepo = $this->container->get('doctrine.orm.entity_manager')->getRepository('VictoireBlogBundle:Article');

        $articles = $articleRepo->findBy(array(), array('createdAt'=>'DESC'));
        $articlesArray = array();
        foreach ($articles as $article) {
            $creationYear = $article->getCreatedAt()->format('Y');
            $creationMonth = $article->getCreatedAt()->format('F');
            $articlesArray[$creationYear][$creationMonth][] = $article;
        }


        return $this->container->get('victoire_templating')->render(
            "VictoireArchiveBundle:Widget:archive/show.html.twig",
            array(
                "widget" => $widget,
                "articles" => $articlesArray,
                "page" => $page
            )
        );
    }

    /**
     * render WidgetArchive form
     * @param Form           $form
     * @param WidgetArchive $widget
     * @param BusinessEntity $entity
     * @return form
     */
    public function renderForm($form, $widget, $entity = null)
    {

        return $this->container->get('victoire_templating')->render(
            "VictoireArchiveBundle:Widget:Archive/edit.html.twig",
            array(
                "widget" => $widget,
                'form'   => $form->createView(),
                'id'     => $widget->getId(),
                'entity' => $entity
            )
        );
    }

    /**
     * create a form with given widget
     * @param WidgetArchive $widget
     * @param string        $entityName
     * @param string        $namespace
     * @return $form
     */
    public function buildForm($widget, $entityName = null, $namespace = null)
    {
        $form = $this->container->get('form.factory')->create(new WidgetArchiveType($entityName, $namespace), $widget);

        return $form;
    }

    /**
     * create form new for WidgetArchive
     * @param Form           $form
     * @param WidgetArchive  $widget
     * @param string         $slot
     * @param Page           $page
     * @param string         $entity
     *
     * @return new form
     */
    public function renderNewForm($form, $widget, $slot, $page, $entity = null)
    {

        return $this->container->get('victoire_templating')->render(
            "VictoireArchiveBundle:Widget:archive/new.html.twig",
            array(
                "widget"          => $widget,
                'form'            => $form->createView(),
                "slot"            => $slot,
                "entity"          => $entity,
                "renderContainer" => true,
                "page"            => $page
            )
        );
    }
}
