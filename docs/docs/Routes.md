---
sidebar_position: 2
---
# Routes
LmcAdmin enables a single route named `lmcadmin`, which is a literal route and standard using the url `/admin`. You can create child routes under `lmcadmin` so you enable urls like `/admin/foo` or `/admin/bar/baz`.

## Add child route
To register a route as child route, the following example takes the option you name that route `foo`. The complete path should look like `/admin/foo`, so `foo` is a literal route with the route value `/foo`. Say you want this route to connect to your `MyModule\Controller\MyController` controller and the `index` action, create this config in your `module.config.php`:

```php
    'router' => array(
        'routes' => array(
            'lmcadmin' => array(
                'child_routes' => array(
                    'foo' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/foo',
                            'defaults' => array(
                                'controller' => 'MyModule\Controller\MyController',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
```

## Change the `/admin` url
If you want your admin interface at `/backend` or something else, you must override the value of the route. In the following config, the `/admin` route value is replaced with `/backend`. Make sure this is enabled in a config where the module is registered *later* than LmcAdmin (otherwise, the config will not overwrite LmcAdmin's configuration):

```php
    'router' => array(
        'routes' => array(
            'lmcadmin' => array(
                'options' => array(
                    'route'    => '/backend',
            ),
        ),
    ),
```

## Change the controller behind `/admin`
By default, the `/admin` url links to the `LmcAdmin\Controller\AdminController` controller. It's an empty action and a simple view script is rendered. If you want, for example, create a dashboard on the admin index page, you probably need to point the route to another controller. In the following config, the `lmcadmin` route's controller is replaced with `MyModule/Controller/AdminController` and the action is set to `dashboard`. Make sure this is enabled in a config where the module is registered *later* than LmcAdmin (otherwise, the config will not overwrite LmcAdmin's configuration):

```php
    'router' => array(
        'routes' => array(
            'lmcadmin' => array(
                'options' => array(
                    'defaults' => array(
                        'controller' => 'MyModule/Controller/AdminController',
                        'action'     => 'dashboard',
                    ),
                ),
            ),
        ),
    ),
```
