# Larateam Mailing Assistant
## How to install
- Run this command for adding to composer
```bash
composer require itreza7/mailing
```
- Run this command for modify default language files
```bash
php artisan vendor:publish --provider="Larateam\Mailing\Providers\AppServiceProvider"
```
## Example
```php
(new LTMail())->greeting('Reza')
    ->line('Hi')
    ->action('Google', 'https://google.com', 'red')
    ->line('Hi')
    ->render()
    ->to('itreza7@gmail.com')
    ->subject('Hi Reza')
    ->show()
    ->confirm();
```
