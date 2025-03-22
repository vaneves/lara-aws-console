# Lara-AWS-Console

Lara-AWS-Console is a simple web-based interface for managing LocalStack resources, built with Laravel. This project is intended for **learning and fun purposes only**. It is **not** designed for professional use or to improve development efficiency.

If you are looking for a more robust tool, please check out [LocalStack Desktop](https://localstack.cloud/desktop/).

## Features
- Web interface to visualize and manage LocalStack services
- Built with Laravel for easy setup and extensibility
- Lightweight and simple to use

## Disclaimer
This project is purely for **educational and experimental** purposes. It is **not** meant to be used in a production environment or as a replacement for professional tools.

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/vaneves/lara-aws-console.git
   cd lara-aws-console
   ```
2. Install dependencies:
   ```sh
   composer install
   npm install
   ```
3. Set up environment variables:
   ```sh
   cp .env.example .env
   ```
4. Generate application key:
   ```sh
   php artisan key:generate
   ```
5. Run migrations (if applicable):
   ```sh
   php artisan migrate
   ```
6. Start the development server:
   ```sh
   php artisan serve
   ```

## Usage
1. Ensure you have [LocalStack](https://localstack.cloud/) running.
2. Open the application in your browser.
3. Use the UI to interact with your LocalStack services.

## Contributing
Feel free to fork this repository and experiment with improvements. However, keep in mind that this project is **not intended for production use**.

