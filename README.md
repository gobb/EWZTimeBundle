Provides a time helper to Symfony2 projects.

Installation
============

**Add TimeBundle to your application kernel:**

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new EWZ\Bundle\TimeBundle\EWZTimeBundle(),
            // ...
        );
    }

**Add the EWZ namespace to your autoloader:**

    // app/autoload.php
    $loader->registerNamespaces(array(
        ...
        'EWZ' => __DIR__.'/../src',
    ));

Usage
-----

**Use the helper with PHP**

    <?php echo $view['time']->ago($dateTime); // returns something like "3 minutes ago" ?>

**Use the helper with twig**

    {{ _view.time.ago(DateTimeObject) }}
