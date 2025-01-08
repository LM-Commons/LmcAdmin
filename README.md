# LmcAdmin Module for Laminas Framework

[![Latest Stable Version](https://poser.pugx.org/lm-commons/lmc-admin/v/stable)](https://packagist.org/packages/lm-commons/lmc-admin)
[![Total Downloads](http://poser.pugx.org/lm-commons/lmc-admin/downloads)](https://packagist.org/packages/lm-commons/lmc-admin)
[![License](http://poser.pugx.org/lm-commons/lmc-admin/license)](https://packagist.org/packages/lm-commons/lmc-admin)
[![PHP Version Require](http://poser.pugx.org/lm-commons/lmc-admin/require/php)](https://packagist.org/packages/lm-commons/lmc-admin)

Originally created by [Jurian Sluiman](http://juriansluiman.nl) and [Martin Shwalbe](https://github.com/Hounddog).

## Introduction

LmcAdmin is a minimal admin interface for generic administrative purposes. It is a common screen with navigation that hides behind authentication and authorization.

## Requirements

- PHP 8.1 or higher

## Installation

LmcAdmin is enabled to be installed via composer.

```bash
$ composer require lm-commons/lmc-admin
```

Enable the module by adding `Lmc\Admin` key to your `application.config.php` or `modules.config.php` file.

Customize the module by copy-pasting the `config/lmcadmin.global.php.dist` file to your `config/autoload` folder.

## Usage

LmcAdmin allows you to create routes under a single parent "lmcadmin" route. You can also use it to enable navigation in
your admin layout. Furthermore, integration of [LmcRbacMvc](https://github.com/LM-Commons/LmcRbacMvc) is provided.

The complete configuration is flexible, so you can update the lmc_admin parent route, its children, the navigation
and all default provided view scripts. Read more in the [documentation](https://lm-commons.github.io/LmcAdmin) about
usage and customization of LmcAdmin.

## Support

- File issues at https://github.com/LM-Commons/LmcAdmin/issues.
- Ask questions in the [LM-Commons Slack](https://join.slack.com/t/lm-commons/shared_invite/zt-2gankt2wj-FTS45hp1W~JEj1tWvDsUHQ) chat.
