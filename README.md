URL Shortener (Laravel) - Setup Instructions

📋 Prerequisites
Make sure you have installed:

PHP >= 8.1
Composer
MySQL (via XAMPP or similar)
Git

📥 1. Clone the Repository
git clone https://github.com/DivanshuBabbar/urlShortner.git
cd urlShortner

📦 2. Install Dependencies
composer install
⚙️ 3. Setup Environment File

Copy .env.example:

cp .env.example .env

🔑 4. Generate Application Key
php artisan key:generate

🗄️ 5. Configure Database

Open .env and update:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=

🧱 6. Run Migrations
php artisan migrate

▶️ 7. Start Development Server
php artisan serve

Visit:

http://127.0.0.1:8000

🔗 API Endpoints
Create Short URL
POST /api/shorten

Redirect
GET /{short_code}

List URLs
GET /api/urls

Stats
GET /api/stats/{short_code}

🧪 Example Request
POST /api/shorten
{
  "original_url": "https://example