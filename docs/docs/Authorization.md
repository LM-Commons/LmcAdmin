---
sidebar_position: 4
---
# Authorization
LmcAdmin allows authorization via [LmcRbacMvc](https://github.com/LM-Commons/LmcRbacMvc). Configuration for LmcRbacMvc module is provided to easily configure LmcAdmin. Authorization enables you to restrict access to `/admin` and every other page under LmcAdmin.

## LmcRbacMvc authorization
LmcRbacMvc works with `Laminas\Permission\Rbac` as access restriction component. The LmcRbacMvc module combines `Laminas\Permission\Rbac` with the standard user module [LmcUser](https://github.com/LM-Commons/LmcUser). To enable access restriction with LmcRbacMvc, install the module and enable it in your `application.config.php`.

Furthermore, LmcAdmin has a `lmcadmin.global.php` file in the [config](../config/) directory. Copy this file over to your `config/autoload` directory. It directly provides LmcRbacMvc configuration to restrict access to users for the `/admin` route. Only users in the "admin" group are allowed to access LmcAdmin's pages.

Instructions for further configuration of LmcRbacMvc are provided in the [repository of LmcRbacMvc](https://github.com/LM-Commons/LmcRbacMvc).
