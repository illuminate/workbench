# Illuminate Workbench

That package provides a easy way to develop Laravel packages.

# Instalation

Download the package

```bash
composer require illuminate/workbench
```

Register the service provider on config/app.php:

```
'Illuminate\Workbench\WorkbenchServiceProvider',
```

add that lines at end of file bootstrap/autoload.php:

```php
if(is_dir($workbenchPath = __DIR__.'/../workbench')){
    $workbench = new \Illuminate\Workbench\Starter;
    
    $workbench->start($workbenchPath);
}
```

Create your own config/workbench.php with:

```php
return [
  'name' => 'Your name here',
  'email' => 'YourEmail@example.com'
];
```

And that is all!

# Usage

```
php artisan workbench vendor/package-name
```

That will create the files you need to develop a new package on <code>workbench/vendor-name/package-name</code>.

Or just clone the package you want to develop into <code>workbench/vendor-name/package-name</code> and on that dir run:

```bash
composer install
```
