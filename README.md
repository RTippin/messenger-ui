# Messenger UI

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![StyleCI][ico-styleci]][link-styleci]
[![License][ico-license]][link-license]

---

## For use with [rtippin/messenger][link-messenger]

### Ready-made UI and web routes for use with [rtippin/messenger][link-messenger].

### Notes
- This package provides web routes that pertain to the `messenger` core. No authentication routes/system will be setup for you.
- Our compiled `NotifyManager.js` uses laravel echo, with the `socket.io` library (no option for pusher at this time). 
- You will need to setup your own websocket implementation for `socket.io`, as well as configure your laravel app's broadcast driver to use your websocket credentials.
  - For a quick setup using [tlaverdure/laravel-echo-server][link-echo-server] websockets, follow the instructions at the bottom.

---

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
- To update only our compiled assets (when using composer to update our package), run:
```bash
$ php artisan vendor:publish --tag=messenger-ui.assets --force
```

---

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
- Socket endpoint is used for your socket.io endpoint.
- For the web routes, you may choose your desired endpoint domain, prefix and middleware.
  - Invite join web route you can define separate middleware from the rest of the web routes, as you may want a guest allowed to view that page.
- The default `messenger.provider` middleware is included with `Messenger Core` and simply sets the active messenger provider by grabbing the authed user from `$request->user()`.

---

# Using Laravel Echo Server
- TODO

[link-messenger]: https://github.com/RTippin/messenger
[link-author]: https://github.com/rtippin
[ico-version]: https://img.shields.io/packagist/v/rtippin/messenger-ui.svg?style=plastic&cacheSeconds=3600
[ico-downloads]: https://img.shields.io/packagist/dt/rtippin/messenger-ui.svg?style=plastic&cacheSeconds=3600
[ico-styleci]: https://styleci.io/repos/379743201/shield?style=plastic&cacheSeconds=3600
[ico-license]: https://img.shields.io/github/license/RTippin/messenger-ui?style=plastic
[link-packagist]: https://packagist.org/packages/rtippin/messenger-ui
[link-downloads]: https://packagist.org/packages/rtippin/messenger-ui
[link-license]: https://packagist.org/packages/rtippin/messenger-ui
[link-styleci]: https://styleci.io/repos/379743201
[link-echo-server]: https://github.com/tlaverdure/laravel-echo-server