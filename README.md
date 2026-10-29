# 🧾 Invoice Management System

A professional web-based Invoice Management System developed using Laravel and MySQL.  
The system is designed to manage customers, invoices, reports, dashboard information, and product-related operations in an organized and user-friendly interface.

---

## 🚀 Project Overview

The Invoice Management System provides a centralized platform for managing business billing and invoice-related activities.

The project follows a modular development approach where each team member is responsible for a specific module.

---

## ✨ Main Modules

### 👤 Customer Management
- Add new customers
- Edit customer information
- Delete customers
- Customer validation
- Manage customer billing details

**Developed by:** Harsh Modi

### 🧾 Invoice Management
- Create invoices
- Auto-generated invoice numbers
- Select customers dynamically
- Invoice date management
- Total amount management
- Payment status management
- Edit invoices
- Delete invoices
- Search invoices
- Form validation

**Developed by:** Panchal Jaimin

### 📊 Reports Management
- Report module
- Invoice-related reporting
- Business data presentation

**Developed by:** Krunal Darji

### 🏠 Dashboard & Home Page
- Main dashboard
- Home page interface
- Navigation structure
- Dashboard overview

**Developed by:** Patel Jainil

### 📦 Product Management
- Add, edit, search, and delete products
- Track SKU, category, price, and stock quantity

**Developed by:** Patel Happy

### 🔐 Account Access
- Sign in and sign out
- Invoice, customer, product, dashboard, and report pages require authentication
- The sign-in page offers a one-time first-account setup; after an account exists, registration is disabled
- Settings allow the signed-in user to update their name, email, and password

---

## 🛠️ Technology Stack

| Technology | Version / Usage |
|---|---|
| Laravel | 12 |
| PHP | 8.2+ |
| MySQL | Database |
| Bootstrap | 5 |
| HTML5 | Frontend |
| CSS3 | Styling |
| JavaScript | Client-side functionality |
| Git | Version Control |
| GitHub | Collaboration & Repository |

---

## 👥 Development Team

| Team Member | Responsibility |
|---|---|
| **Harsh Modi** | Customer Model / Customer Management |
| **Krunal Darji** | Report Model / Reports Management |
| **Panchal Jaimin** | Invoice Model / Invoice Management |
| **Patel Jainil** | Dashboard & Home Page |
| **Patel Happy** | Product Model / Product Management |

---

## 📁 Project Structure

```text
invoice-management-system/
│
├── app/
│   ├── Http/
│   ├── Models/
│   └── ...
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│
├── routes/
│   └── web.php
│
├── public/
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## Run Locally

Requirements: PHP 8.2+, Composer, Node.js, pnpm 11+, and MySQL.

1. Install PHP dependencies with composer install.
2. Copy .env.example to .env, create the invoice_management_system database, then set the database username and password in .env.
3. Generate the application key with php artisan key:generate.
4. Install the frontend dependencies with pnpm install, then build assets with pnpm run build.
5. Create the database tables with php artisan migrate.
6. Start Laravel with php artisan serve and open the local URL printed in the terminal. If no real user exists yet, select Create the first account on the sign-in page.

The first-account form accepts the user's name, email, and password. It replaces the old test@example.com sample user if that row exists, and later public registrations are blocked.

## Production Publishing

- Point the web server document root to the project's public/ directory.
- Use a production .env with APP_ENV=production, APP_DEBUG=false, the public APP_URL, and production database credentials. Keep .env private and enable HTTPS.
- Build assets with pnpm install --frozen-lockfile and pnpm run build.
- Back up the database, then run php artisan migrate --force.
- Set correct write permissions for storage/ and bootstrap/cache/.
- Complete the first-account setup before exposing the application publicly. Later public registrations are blocked.
- Verify sign-in, each CRUD module, PDF output, and the Excel-compatible CSV export, and schedule regular database and file backups.
