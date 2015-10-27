Victoire DCMS Blog Archive Bundle
============

##What is the purpose of this bundle

This bundles gives you access to the *Archive Widget* which enables the Blog posts's archive.

##Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/setup.md)*

##Install the bundle

    php composer.phar require friendsofvictoire/archive-widget

###Reminder

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
