# Login System

## Overview
A simple login system implemented with HTML, CSS, JavaScript (AJAX), and PHP.

## Requirements
- PHP 7.x or higher
- A web server (Apache, Nginx)
- MySQL for the database

## Setup Instructions


1. **Create the database**:
    - Create a new MySQL database named `login_system` (or change the name in `db.php`).
    - Run the SQL script in `db/users.sql` to create the `users` table and insert a sample user.

2. **Update Database Credentials** (if needed):
    - Update database connection settings in the `api/db.php` file.

3. **Start the server**:
    - Place the folder in your server's document root and navigate to `index.html`.

4. **Test the login**:
    - Use `test@example.com` and `password123` to login.

## API Endpoints (It's for just showcase but if require anyone could implement it )
- **POST /login**: Authenticates a user.
- **POST /logout**: Logs out a user.
- **POST /rememberMe**: Sets a remember me option (implementation needed).
- **POST /register**: Registers a new user.

## Features
- Simple login form with email and password fields.
- Remember Me functionality.
- AJAX call to authenticate the user using a database.
