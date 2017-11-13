J!Dump README
=============

Advanced print_r and var_dump replacer with object tree display.


[Vote for this extension at the JED](http://extensions.joomla.org/extensions/miscellaneous/development/1509)

Features
--------

This utility makes life easy for developers and template designers. You use it to
see what's inside a variable, an array or an object. Instead of using print_r() or
var_dump(), you can now use dump(). This will open a popup window with a nice expandable
tree, showing the contents of the variable. It will even show a list of available
methods for each object. You have to see it to believe it! You can use dump() in your
extensions, in the core, in libraries and even in templates.

**Warning!** This component is only meant to be used on development test sites, NOT
in live or production environments. If you must use it on a live site, don't do
stupid things like dump($password) !

Download
--------

- [Download ready-made package](https://github.com/mathiasverraes/jdump/releases/latest)
- ...or make your own with [Phing](http://www.phing.info/trac/wiki/Users/Download)

If you have phing installed:
--------

```shell
git clone git://github.com/mathiasverraes/jdump.git
cd jdump
phing
```

If you don't have phing installed but have composer installed
---------

> OpenSuse 42.3 phing from repo is incompatible with the latest PHP, so it was needed to go this way

```shell
git clone git://github.com/mathiasverraes/jdump.git
cd jdump
composer install
./vendor/bin/phing
```

The zip will be in the build/packages folder.

Installation
------------

Since 1.2.2 just install the package file (pkg_jdump_v*.zip). It will automatically install and publish JDump component and plugin.

For older versions: Install both the component and the plugin. Make sure the plugin is published. But
you probably figured that out already.

If you don't want the dump popup window to appear automatically, you can disable
it in the configuration. To display the dump window manually:

- **Administrator**: Go to Components -> J!Dump and click Popup.
- **Site**: Make a new menu item for J!Dump. Set it to 'Open in New Window'

Using J!Dump
------------

Anywhere in your code, type:

```php
dump($variable, 'Variable Name');
```

Simple huh? 'Variable Name' is optional and can be anything you like. If you use
a lot of dumps, you'll want to use some descriptive names.



Shortcuts
---------

```php
// Displays a whole bunch of system information.
dumpSysinfo();
```

```php
// Use inside a template's index.php to dump the parameters.
dumpTemplate($this);
```

```php
// Displays a custom message. Very handy to check if a function or a loop is executed etc...
dumpMessage('Your message');
```

```php
// Displays the backtrace.
dumpTrace();
```


Notes
-----

You can't use dump() in system plugins that are run before the J!Dump plugin is run,
so it is best to use ordering in the plugin manager to put J!Dump upfront.

J!Dump requires at least Joomla 2.5.5. If you need compatibility with an older version of J!Dump, please download
[v2012-10-08](https://github.com/downloads/mathiasverraes/jdump/unzip_first_jdump_v2012-10-08.zip).



Tips
---------

Tip 1 :
------------
If you want to dump an **SQL query of a Query Object**, JDump won't show anything ! ... you have to use the magic method **__toString()** :

```php
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('id, name, email');
$query->from('#__users');
$query->order('username DESC');

// display the content of an SQL query
dump($query->__toString(), "My SQL query to read users");

```

This will show :
"SELECT id, name, email FROM #__users ORDER BY username DESC"

Tip 2 :
------------
You want to be sure that your web site won't show a fatal error if you forget to remove a dump trace in your code, before running in production ?
In that case, you can add a IF test with 'if(function_exists("dump"))' just before calling "dump()". If the JDump plugin is uninstalled or unpublished, the **dump() method will not be called** :

```php
// ensure dump() is accessible
if(function_exists("dump")) dump($myVar, "My Var is");

```

Tip 3 :
------------
You want to get the **file path of a PHP script that contains a specific object** ?
You can use the implemention of the **Reflection process** (native PHP 5).
Execute the Reflection process on the name of the class set in parameter (ex : JModuleHelper).
Call the JDump method getFileName() method on the resulted object and it's done !

```php
// get the path of a PHP script Object
$ref = new ReflectionClass('JModuleHelper');
dump($ref->getFileName(), 'Reflection Class path for '.$ref->getName());

```
This will show :

![jdump-reflection_class](https://cloud.githubusercontent.com/assets/970021/11407200/92e255ea-93b1-11e5-979e-9ad64dabffd9.png)


Contributors
-------------

- Mathias Verraes (Lead)
- Jens-Christian Skibakk
- Tom Fuller
- Thomas Hunziker

Thanks to everybody who provided patches!

License
-------

J!Dump is licensed as GNU/GPL v2.

Credits
-------

This component includes Folder Tree Static by Alf Magne Kalleland. It is released
under LGPL and can be found at http://www.dhtmlgoodies.com/
