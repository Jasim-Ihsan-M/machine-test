# Invoice Generator 

A  Laravel-based web application for generating and managing invoices.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)

## Features

- Create and manage invoices with ease.
- Calculate total amount, tax, and net amount dynamically.
- Support for file uploads (JPG, PNG, PDF) with size restrictions.
- Client-side and server-side validations for data integrity.
- Responsive and user-friendly interface.

## Requirements

- PHP 7.4 or higher
- Composer
- Laravel 8.x
- MySQL or any other compatible database
- Node.js and NPM (for asset compilation)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/invoice-generator.git
    ```

2. Install Composer dependencies:

    ```bash
    composer install
    ```

3. Install NPM dependencies and compile assets:

    ```bash
    npm install && npm run dev
    ```

4. Copy the `.env.example` file to `.env` and configure your environment variables:

    ```bash
    cp .env.example .env
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run database migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

7. Start the development server:

    ```bash
    php artisan serve
    ```

8. Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

## Configuration

- Update the `APP_NAME` and other necessary configurations in the `.env` file.

## Usage

1. Register or log in to the application.
2. Navigate to the "Invoices" section.
3. Fill in the required details for the invoice.
4. Submit the form, and the invoice will be generated.





