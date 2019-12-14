# TeleBot PHP Class
[![API](https://img.shields.io/badge/Telegram%20Bot%20API-December%2014%2C%202019-36ade1.svg)](https://core.telegram.org/bots/api)
![PHP](https://img.shields.io/badge/php-%3E%3D5.3-8892bf.svg)
![CURL](https://img.shields.io/badge/cURL-required-green.svg)
[![License](https://poser.pugx.org/eleirbag89/telegrambotphp/license)](https://packagist.org/packages/eleirbag89/telegrambotphp)

Compliant with the December 14, 2019 Telegram Bot API update.

Requirements
---------

* PHP >= 5.3
* Curl extension for PHP5 must be enabled.
* Telegram API key, you can get one simply with [@BotFather](https://core.telegram.org/bots#botfather) with simple commands right after creating your bot.

For the WebHook:
* Must domain with SSL certificate (https://)    
Since the August 29 update you can use a self-signed ssl certificate.

For the getUpdates(Long Polling):
* Some way to execute the script in order to serve messages (for example cronjob)

Installation
---------
Copy class.teleBot.php into your server and include it in your new bot script:
```php
require('class.teleBot.php');

$telebot = new TeleBot('YOUR TELEGRAM TOKEN HERE');
```


Configuration (WebHook)
---------

Navigate to 
https://api.telegram.org/bot(BOT_TOKEN)/setWebhook?url=https://yoursite.com/your_update.php
Or use the Telegram class setWebhook method.

Examples
---------

```php
$telebot = new TeleBot('YOUR TELEGRAM TOKEN HERE');

$chat_id = $telebot->ChatID();
$content = array('chat_id' => $chat_id, 'text' => 'Test');
$telebot->sendMessage($content);
```

If you want to get some specific parameter from the Telegram response:
```php
$telebot = new TeleBot('YOUR TELEGRAM TOKEN HERE');

$result = $telebot->getData();
$text = $result['message'] ['text'];
$chat_id = $result['message'] ['chat']['id'];
$content = array('chat_id' => $chat_id, 'text' => 'Test');
$telebot->sendMessage($content);
```

To upload a Photo or some other files, you need to load it with CurlFile:
```php
// Load a local file to upload. If is already on Telegram's Servers just pass the resource id
$img = curl_file_create('test.png','image/png'); 
$content = array('chat_id' => $chat_id, 'photo' => $img );
$telebot->sendPhoto($content);
```

To download a file on the Telegram's servers
```php
$file = $telebot->getFile($file_id);
$telebot->downloadFile($file['result']['file_path'], './my_downloaded_file_on_local_server.png');
```

Emoticons
------------
For a list of emoticons to use in your bot messages, please refer to the column Bytes of this table:
http://apps.timwhitlock.info/emoji/tables/unicode

License
------------

This open-source software is distributed under the MIT License. See LICENSE.md

Contributing
------------

All kinds of contributions are welcome - code, tests, documentation, bug reports, new features, etc...

* Send feedbacks.
* Submit bug reports.
* Write/Edit the documents.
* Fix bugs or add new features.
