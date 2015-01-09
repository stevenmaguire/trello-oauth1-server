[![Build Status](https://travis-ci.org/stevenmaguire/trello-oauth1-server.svg?branch=master)](https://travis-ci.org/stevenmaguire/trello-oauth1-server)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/stevenmaguire/trello-oauth1-server/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/stevenmaguire/trello-oauth1-server/?branch=master)

# Trello OAuth1 Server

This package is made for the [League's OAuth1 Client](https://github.com/thephpleague/oauth1-client).

## Install
From command line:
`composer require stevenmaguire/trello-oauth1-provider`

## To Instantiate a Server

```php
$server =  new \Stevenmaguire\OAuth2\Client\Server\Trello(array(
    'identifier' => 'your-identifier',
    'secret' => 'your-secret',
    'callback_uri' => "http://your-callback-uri/",
));
```

## Notes
For more consumption details, please refer to the readme on [League's OAuth1 Client](https://github.com/thephpleague/oauth1-client).
