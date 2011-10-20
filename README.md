EWZTimeBundle
=============

This bundle provides easy time helper for Symfony2.

## Installation

Installation depends on how your project is setup:

### Step 1: Installation using the `bin/vendors.php` method

If you're using the `bin/vendors.php` method to manage your vendor libraries,
add the following entry to the `deps` in the root of your project file:

```
[EWZTimeBundle]
    git=http://github.com/excelwebzone/EWZTimeBundle.git
    target=/bundles/EWZ/Bundle/EWZTimeBundle
```

Next, update your vendors by running:

``` bash
$ ./bin/vendors
```

Great! Now skip down to *Step 2*.

### Step 1 (alternative): Installation with submodules

If you're managing your vendor libraries with submodules, first create the
`vendor/bundles/EWZ/Bundle` directory:

``` bash
$ mkdir -pv vendor/bundles/EWZ/Bundle
```

Next, add the necessary submodule:

``` bash
$ git submodule add git://github.com/excelwebzone/EWZTimeBundle.git vendor/bundles/EWZ/Bundle/EWZTimeBundle
```

### Step2: Configure the autoloader

Add the following entry to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...

    'EWZ' => __DIR__.'/../vendor/bundles',
));
```

### Step3: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new EWZ\Bundle\TimeBundle\EWZTimeBundle(),
    );
}
```

Congratulations! You're ready!

## Basic Usage

Here are 2 example to retrieve time from a given datetime, and the difference in seconds:

``` jinja
{{ ewz_time_ago(DateTimeObject) }}
{{ ewz_time_diff(DateTimeObject) }}
```

Or if you're using PHP templates:

``` php
<?php echo $view['ewz_time']->ago($dateTime); // returns something like "3 minutes ago" ?>
<?php echo $view['ewz_time']->diff($dateTime); // returns something like "180" seconds ?>
```
