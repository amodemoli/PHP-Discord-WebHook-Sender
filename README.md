# 🚀 Discord Webhook Sender PRO  
### Advanced PHP Discord Webhook Tool with Logging System

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![cURL](https://img.shields.io/badge/cURL-00599C?style=for-the-badge&logo=php&logoColor=white)
![Discord](https://img.shields.io/badge/Discord-5865F2?style=for-the-badge&logo=discord&logoColor=white)
![Version](https://img.shields.io/badge/Version-2.0.0-blue?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

<br>

<img src="https://cdn.discordapp.com/attachments/1454921421460475987/1475939826434969674/image.png" width="700px">

</div>

---

# 🧩 Project Overview

**Discord Webhook Sender PRO** is a powerful PHP-based web application that allows users to send fully customized Discord webhook embeds directly from a browser interface.

This project includes:

- Full Embed Customization
- HEX → Decimal Color Conversion
- Image & Thumbnail Support
- Mention Validation
- URL Validation (Regex Based)
- Warning & Error Detection System
- Automatic Logger Webhook
- IP Logging System
- Structured Variable Management
- Clean Separation of Logic

Built entirely with native **PHP + cURL + JSON**.

---

# 🛠 Core System Architecture

This project is structured using multiple files to keep logic clean and maintainable.

```
/webhook-sender
│
├── index.php
├── config.php
├── logger.php
├── ifempty.php
├── variables/
│   ├── val.php
│   └── loggerval.php
├── style/
│   └── main.css
└── README.md
```

---

# ⚙️ How The System Works (0 → 100 Full Flow)

## 1️⃣ Configuration (`config.php`)

Stores your private logger webhook URL securely:

```php
define('LOGGER_WEBHOOK_URL', '');
```

⚠️ Never expose this publicly.  
Add `config.php` to `.gitignore`.

---

## 2️⃣ Variable Initialization (`variables/val.php`)

All required variables are initialized including:

- Webhook URL
- Embed Title
- Description
- Mention
- HEX Color
- Image URLs
- Footer Text
- IP Address
- Regex Validation Patterns
- Warning Counter
- Error Flag

Important Regex Patterns:

```php
$link_pattern
$mention_pattern
$hexcolor_pattern
```

This ensures:

- Only valid URLs are accepted
- Only valid Discord mentions are allowed
- Only valid HEX color codes are used

---

## 3️⃣ Form Submission (`index.php`)

When user clicks **Send Webhook**:

```php
if(isset($_POST['submit']))
```

The system:

1. Collects form data
2. Validates using `ifempty.php`
3. Converts HEX → Decimal
4. Builds Embed Array
5. Sends request using cURL
6. Handles HTTP response
7. Triggers Logger

---

## 4️⃣ Validation Engine (`ifempty.php`)

This is your protection layer.

It checks:

- Empty fields
- Invalid URLs
- Invalid HEX codes
- Invalid Mentions

Generates:

- 🔴 Errors → Stops execution
- 🟡 Warnings → Continues but logs issue

Example:

```php
if(!preg_match($hexcolor_pattern, $colorhex))
```

---

## 5️⃣ Embed Builder

The embed supports:

- Title
- Description
- Clickable Title URL
- Footer + Footer Icon
- Image
- Thumbnail
- Custom Color

Example structure:

```php
$embed = [
  "title" => $title,
  "description" => $description,
  "url" => $titleurl,
  "color" => $color,
  "footer" => [...],
  "image" => [...],
  "thumbnail" => [...]
];
```

---

## 6️⃣ Webhook Delivery (cURL)

Payload is converted to JSON:

```php
$payload = json_encode($payloadData);
```

Then sent via:

```php
curl_setopt($curl, CURLOPT_POST, true);
```

Success is detected via:

```
HTTP 204
```

---

## 7️⃣ Logger System (`logger.php`)

Every successful webhook triggers an automatic log to your private webhook.

Logged Data Includes:

- User IP
- Webhook URL
- Title
- Title URL
- Mention
- Warning Count
- Timestamp
- HEX & Decimal Color
- Footer Info
- Image & Thumbnail URLs
- Full Description Content

Logger uses:

```php
"timestamp" => date('c')
```

For ISO 8601 Discord formatting.

---

# 🖼️ Project Preview

<div align="center">

### 🧪 Main Interface

<img src="https://cdn.discordapp.com/attachments/1454921421460475987/1475939826434969674/image.png" width="650px">

<br><br>

### 🛰 Logger Output Example

<img src="https://cdn.discordapp.com/attachments/1454921421460475987/1475939826434969674/image.png" width="650px">

</div>

---

# 🔐 Security Features

- Regex URL validation
- Regex Mention validation
- HEX color validation
- Warning counter system
- Error blocking mechanism
- API isolation via config file
- IP tracking
- Logger webhook separation

---

# 📌 Supported Embed Features

| Feature | Supported |
|----------|-----------|
| Title | ✅ |
| Description | ✅ |
| Clickable Title URL | ✅ |
| Mention Support | ✅ |
| Custom HEX Color | ✅ |
| Footer Text | ✅ |
| Footer Icon | ✅ |
| Image | ✅ |
| Thumbnail | ✅ |
| Logger System | ✅ |
| Warning Detection | ✅ |

---

# 💻 Requirements

- PHP 7.4+
- cURL enabled
- HTTPS outbound access
- Apache / Nginx

To check cURL:

```php
phpinfo();
```

Search for → cURL Support → enabled

---

# 🚀 Installation Guide

1️⃣ Upload files to your server  
2️⃣ Configure `config.php`  

```php
define('LOGGER_WEBHOOK_URL', 'your_logger_webhook_here');
```

3️⃣ Open `index.php` in browser  
4️⃣ Enter your Discord webhook  
5️⃣ Customize embed  
6️⃣ Click Send  

Done ✅

---

# 🧠 Advanced Customization Ideas

You can extend this system with:

- Rate limiting
- CSRF protection
- API token authentication
- Webhook history database
- Dark/Light UI theme
- AJAX sending without refresh
- Webhook templates
- Multi-embed support
- File upload → auto image hosting

---

# 📊 Logging Intelligence

Logger tracks:

- Suspicious usage
- Excessive warnings
- Missing fields
- Invalid attempts
- User IP behavior

You can later build:

- Ban system
- IP blacklist
- Rate monitoring

---

# 🛡 Security Recommendations

- Never expose logger webhook
- Protect config.php
- Disable directory listing
- Use HTTPS only
- Add .htaccess restrictions
- Consider adding reCAPTCHA
- Limit large input sizes

---

# 🧾 License

MIT License

---

# 👑 Author

Developed by **Amir | Demolition.iR**

If you like this project:

⭐ Star the repository  
🍴 Fork it  
🚀 Improve it  

---

# ⚡ Final Notes

This is not just a simple webhook sender.

This is a:

- Structured
- Validated
- Logged
- Secure
- Extendable
- Production-ready

Discord Webhook System built entirely with raw PHP.

---

🔥 Built for power users.  
🔥 Built for control.  
🔥 Built the Demolition way.
