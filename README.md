# Laravel Starter Kit

<p align="center">
  <h1 align="center">🚀 Laravel Starter Kit – Admin Panel & API Boilerplate</h1>
</p>

## Introduction

A **production-ready Laravel Starter Kit** with:

* Fully functional **Admin Panel**
* **Sanctum API Authentication** for mobile apps
* User login, registration, OTP verification, profile management, password reset
* Optimized CRUD structure with helper functions
* Modern UI with **Dark Theme** styling

---

## Features

### Authentication & User Management

* User Login, Registration, Logout
* OTP Verification & Resend OTP
* Forgot & Reset Password
* Role-based Access Control (Admin/User)

### Admin Panel

* Dashboard & System Info
* User Management (CRUD)
* Profile Settings & Image Upload

### API for Mobile App (Laravel Sanctum)

```php
// Public Routes
Route::controller(AuthController::class)->group(function () {
    Route::post('/register',  'register');
    Route::post('/login',     'login');
    Route::post('/resend-otp',  'resendOtp');
    Route::post('/verify-otp',  'verifyRegisterOtp');
    Route::post('/forgot-password',  'forgotPassword');
    Route::post('/reset-password',  'resetPassword');
});

// Protected Routes (Require Sanctum Token)
Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function () {
    Route::get('/users',  'index');
    Route::get('/users/{user}',  'show');
    Route::delete('/users',  'destroy');
    Route::post('/change-password',  'changePassword');
    Route::post('/update-profile',  'updateProfile');

    Route::get('/me',  'me');
    Route::post('/logout',  'logout');
    Route::post('/logout-all',  'logoutAll');
});
```

### Backend Integrations

* **Yajra DataTables**

  ```bash
  composer require yajra/laravel-datatables-oracle
  ```
* **JWT Authentication**

  ```bash
  composer require tymon/jwt-auth
  ```
* **Sanctum Authentication** (pre-installed)

---

## Installation Guide

### 1. Clone Repository

```bash
git clone https://github.com/learnwithfair/laravel-stater-kit.git
cd laravel-stater-kit
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Configure Environment

Copy `.env.example` to `.env` and update database credentials:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations & Seed Data

```bash
php artisan migrate:fresh --seed
```

### 6. Optimize & Autoload

```bash
composer dump-autoload
php artisan optimize:clear
```

### 7. Start Development Server

```bash
php artisan serve
```

Visit **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## Default Credentials

### Admin Panel

* **URL**: `http://127.0.0.1:8000/admin/dashboard`
* **Email**: `admin@gmail.com`
* **Password**: `12345678`

### User Panel

* **URL**: `http://127.0.0.1:8000`
* **Email**: `user@gmail.com`
* **Password**: `12345678`

---

## API Usage (Sanctum)

Use **Bearer Token** authentication for protected routes.

* **Register:** `POST /api/register`
* **Login:** `POST /api/login`
* **Verify OTP:** `POST /api/verify-otp`
* **Forgot Password:** `POST /api/forgot-password`
* **Reset Password:** `POST /api/reset-password`
* **Logout:** `POST /api/logout`

---

## Contribution

Maintained by **[MD RAHATUL RABBI](https://github.com/learnwithfair)**.
Fork, improve, and contribute.

---

## License

Licensed under the [MIT License](LICENSE).
