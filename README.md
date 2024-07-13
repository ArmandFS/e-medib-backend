<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



---

# E-Medib Backend

E-Medib is an Android application designed to monitor, document, and assess the condition of Diabetes Mellitus type 1 and 2 patients. The backend backbone for this application is built using Laravel, a powerful MVC PHP framework. This backend handles user authentication, data management, and integration with the Diabetes Self-Management Questionnaire (DSMQ).

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Features

- User Authentication (Registration, Login, Logout)
- BMI and BMR Calculation
- Patient Data Management
- Integration with DSMQ
- RESTful API

## Installation

To get started with the E-Medib backend, follow these steps:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/ArmandFS/e-medib-backend.git
    cd e-medib-backend
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Set up the environment file:**

    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

5. **Configure your database in `.env` file:**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

7. **Start the development server:**

    ```bash
    php artisan serve
    ```



## API Endpoints

Here are some of the key API endpoints available in this project:

### Authentication

- **Register:** `POST /api/register`
- **Login:** `POST /api/login`
- **Logout:** `POST /api/logout`

### User Profile

- **Get User Data:** `GET /api/accountData`
- **Update Profile:** `PUT /api/updateProfile`

### BMI & BMR Calculation

- **BMI Calculation:** Automatically calculated during registration and profile update.
- **BMR Calculation:** Automatically calculated during registration and profile update.

### DSMQ Integration

- **DSMQ Assessment:** Endpoints to handle DSMQ data integration and management.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---
