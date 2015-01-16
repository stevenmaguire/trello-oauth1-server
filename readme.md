> **This package is now part of the [League's OAuth1 Client](https://github.com/thephpleague/oauth1-client).**
> 
> If you are currently dependent upon this package for your project update your composer dependancies to use version >1.1.0 of the League's OAuth1 Client.

# Trello OAuth 1 Server

[![Latest Version](https://img.shields.io/github/release/stevenmaguire/trello-oauth1-server.svg?style=flat-square)](https://github.com/stevenmaguire/trello-oauth1-server/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/stevenmaguire/trello-oauth1-server/master.svg?style=flat-square&1)](https://travis-ci.org/stevenmaguire/trello-oauth1-server)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/stevenmaguire/trello-oauth1-server.svg?style=flat-square)](https://scrutinizer-ci.com/g/stevenmaguire/trello-oauth1-server/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/stevenmaguire/trello-oauth1-server.svg?style=flat-square)](https://scrutinizer-ci.com/g/stevenmaguire/trello-oauth1-server)
[![Total Downloads](https://img.shields.io/packagist/dt/stevenmaguire/trello-oauth1-server.svg?style=flat-square)](https://packagist.org/packages/stevenmaguire/trello-oauth1-server)

A PHP client for authenticating with Trello using OAuth 1. This package is made for the [League's OAuth1 Client](https://github.com/thephpleague/oauth1-client).

## Install

Via Composer

``` bash
$ composer require stevenmaguire/trello-oauth1-server
```

## Usage

### To Instantiate a Server

```php
$server =  new \Stevenmaguire\OAuth2\Client\Server\Trello(array(
    'identifier' => 'your-identifier',
    'secret' => 'your-secret',
    'callback_uri' => 'http://your-callback-uri/',
    'name' => 'your-application-name', // optional, defaults to null
    'expiration' => 'your-application-expiration', // optional ('never', '1day', '2days'), defaults to '1day'
    'scope' => 'your-application-scope' // optional ('read', 'read,write'), defaults to 'read'
));
```

### Documentation

For more consumption details, please refer to the readme on [League's OAuth1 Client](https://github.com/thephpleague/oauth1-client).

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Steven Maguire](https://github.com/stevenmaguire)
- [All Contributors](https://github.com/stevenmaguire/trello-php/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

