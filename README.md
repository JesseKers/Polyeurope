# Polyeurope Application

Polyeurope Application is a PHP application utilizing MySQL for the database and Tailwind CSS for styling.

## Prerequisites

Before you begin, make sure you have the following requirements fulfilled:

- PHP (version 7.4 or later)
- Composer
- MySQL
- npm

## Installation

Follow these steps to set up and run the application:

### 1. Verify PHP Installation

Check if PHP is installed by running:
```
php -v
```

### 2. Install Package/JSON Dependencies

Check npm version:
```
npm -v
```
Install dependencies:
```
npm install
```

### 3. Configure Database

Configure your database settings inside the `config.php` file.

### 4. Import Database Schema

Execute the queries located in the `import.sql` file to set up your database schema.

### 5. Run Local Server

Launch a local server with PHP:
```
php -S localhost:8080
```

### 6. Start Tailwind CSS

Initiate Tailwind CSS using:
```
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/output.css --watch
```

### 7. Access the Application

Finally, navigate to [http://localhost:8080/](http://localhost:8080/) in your web browser to access the application.
