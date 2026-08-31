<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Support Ticket API (Laravel Pipeline Architecture)

This project is a robust, API-driven Helpdesk Support Ticket application built using Laravel. It is designed to manage interactions between **Clients** (who report issues) and internal **Staff** (who resolve them).

> **Primary Learning Objective:**
> This repository is specifically created as a practice ground and proof-of-concept for implementing the **Laravel Pipeline Pattern**.
> Instead of relying on traditional Fat Controllers or monolithic Service classes, complex business logic (such as Client Onboarding and Ticket Creation) is broken down into modular, single-responsibility `Processors` orchestrated by a Service acting as the pipeline manager.

## Key Features

- **Role-Based Authentication:** Distinct registration and login pathways for `Clients` (with Organizations) and internal `Staff`.
- **Ticket Management:** Clients can submit issue tickets, while Staff can manage, update statuses, and resolve them.
- **Strict Domain Routing:** Utilizing Object-Oriented `Route Mappers` instead of centralizing all routes in `api.php`.
- **Clean Architecture:**
    - `final readonly` and Invokable (`__invoke`) Controllers.
    - Form Requests for strict inbound validation.
    - API Resources for secure and structured JSON outbound responses.
    - Safe transactional operations using `DB::transaction` across Pipeline execution.

## Architecture Overview

To maintain a clean and scalable codebase, this project utilizes a custom orchestration flow:

1. **Route Mapper:** Isolates domain-specific routes (e.g., `ApiAuthRoutes`).
2. **Invokable Controller:** Validates the incoming HTTP request using `FormRequest` and delegates execution.
3. **Service (Orchestrator):** Prepares the `Context` (DTO) and queues the necessary `Processors` inside a Laravel Pipeline.
4. **Processors (Actions):** Small, reusable classes that execute a single unit of work (e.g., `CreateOrganizationProcessor`, `CreateUserProcessor`) and interact with Eloquent Models.
5. **API Resource:** Formats the final output for the client.

## Getting Started

1. Clone the repository.
2. Copy `.env.example` to `.env` and configure your database credentials.
3. Run `composer install`.
4. Generate the application key: `php artisan key:generate`.
5. Run the database migrations: `php artisan migrate`.
6. Start the local development server: `php artisan serve`.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
