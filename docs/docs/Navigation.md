---
sidebar_position: 3
---
# Navigation
LmcAdmin allows a dedicated navigation structure for the admin interface. By default, LmcAdmin initiates a [Twitter Bootstrap](http://twitter.github.com/bootstrap) layout with on top the main admin navigation. These admin buttons are customizable.

## Add a page
The admin structure requires at least a `label` for the navigation element and a `route` or `url` parameter for the link to be created. The `route` will use the `url()` view helper to construct a link. It is recommended to use [routes](Routes) in your child pages of LmcAdmin and therefore it is straightforward to use the `route` parameter in the navigation configuration.

In the following example, there is a navigation element called "My Module" and points to `lmcadmin/foo/bar` as a route. This page is configured as follows:

```php
    'navigation' => array(
        'admin' => array(
            'my-module' => array(
                'label' => 'My Module',
                'route' => 'lmcadmin/foo/bar',
            ),
        ),
    ),
```

The navigation in LmcAdmin uses `Laminas\Navigation` and more information about the configuration of this component is located in the [Laminas Mvc Framework](https://docs.laminas.dev/laminas-navigation/quick-start/) reference guide.
