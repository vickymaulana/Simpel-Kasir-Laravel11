# SimpelKasir-Laravel11

SimpelKasir is a simple cashier application built with Laravel 11. This application allows you to manage items, purchases, and generate reports.

## Features

- Manage items (CRUD operations)
- Record purchases
- Generate reports for items and purchases

## Installation

Follow these steps to install and set up the project:

1. Clone the repository:
    ```bash
    git clone https://github.com/vickymaulana/Simpel-Kasir-Laravel11.git
    cd Simpel-Kasir-Laravel11
    ```

2. Install the dependencies:
    ```bash
    composer install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Set up the database:
    - Create a new database for the project.
    - Update the `.env` file with your database credentials.

6. Run the migrations:
    ```bash
    php artisan migrate
    ```

7. Seed the database (optional):
    ```bash
    php artisan db:seed
    ```

8. Serve the application:
    ```bash
    php artisan serve
    ```

9. Open your browser and visit `http://localhost:8000` to see the application.

## Usage

- Access the Kasir section to manage items.
- Access the Pembelian section to record purchases.
- Generate reports from the respective sections.

## Contributing

Feel free to submit issues or pull requests. For major changes, please open an issue first to discuss what you would like to change.

## License

This project is licensed under the MIT License.

## GitHub Repository

[https://github.com/vickymaulana/SimpelKasir-Laravel11](https://github.com/vickymaulana/SimpelKasir-Laravel11)
