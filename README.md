# 🏢 SGE — ERP System for SMEs

A complete **Enterprise Resource Planning (ERP)** system built for small and medium-sized enterprises, developed as the final project for the *Sistemes de Gestió Empresarial* module of the CFGS in Cross-platform Application Development (DAM).

---

## Features

- 📦 Inventory management
- 🧾 Billing and invoice generation
- 👥 Customer management
- 👤 User administration
- 🔐 Role-based access control (RBAC)
- 🖨️ PDF export for invoices and inventory reports

---

## Role-Based Access Control

Access to each module is restricted by user role. Each role has a defined set of permissions:

| Module | Admin | Manager | Sales Employee |
|---|---|---|---|
| Inventory | ✅ | ✅ | ✅ (read) |
| Billing | ✅ | ✅ | ✅ |
| Customers | ✅ | ✅ | ✅ |
| User management | ✅ | ❌ | ❌ |
| Reports | ✅ | ✅ | ❌ |

This ensures that employees can only access the data and functionality relevant to their role, protecting sensitive information such as user accounts and colleagues' personal data.

---

## Tech Stack

| Technology | Purpose |
|---|---|
| Laravel (PHP) | Backend framework — MVC architecture |
| Blade | Templating engine for server-side rendered views |
| MariaDB | Relational database |
| Tailwind CSS | UI styling |
| Laravel Sanctum | Authentication |
| DomPDF / Laravel PDF | PDF generation for invoices and reports |

---

## Architecture

The application follows Laravel's **MVC pattern**:

- **Models** — Eloquent ORM models representing database entities
- **Views** — Blade templates for all UI screens
- **Controllers** — Handle HTTP requests, delegate to services, return responses

Route-level and middleware-level authorization enforce role restrictions throughout the application.

---

## Project Structure

```
sge-erp/
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Request handlers per module
│   │   └── Middleware/     # Role-based access middleware
│   └── Models/             # Eloquent models
├── resources/
│   └── views/              # Blade templates
│       ├── inventory/
│       ├── billing/
│       ├── customers/
│       └── users/
├── routes/
│   └── web.php             # Application routes
└── database/
    └── migrations/         # Database schema
```

---

## Getting Started

### Prerequisites
- PHP >= 8.1
- Composer
- MariaDB or MySQL
- Node.js (for asset compilation)

### Installation

```bash
# Clone the repo
git clone https://github.com/BricFer/sge-erp.git
cd sge-erp

# Install PHP dependencies
composer install

# Install Node dependencies
npm install && npm run build

# Configure environment
cp .env.example .env
php artisan key:generate

# Set up the database
php artisan migrate --seed

# Start the development server
php artisan serve
```

---

## Author

**Briceida Fernandez**
[LinkedIn](https://www.linkedin.com/in/briceidafernandez) · [GitHub](https://github.com/BricFer)
