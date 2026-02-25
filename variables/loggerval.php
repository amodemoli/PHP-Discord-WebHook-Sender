<?php
// We can watch the logger output variables in this section.
$loggerwebhookurl = LOGGER_WEBHOOK_URL; // The webhook URL where the log will be sent.
$content = "-# <:Online:1425752657896931369>  New Webhook Sended In [Demolition.iR](https://demolition.ir) | IP: ($userip)"; // The content of the log message, including the user's IP address.
$loggertitle = "🧩 New Webhook Sended"; // The title of the log message.
// The description of the log message, providing more details about the event:
$loggerdescription = "A new webhook has been sent using the Demolition.iR website. Here are the details:
- 👤 **User IP**: $userip
- 🔗 **Webhook URL**: [Click]($webhookurl)
- 📑 **Title**: $loggertitletext
- 📍 **Title URL**: $loggertitlelink
- 🔔**Mention**: $loggermention
- 🟡 **Warnings**: $warnings
- 📅 **Timestamp**: " . date('Y-m-d H:i:s') . "
- 🪐 **Color:**
          Decimal: $color
          Hex: $colorhex
- 📝 **Footer Text**: $loggerfootertext
- 🧊 **Footer ICON**: $loggerfootericon
- 🖼️ **Image URL**: $loggerimageurl
- 📦 **Thumbnail**: $loggerthumbnailurl
- 📩 **Description**: 
```
$description
```
";
?>