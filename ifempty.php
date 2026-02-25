<?php
   if(empty($webhookurl)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Webhook URL is required.</p>";
        $error = true;
    }
    if(empty($title)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Embed title is empty.</p>";
        $loggertitletext = "No Title";
    } 
    
    if(empty($footericon)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Footer icon is empty.</p>";
        $loggerfootericon = "No URL";
    } else if(!preg_match($link_pattern, $footericon)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Footer icon URL is not a valid URL.</p>";
        $error = true;
    } else {
        $loggerfootericon = "[Click]($loggerfootericon)";
    }

    if(empty($imageurl)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Image URL is empty.</p>";
        $loggerimageurl = "No URL";
    } else if(!preg_match($link_pattern, $imageurl)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Image URL is not a valid URL.</p>";
        $error = true;
    } else {
        $loggerimageurl = "[Click]($loggerimageurl)";
    }

    if(empty($thumbnailurl)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Thumbnail URL is empty.</p>";
        $loggerthumbnailurl = "No URL";
    } else if(!preg_match($link_pattern, $thumbnailurl)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Thumbnail URL is not a valid URL.</p>";
        $error = true;
    } else {
        $loggerthumbnailurl = "[Click]($loggerthumbnailurl)";
    }
    
    if(empty($titleurl)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Embed title URL is empty.</p>";
        $loggertitlelink = "No URL";
    } else if(!preg_match($link_pattern, $titleurl)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Embed title URL is not a valid URL.</p>";
        $error = true;
    } else {
        $loggertitlelink = "$loggertitlelink";
    }

    if(empty($description)) {
        $error = true;
        echo "<p style='color: red;'><strong>[ERROR]</strong> Embed description is empty.</p>";
    }
    if(empty($titleurl)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Embed title URL is empty.</p>";
        $loggertitlelink = "No URL";
    } else if(!preg_match($link_pattern, $titleurl)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Embed title URL is not a valid URL.</p>";
        $error = true;
    } else {
        $loggertitlelink = "[Click]($loggertitlelink)";
    }
    if(empty($mention)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Mention is empty.</p>";
        $loggermention = "No Mention";
    } else if(!preg_match($mention_pattern, $mention)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Mention is not a valid mention.</p>";
        $error = true;
    } 

    if(empty($footertext)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Footer text is empty.</p>";
        $loggerfootertext = "No Text";
    } else {
        $loggerfootertext = $footertext;
    }

    if(empty($colorhex)) {
        $warnings++;
        echo "<p style='color: orange;'><strong>[WARNING]</strong> Color HEX is empty. Defaulting to #7289DA.</p>";
    } else if(!preg_match($hexcolor_pattern, $colorhex)) {
        echo "<p style='color: red;'><strong>[ERROR]</strong> Color HEX is not a valid HEX code.</p>";
        $error = true;
    } else {
        $color = hexdec(ltrim($colorhex, '#'));
    }
?>