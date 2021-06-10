<?php
include "Bot.php";
$bot = new Bot;
$questions = [
    "what is Pop-up camp" => "Pop-up camp is a camping site created by the team devcorps",
"Are there new events?" => "You can check out our events in the event page",


    "what is your name" => "My name is " . $bot->getName(),
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
