<?php

namespace Victoire\Widget\ArchiveBundle\Widget\Manager;


use Victoire\Bundle\CoreBundle\Widget\Managers\BaseWidgetManager;
use Victoire\Bundle\CoreBundle\Entity\Widget;
use Victoire\Bundle\CoreBundle\Widget\Managers\WidgetManagerInterface;

/**
 * CRUD operations on WidgetRedactor Widget
 *
 * The widget view has two parameters: widget and content
 *
 * widget: The widget to display, use the widget as you wish to render the view
 * content: This variable is computed in this WidgetManager, you can set whatever you want in it and display it in the show view
 *
 * The content variable depends of the mode: static/businessEntity/entity/query
 *
 * The content is given depending of the mode by the methods:
 *  getWidgetStaticContent
 *  getWidgetBusinessEntityContent
 *  getWidgetEntityContent
 *  getWidgetQueryContent
 *
 * So, you can use the widget or the content in the show.html.twig view.
 * If you want to do some computation, use the content and do it the 4 previous methods.
 *
 * If you just want to use the widget and not the content, remove the method that throws the exceptions.
 *
 * By default, the methods throws Exception to notice the developer that he should implements it owns logic for the widget
 *
 */
class WidgetArchiveManager extends BaseWidgetManager implements WidgetManagerInterface
{
    /**
     * The name of the widget
     *
     * @return string
     */
    public function getWidgetName()
    {
        return 'Archive';
    }

    /**
     * Get the static content of the widget
     *
     * @param Widget $widget
     * @return string The static content
     *
     * @SuppressWarnings checkUnusedFunctionParameters
     */
    protected function getWidgetStaticContent(Widget $widget)
    {
        $em = $this->getEntityManager();

        $articleRepo = $em->getRepository('VictoireBlogBundle:Article');

        $articles = $articleRepo->findBy(array(), array('createdAt'=>'DESC'));

        $articlesArray = array();

        //parse article
        foreach ($articles as $article) {
            $creationYear = $article->getCreatedAt()->format('Y');
            $creationMonth = $article->getCreatedAt()->format('F');
            $articlesArray[$creationYear][$creationMonth][] = $article;
        }

        return $articlesArray;
    }
}
