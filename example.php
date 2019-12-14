<?php
require("class.TeleBot.php");

$token = 'bot_token';
$telebot = new TeleBot($token);

$text = $telebot->Text();
$chat_id = $telebot->ChatID();

if ($text == '/start' || $text == "start") {

    $reply = 'Welcome';
    $content = ['chat_id' => $chat_id, 'text' => $reply];
    $telebot->sendMessage($content);
}


if ($text == '/whoami' || $text == "whoami") {
    $reply = 'Telegram Bot';
    $content = ['chat_id' => $chat_id, 'text' => $reply];
    $telebot->sendMessage($content);
}
