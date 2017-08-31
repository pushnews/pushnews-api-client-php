# 
Pushnews API documentation

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 2.0.0
- Package version: 2.0.0
- Build package: class io.swagger.codegen.languages.PhpClientCodegen
For more information, please visit [https://www.pushnews.eu/](https://www.pushnews.eu/)

## Requirements

PHP 5.4.0 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/pushnews/api-client-php.git"
    }
  ],
  "require": {
    "pushnews/api-client-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to//autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Auth-Token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Auth-Token', 'Bearer');

$api_instance = new Swagger\Client\Api\PushApi();
$siteId = "siteId_example"; // string | Site ID
$body = new \\Notification(); // \\Notification | Notification object

try {
    $result = $api_instance->pushSend($siteId, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PushApi->pushSend: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.pushnews.eu/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*PushApi* | [**pushSend**](docs/Api/PushApi.md#pushsend) | **POST** /push/{siteId} | Send a Push Notification


## Documentation For Models

 - [ApiResponse](docs/Model/ApiResponse.md)
 - [Message](docs/Model/Message.md)
 - [Notification](docs/Model/Notification.md)


## Documentation For Authorization


## ApiKeyAuth

- **Type**: API key
- **API key parameter name**: X-Auth-Token
- **Location**: HTTP header


## Author

support@pushnews.eu


