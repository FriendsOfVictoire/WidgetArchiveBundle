Victoire CMS Archive Bundle
============

Need to add a archive in a victoire cms website ?
Get this archive bundle and so on

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require friendsvictoire/archive-widget

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\ArchiveBundle\VictoireWidgetArchiveBundle(),
            );

            return $bundles;
        }
    }
