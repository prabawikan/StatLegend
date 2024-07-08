<?php
require "../stat-legend/vendor/autoload.php";

use LucianoTonet\GroqPHP\Groq;

$groq = new Groq('key');

$chatCompletion = $groq->chat()->completions()->create([
  'model'    => 'mixtral-8x7b-32768',
  'messages' => [
    [
      'role'    => 'user',
      'content' => 'Presiden Indonesia Saat ini'
    ],
  ]
]);

echo $chatCompletion['choices'][0]['message']['content'];

?>