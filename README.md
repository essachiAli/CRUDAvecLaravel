# Laravel Installation & Configuration Guide

## 🧩 Prerequisites

- **PHP ≥ 8.2**  
- **Composer** installed  
- **MySQL 8** (or MariaDB compatible)  
- **Git** installed *(optional but recommended)*  

---

## 🚀 Guided Steps

### **Step 1: Create the Laravel Project**

Install Laravel using Composer to create a new project folder named **blog** with the complete framework skeleton:

```bash
cd ~/work
composer create-project laravel/laravel blog
cd blog
php artisan --version
```

> **Note:** The `php artisan` command runs Laravel's built-in tools.

---

### **Step 2: Initialize the Environment**

Configure the `.env` file and generate a unique application key for secure sessions and encryption:

```bash
cp .env.example .env
php artisan key:generate
php artisan config:clear
```

> **Note:** The application key secures Laravel sessions and internal encryption.

---

### **Step 3: Configure the Database**

Create a MySQL database and link it in the `.env` file, then run migrations to set up the necessary tables.

**Create the database:**
```sql
CREATE DATABASE blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

**Update `.env` with database settings:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
```

**Run migrations:**
```bash
php artisan migrate
```

> **Note:** Migrations automatically create the tables required for Laravel.

---

### **Step 4: Configure Language and Time Zone**

Set the language and time zone in `config/app.php` for localized messages and times:

```php
'timezone' => 'Africa/Casablanca',
'locale' => 'fr',
'fallback_locale' => 'en',
```

Reload configuration:

```bash
php artisan config:clear
```

---

### **Step 5: Start the Local Server**

Use Laravel's integrated server to test the application:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser to see the Laravel home page.

---

### **Step 6: Create a Test Route `/ping`**

Add a simple route to verify routes, configuration, and server functionality.

In `routes/web.php`:

```php
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn() => 'pong');
```

Visit [http://localhost:8000/ping](http://localhost:8000/ping)  
**Expected result:** `pong`

> **Note:** This is your first Laravel controller response generated directly in the route.

---

### **Step 7: Add Handy Composer Scripts**

Add aliases in `composer.json` to simplify common Artisan commands:

```json
"scripts": {
  "serve": "php artisan serve",
  "migrate": "php artisan migrate",
  "fresh": "php artisan migrate:fresh"
}
```

**Usage:**
```bash
composer run serve
composer run migrate
```

> **Note:** These scripts improve maintenance and team consistency.

---

### **Step 8: Checking and Common Errors**

| Problem | Probable Cause | Solution |
|----------|----------------|-----------|
| `APP_KEY` missing | `.env` not generated | `php artisan key:generate` |
| `SQLSTATE[HY000] [1049] Unknown database` | Non-existent database | Create the DB, then `php artisan migrate` |
| `Access denied for user` | Incorrect DB credentials | Check `DB_USERNAME` / `DB_PASSWORD` in `.env` |
| Blank page *(server error 500)* | Server error | Set `APP_DEBUG=true` in `.env` and check `storage/logs/laravel.log` |
