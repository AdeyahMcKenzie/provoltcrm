# provoltcrm

ProvoltCRM is a Laravel-based CRM tailored for small automotive repair shops. It focuses on quick quoting, clear service histories, and lightweight day-to-day workflow management.

---

## Prerequisites

- PHP 8.2+
- Composer 2+
- Node.js 20+ and npm 10+
- SQLite (default driver) or MySQL 8 if you prefer Sail
- Optional: Docker & Docker Compose (for Laravel Sail stack)

---

## Quick Start (Native Environment)

1. Clone the repository and install PHP dependencies:
   ```bash
   git clone https://github.com/AdeyahMcKenzie/provoltcrm
   cd provoltcrm
   composer install
   ```
2. Copy the example environment file and update values as needed:
   ```bash
   cp .env.example .env
   ```
   - The default `.env` is configured for SQLite. To use the bundled database, ensure `DB_CONNECTION=sqlite` and that `database/database.sqlite` exists. Create it if needed:
     ```bash
     touch database/database.sqlite
     ```
3. Generate the application key:
   ```bash
   php artisan key:generate
   ```
4. Run database migrations and seeders (loads demo users, customers, services, vehicles):
   ```bash
   php artisan migrate --seed
   ```
5. Install frontend dependencies and start the Vite dev server:
   ```bash
   npm install
   npm run dev
   ```
6. Serve the application (choose one):
   - Laravel’s built-in server:
     ```bash
     php artisan serve
     ```
   - Or run the combined dev workflow (PHP server, queue listener, logs, Vite) via Composer:
     ```bash
     composer dev
     ```

Visit the app at `http://127.0.0.1:8000` (or the URL shown in your terminal).

---

## Laravel Sail (Docker) Workflow

If you prefer an isolated Docker setup:

1. Ensure Docker Desktop is running.
2. Copy `.env.example` to `.env` and update the database section for MySQL if desired.
3. Build and start the Sail stack:
   ```bash
   ./vendor/bin/sail up -d
   ```
4. Install dependencies inside the container:
   ```bash
   ./vendor/bin/sail composer install
   ./vendor/bin/sail npm install
   ```
5. Generate the key, migrate, and seed:
   ```bash
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate --seed
   ```
6. Run the frontend build tools:
   ```bash
   ./vendor/bin/sail npm run dev
   ```

The application will be available at `http://localhost` (or the port you set in `.env`). Sail also exposes supporting services: MySQL (`3306`), Redis (`6379`), Meilisearch (`7700`), Mailpit (`8025`), and phpMyAdmin (`8081`).

---

## Seeded Accounts

After running the seeders, you can log in with any of the demo users (password: `password`):

- `johnsmith@provoltcrm.com` (admin)
- `sarahjohnson@provoltcrm.com` (manager)
- `mikewilliams@provoltcrm.com` (technician)

You can add more users via the UI or database.

---

## Common Tasks


  ```
- Re-run database migrations from scratch:
  ```bash
  php artisan migrate:fresh --seed
  ```

Queues and sessions use the database driver by default; ensure migrations have run before interacting with those features.

---

## Troubleshooting

- **White screen / 500 errors**: Check `storage/logs/laravel.log`.
- **Database issues**: Confirm the correct `DB_CONNECTION` and that the SQLite file or MySQL container is available.
- **Vite asset failures**: Ensure `npm run dev` (or `npm run build`) has been executed and that `APP_URL` matches the host URL during development.
