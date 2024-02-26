# User Management System API

This is a User Management System API built with Laravel.

## Table of Contents
- [User Management System API](#user-management-system-api)
  - [Table of Contents](#table-of-contents)
  - [Setup Instructions](#setup-instructions)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)

## Setup Instructions

### Prerequisites
- PHP (>= 8.2.6)
- Composer
- MySQL

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/ebucodes/apexTest.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd apexTest
    ```

3. **Install dependencies:**

    ```bash
    composer install
    ```

4. **Copy the `.env.example` file to `.env` and configure your environment variables, including database settings and Passport keys:**

    ```bash
    cp .env.example .env
    ```

5. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

6. **Configure the database connection in the `.env` file:**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=your-database-host
    DB_PORT=your-database-port
    DB_DATABASE=your-database-name
    DB_USERNAME=your-database-username
    DB_PASSWORD=your-database-password
    ```

7. **Run database migrations:**

    ```bash
    php artisan migrate
    ```
