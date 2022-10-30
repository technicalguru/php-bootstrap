# php-bootstrap
Provides Bootstrap links for PHP apps using the [twbs/bootstrap](https://packagist.org/packages/twbs/bootstrap) module.

# License
This project is licensed under [GNU LGPL 3.0](LICENSE.md). 

# Installation

## By Composer

```sh
composer require technicalguru/bootstrap
```

## By Package Download
You can download the source code packages from [GitHub Release Page](https://github.com/technicalguru/php-bootstrap/releases)

# How to use

## Get the provided version number

```
$version = \TgBootstrap\Bootstrap::getVersion();
```

## Get the URI of Bootstrap CSS stylesheet and JavaScript library

The following methods will give you URIs for your further inspection:

```
use TgBootstrap\Bootstrap;

// Get URI to all minified CSS
$uri = Bootstrap::getCssUri();

// Get URI to all uncompressed grid module CSS
$uri = Bootstrap::getCssUri('grid', FALSE);

// Get URI to minified Javascript bundle
$uri = Bootstrap::getJsUri();

// Get URI to minified, normal Bootstrap Javascript
$uri = Bootstrap::getJsUri(FALSE);

// Get URI to uncompressed, normal Bootstrap Javascript
$uri = Bootstrap::getJsUri(FALSE, FALSE);
```

You can get the correct HTML tags to be included in your HTML output in the same way:

```
use TgBootstrap\Bootstrap;

// Get HTML stylesheet tag to all minified CSS
$tag = Bootstrap::getCssLink();

// Get HTML stylesheet tag to all uncompressed grid module CSS
$tag = Bootstrap::getCssLink('grid', FALSE);

// Get HTML Javascript tag to minified Javascript bundle
$tag = Bootstrap::getJsLink();

// Get HTML Javascript tag to minified, normal Bootstrap Javascript
$tag = Bootstrap::getJsLink(FALSE);

// Get HTML Javascript tag to uncompressed, normal Bootstrap Javascript
$tag = Bootstrap::getJsLink(FALSE, FALSE);
```

All methods will throw an `BootstrapException` when you ask for a non-existing library.

# Contribution
Report a bug, request an enhancement or pull request at the [GitHub Issue Tracker](https://github.com/technicalguru/php-bootstrap/issues).

