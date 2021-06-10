<?php
include "Bot.php";
$bot = new Bot;
$questions = [
    


    "what is your name" => "My name is " . $bot->getName(),
"what is popup camps" => "Pop-up camps is a camping site created by devcorps",
    "what is your gender" => "I am a " . $bot->getGender()
];

if (isset($_GET['msg'])) {
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('Hello there!');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Can't respond to that");
        } else {
            $botty->reply($botty->ask($msg, $questions));
        }
    });
}
