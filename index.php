<?php
include 'config.php';
include 'variables/val.php';


if(isset($_POST['submit'])) {
    $title = $_POST['titletext'];
    $description = $_POST['maintext'];
    $webhookurl = $_POST['webhurl'];
    $titleurl = $_POST['titleurl'];
    $mention = $_POST['mention'];
    $colorhex = $_POST['colorhex'];
    $footertext = $_POST['footertext'];
    $loggermention = $_POST['mention'];
    $loggertitlelink = $_POST['titleurl'];
    $loggertitletext = $_POST['titletext']; 
    $footericon = $_POST['footericon'];
    $loggerfootericon = $_POST['footericon'];
    $imageurl = $_POST['imageurl'];
    $loggerimageurl = $_POST['imageurl'];
    $thumbnailurl = $_POST['thumbnailurl'];
    $loggerthumbnailurl = $_POST['thumbnailurl'];
    include 'ifempty.php';
    
    if($error === false) {
        $newwebhook = 1;
        $embed = [
            "title"       => $title,
            "description" => $description,
            "url"         => $titleurl,
            "color"       => $color,
            "footer"      => [
                "text" => $footertext,
                "icon_url" => $footericon
            ],
            "image"       => [
                "url" => $imageurl
            ],
            "thumbnail"   => [
                "url" => $thumbnailurl
            ],
        ];
        if($warnings == 0 && empty($mention)) {
            $content = "-# <:Online:1425752657896931369> Sended By [Demolition.iR](https://demolition.ir) Website";
        } else if($warnings == 0 && !empty($mention)) {
            $content = "-# <:Online:1425752657896931369> Sended By [Demolition.iR](https://demolition.ir) Website \n-#  » Mention: ($mention)";
        } else if($warnings > 0 && empty($mention)) {
            $content = "-# <:Online:1425752657896931369> Sended By [Demolition.iR](https://demolition.ir) Website (Warnings: $warnings)";
        } else {
            $content = "-# <:Online:1425752657896931369> Sended By [Demolition.iR](https://demolition.ir) Website (Warnings: $warnings)\n-#  » Mention: ($mention)";
        }
    
        $payloadData = [
            "content" => $content,
            "embeds"  => [$embed]
        ];
        
        $payload = json_encode($payloadData);
        
        $curl = curl_init($webhookurl);
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
        
        if($httpCode == 204) {
            echo "<p style='color: green;'><strong>[SUCCESS]</strong> Webhook sent successfully</p>";
        } else {
            echo "<p style='color: red;'><strong>[ERROR]</strong> Failed to send webhook. HTTP Code: $httpCode</p>";
            echo "<pre>$response</pre>";
        }
        
    }
}

if($newwebhook == 1) {

    include 'logger.php';

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Discord Webhook Sender - Demolition.iR</title>
    <link rel="stylesheet" href="./style/main.css">
</head>
<body>
    <div class="container">
        <form method="POST">
            <input type="text" name="webhurl" placeholder="Webhook Link" value="<?php echo htmlspecialchars($webhookurl); ?>" required>
            <input type="text" name="titletext" placeholder="Webhook Title" value="<?php echo htmlspecialchars($title); ?>">
            <input type="text" name="maintext" placeholder="Webhook Description" value="<?php echo htmlspecialchars($description); ?>" required>
            <input type="text" name="titleurl" placeholder="Webhook TitleURl" value="<?php echo htmlspecialchars($titleurl); ?>" >
            <input type="text" name="mention" placeholder="Webhook Mention (e.g. @everyone)" value="<?php echo htmlspecialchars($mention); ?>">
            <input type="text" name="colorhex" placeholder="Webhook Color HEX" value="<?php echo htmlspecialchars($colorhex); ?>">
            <input type="text" name="footertext" placeholder="Webhook Footer Text" value="<?php echo htmlspecialchars($footertext); ?>">
            <input type="text" name="footericon" placeholder="Webhook Footer Icon URL" value="<?php echo htmlspecialchars($footericon); ?>">
            <input type="text" name="imageurl" placeholder="Webhook Image URL" value="<?php echo htmlspecialchars($imageurl); ?>">
            <input type="text" name="thumbnailurl" placeholder="Webhook Thumbnail URL" value="<?php echo htmlspecialchars($thumbnailurl); ?>">
            
        <button type="submit" name="submit">Send Webhook</button>
        </form>
    </div>
</body>
</html>