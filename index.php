<?php
// Replace BOT_TOKEN with your bot token from BotFather
$token = '7501008142:AAEdZxcN569y9k2Bdlh-3UBE9amZ-jQS8WI';

// Get update from Telegram
$update = json_decode(file_get_contents('php://input'), true);

if (!$update || !isset($update['message'])) {
    exit;
}

$message = $update['message'];
$chat_id = $message['chat']['id'];
$text = isset($message['text']) ? $message['text'] : '';

// Jab user /start bheje
if (strpos($text, '/start') === 0) {

    // Stylish reply message
    $reply = "HELLO SIR ,👋\n🎯YOUR ID :-- `" . $chat_id . "`";

    // Send message with Markdown format (to make ID monospace)
    $url = "https://api.telegram.org/bot{$token}/sendMessage";
    
    $data = [
        'chat_id' => $chat_id,
        'text' => $reply,
        'parse_mode' => 'Markdown' // this makes `code style`
    ];

    // Send via POST
    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    file_get_contents($url, false, $context);
}
?>
