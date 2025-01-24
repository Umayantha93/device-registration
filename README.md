<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Overview

This Laravel application is built to register devices and view devices, device leasing periods and update leasing periods using laravel api


## Prerequisites

Make sure you have the following installed:

-   PHP 8.3 or higher
-   Composer
-   MySQL or compatible database
-   Laravel 11+

## Installation

### Step 1: Clone the repository

```bash
git clone https://github.com/Umayantha93/device-registration.git
cd your-repo-name
```

### Step 2: Install PHP dependencies

```bash
composer install
```

### Step 3: Configure environment variables

Copy the `.env.example` file to `.env` and update the necessary database credentials and other environment settings.

```bash
cp .env.example .env
```

Set up your database in the `.env` file:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 4: Generate the application key

```bash
php artisan key:generate
```

### Step 5: Run database migrations

```bash
php artisan migrate
```

### Step 6: Run seeder to populate data

```bash
php artisan db:seed
```

### Step 6: Run seeder to populate data

```bash
php artisan serve
```

## Usage

### Upload SQL File

1. Go to the **Bulk Upload** section of the application.
2. Select an SQL file.
3. The application will parse and insert the data into the database.

### Upload XLS File

1. Go to the **Bulk Upload** section of the application.
2. Select an XLS file.
3. The application will process the Excel file and insert the data into the database.

## Technologies Used

-   **Backend**: Laravel 11+
-   **Database**: MySQL
