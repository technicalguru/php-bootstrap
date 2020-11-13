# php-font-awesome
Provides Free Font Awesome icons for PHP apps.

# License
This project is licensed under [GNU LGPL 3.0](LICENSE.md). 

# Installation

## By Composer

```
composer install technicalguru/font-awesome
```

## By Package Download
You can download the source code packages from [GitHub Release Page](https://github.com/technicalguru/php-font-awesome/releases)

# How to use

## Get the provided version number

```
$version = \TgFontAwesome\FontAwesome::getVersion();
```

## Get the URI of a font library

The following method will give you URIs for your further inspection:

```
use TgFontAwesome\FontAwesome;

// Get URI to all icons library, as minified CSS
$uri = FontAwesome::getUri();

// Get URI to all icons library, as uncompressed CSS
$uri = FontAwesome::getUri('all');

// Get URI to all icons library, as minified Javascript
$uri = FontAwesome::getUri('all.min', FontAwesome::JS);
```

You can get the correct HTML script tag to be included in your HTML output in the same way:

```
use TgFontAwesome\FontAwesome;

// Get <link> stylesheet tag to all icons library, as minified CSS
$tag = FontAwesome::getLink();

// Get <link> stylesheet tag to all icons library, as uncompressed CSS
$tag = FontAwesome::getLink('all');

// Get <script> tag to all icons library, as minified Javascript
$tag = FontAwesome::getLink('all.min', FontAwesome::JS);
```

All methods will throw an `FontAwesomeException` when you ask for a non-existing library.

# Contribution
Report a bug, request an enhancement or pull request at the [GitHub Issue Tracker](https://github.com/technicalguru/php-font-awesome/issues).

