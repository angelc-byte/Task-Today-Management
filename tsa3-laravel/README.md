# Tasks for Today — Laravel TSA3

This IT0049 project rebuilds the original Tasks for Today Management System in Laravel. It uses migrations, a repeatable seeder, Eloquent models, controllers, a shared Blade layout, and four responsive pages.

## Requirements

- PHP 8.2 or newer
- Composer
- PDO SQLite extension (local default) or a configured MySQL/PostgreSQL database

## Local setup

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`. If PHP is not on PATH on Windows, use `C:\xampp\php\php.exe` in place of `php`.

## Required pages

- `/` — queries and displays only tasks whose `task_date` is today.
- `/tasks` — displays all tasks ordered by date.
- `/profile` — displays the single seeded user record.
- `/about` — identifies the student developer and explains the project.

## Database implementation

The `tasks` migration defines `title`, `status` (default `pending`), `task_date`, and timestamps. The `users` migration defines a unique `username`, `full_name`, `email`, and timestamps. `DatabaseSeeder` creates exactly one user and nine tasks across four relative dates, including today. It uses `updateOrCreate`, so rerunning the seeder does not duplicate records.

## Verification

```powershell
php artisan test
php artisan route:list
php artisan migrate:status
```

Feature tests cover all required routes, today-only filtering, complete date-ordered retrieval, repeatable seeding, escaped database output, and empty states. Tests use an isolated in-memory SQLite database.

## Submission

Submit the GitHub repository link with the required page screenshots. A hosted application link is not required for this activity, as clarified by the professor. Include migrations and seeders in the repository, but do not commit `.env`, `vendor`, private credentials, or personal data.
