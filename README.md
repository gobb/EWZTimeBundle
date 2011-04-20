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
    <?php echo $view['time']->diff($dateTime); // returns something like "180" seconds ?>

**Use the helper with twig**

    {{ time_ago(DateTimeObject) }}
    {{ time_diff(DateTimeObject) }}
