# Larateam Mailing Assistant for laravel
## How to install
- Run this command for adding to composer
```bash
composer require itreza7/mailing
```
- Run this command for modify default language files
```bash
php artisan vendor:publish --provider="Larateam\Mailing\Providers\AppServiceProvider"
```
## Facade Methods
If you want this email to be transferred to the queue and sent using the cronjob, run this method
```php
make_queue()
```
This command adds a bold line to the beginning of the email, you can use it to greet and ....
```php
greeting($greeting)
```
Use this command to add a line of text or HTML code to an email.
```php
line($line)
```
Use this command if you want to put a button in your email.
```php
action($text, $url, $color = 'primary', $add_to_footer = true)
```
Add this command to change the template. Template number 1 is set by default.
```php
template($template)
```
Add this command to change the template. Template number 1 is set by default.
```php
template($template)
```
You can use this command to render the email, this return an object of a class with this parent
```php
Illuminate\Mail\Mailable
```
```php
render()
```
Of course, the following two methods for displaying and sending emails have also been added to the mentioned class.
```php
show()
confirm()
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
