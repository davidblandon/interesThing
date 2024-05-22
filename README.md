# INTERESTHING

InteresThing streamlines the process of buying, selling, and auctioning pre-owned items online. Our platform offers a professional, user-friendly interface, making it easy to discover and purchase quality second-hand goods.

# Set Up and Run the interesThing Project with XAMPP

This guide details the steps to configure and run the Laravel `interesThing` project using XAMPP.

## Prerequisites

Before you begin, make sure you have the following installed:

- XAMPP (with PHP ^8.1.5) [https://www.apachefriends.org/index.html]
- Composer [https://getcomposer.org/download/]
- Git [https://git-scm.com/downloads]

## Step 1: Clone the Project

Clone the GitHub repository to your local directory:

```bash
git clone https://github.com/davidblandon/interesThing.git
cd interesThing
```

## Step 2: Environment Configuration

### Configure the Environment Variables:

Copy the .env.example file to .env

```bash
cp .env.example .env
```

### Create a Database:

- Open XAMPP and ensure the Apache and MySQL modules are running.
- Access phpMyAdmin from your browser at http://localhost/phpmyadmin.
- Create a new database named interesthing.

### Generate the Application Key
Generate the application key to secure sessions and encrypted data:
```
php artisan key:generate
```

## Step 3: Install Dependencies
Install the project dependencies using Composer:
```
composer install
```

## Step 4: Migrations
Run the migrations to create the database tables:
```
php artisan migrate
```

## Step 5: Start the Development Server
Start the Laravel development server:

```
php artisan serve
```

## Step 6: Access and Development
Visit http://localhost:8000 in your browser to see the application running.


Thanks pal! 