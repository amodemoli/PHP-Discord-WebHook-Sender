<?php

include("variables/loggerval.php"); // Include the file that contains the variables for the logger, allowing us to access the necessary information for sending the log message to the Discord webhook.

        $embed = [
            "title"       => $loggertitle, // The title of the log message, which will be displayed prominently in the Discord embed.
            "description" => $loggerdescription, // The main content of the log message, which will be displayed as the description in the Discord embed.
            "color"       => 7506394, // The color of the embed, represented as a decimal value (in this case, a shade of blue).
            "timestamp"   => date('c'), // The timestamp of the log message, formatted in ISO 8601 format, which will be displayed in the Discord embed.
            ];
            
                
        $payloadData = [
            "content" => $content, // The content of the log message, which can include text and mentions, and will be sent to the Discord webhook.
            "embeds"  => [$embed] // An array of embeds to include in the log message, allowing for rich formatting and additional information to be displayed in the Discord webhook message.
        ];
        
        $payload = json_encode($payloadData); // Encode the payload data as a JSON string, which is the format required by the Discord API for sending messages to webhooks.
        
        $curl = curl_init($loggerwebhookurl);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        

?>