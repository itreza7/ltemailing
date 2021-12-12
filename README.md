# Larateam Mailing Assistant
## How to install
- Run this command for publish config, resources
```bash
php artisan vendor:publish --provider="Larateam\Mailing\Providers\AppServiceProvider"
```
## Example
```php
$actionsArray =  [
    [
       'text' => $actionTitle,
       'url' => $actionUrl,
       'color' => $actionColor,
    ],
];
 
Mail::send(new StyleMail($subject,[
    'greeting' => $greetingMessage,
    'introLines' => $introLinesArray,
    'actions' => $actionsArray,
    'outroLines' => $outroLinesArray,
]));
```
