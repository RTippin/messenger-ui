# Messenger UI

## For use with [rtippin/messenger][link-messenger]

### Features
- Ready-made UI and web routes for use with the core messenger package.
- Laravel echo setup and ready to connect to your laravel-echo-server!

# Installation

### Via Composer

``` bash
$ composer require rtippin/messenger-ui
```

### Publish Assets and Config
- This will publish our JS assets, images, views, and config.
```bash
$ php artisan messenger:ui:publish
```

# Config

***Default:***

```php
'site_name' => env('MESSENGER_SITE_NAME', 'Messenger'),

'socket_endpoint' => env('MESSENGER_SOCKET_ENDPOINT', config('app.url')),

'routing' => [
    'domain' => null,
    'prefix' => 'messenger',
    'middleware' => ['web', 'auth', 'messenger.provider'],
    'invite_middleware' => ['web', 'auth.optional', 'messenger.provider'],
],
```
- Site name is used in our views to inject the name in the navbar.
- Socket endpoint is used for the socket.io endpoint.
- For the web routes, you may choose your desired endpoint domain, prefix and middleware.
  - Invite join web route you can define separate middleware from the rest of the web routes, as you may want a guest allowed to view that page.
- The default `messenger.provider` middleware is included with `Messenger Core` and simply sets the active messenger provider by grabbing the authed user from `$request->user()`.


[link-messenger]: https://github.com/RTippin/messenger