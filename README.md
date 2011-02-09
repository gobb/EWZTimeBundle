Provides a time helper to Symfony2 projects.

Installation
============

Enable the helper in your app/config/config.yml:

    time.helper: ~ # Enable the helper for use in templates

Usage
-----

**Use the helper with PHP**

    <?php echo $view['time']->ago($dateTime); // returns something like "3 minutes ago" ?>

**Use the helper with twig**

    {{ _view.time.ago(DateTimeObject) }}
