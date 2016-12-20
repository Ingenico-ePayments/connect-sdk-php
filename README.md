# Ingenico Connect PHP SDK

## Introduction

The Ingenico Connect PHP SDK helps you to communicate with the [Ingenico Connect](http://www.ingenico.com/epayments) Server API. Its primary features are:

* convenient PHP wrapper around the API calls and responses:
  * marshalls PHP request objects to HTTP requests
  * unmarshalls HTTP responses to PHP response objects or PHP exceptions
* handling of all the details concerning authentication
* handling of required meta data

Its use is demonstrated by an example for most calls. The examples execute a call using the provided API keys.

See the [Ingenico Connect Developer Hub](https://developer.globalcollect.com/documentation/sdk/server/php/) for more information on how to use the SDK.

## Structure of this repository

This repository consists out of the following components:

1. The source code of the SDK itself: `/src` and `/lib`
2. The source code of the unit and integration tests (including the examples): `/tests`

## Requirements

PHP 5.4 or above is required. No additional packages are needed.

## Installation via Composer

1. Add a requirement to the SDK to your `composer.json` file:
    
    ```
    composer require ingenico-epayments/connect-sdk-php
    ```
2. Add `vendor/autoload.php` to your project, if this is not already done.

## Manual installation

1. Download the latest version of the PHP SDK from GitHub. Choose the `connect-sdk-php-x.y.z.tar.gz` file from the [releases](https://github.com/Ingenico-ePayments/connect-sdk-php/releases) page, where `x.y.z` is the version number.
2. Add the contents of the `tar.gz` file to your project. The content of the `/src` and `/lib` folders may be combined, if this is required by the project.
3. Add all classes from the `/src` and `/lib` folders to your autoloader; all classes inside these folders are compliant with [PSR-4](http://www.php-fig.org/psr/psr-4/).

## Development and testing

1. Install [Composer](https://getcomposer.org/download/)
2. From the root of the sdk-php project, run `composer install`
3. Copy `tests/config.json.dist` to `tests/config.json` and replace the template values by actual values
4. From the root of the sdk-php project, `vendor/phpunit/phpunit/phpunit` (or just `phpunit` when it is already installed on your local machine)
