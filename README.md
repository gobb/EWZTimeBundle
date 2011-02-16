Provides a time helper to Symfony2 projects.

Installation
============

Enable the helper in your app/config/config.yml:

    ewz_time: ~ # Enable the helper for use in templates

Add the EWZ namespace to your app/autoload.php:

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
