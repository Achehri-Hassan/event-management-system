# Event Management System

A simple **Event Management System** built with **Laravel 12**, **PHP**,
**MySQL**, **Blade**, and **Eloquent ORM**.

This project was originally developed with procedural PHP and was then
migrated to Laravel following the MVC architecture.

## Project Overview

The application allows users to manage events and their categories.

Main event information includes:

-   Event title
-   Content / description
-   Image URL
-   Event date
-   Publication date
-   Location
-   Price
-   Status (`publish` / `draft`)
-   Organizer
-   Category
-   Event time
-   Number of available places
-   End date

## Technologies

-   PHP 8.2+
-   Laravel 12
-   MySQL
-   Blade
-   Eloquent ORM
-   HTML5
-   CSS3
-   Composer
-   XAMPP / MySQL
-   VS Code

## Database

The project uses a MySQL database named:

``` text
evenets
```

The main Laravel tables are:

``` text
categories
evenements
organisateurs
```

Laravel also creates its framework tables, such as:

``` text
migrations
sessions
cache
cache_locks
jobs
failed_jobs
job_batches
users
password_reset_tokens
```

### Main relationships

An event belongs to one category:

``` text
Evenement → Category
```

An event belongs to one organizer:

``` text
Evenement → Organisateur
```

A category can contain many events:

``` text
Category → Evenements
```

An organizer can have many events:

``` text
Organisateur → Evenements
```

## Project Structure

The important Laravel structure is:

``` text
event-management/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── EvenementController.php
│   │
│   └── Models/
│       ├── Category.php
│       ├── Evenement.php
│       └── Organisateur.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── css/
│       └── style.css
│
├── resources/
│   └── views/
│       └── evenements/
│           ├── index.blade.php
│           └── create.blade.php
│
├── routes/
│   └── web.php
│
├── .env
├── artisan
├── composer.json
└── README.md
```

## Installation

### 1. Clone the project

``` bash
git clone <repository-url>
cd event-management
```

### 2. Install PHP dependencies

``` bash
composer install
```

### 3. Create the environment file

``` bash
copy .env.example .env
```

On systems where `copy` is not available:

``` bash
cp .env.example .env
```

### 4. Generate the Laravel application key

``` bash
php artisan key:generate
```

## Database Configuration

Open `.env` and configure MySQL:

``` env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=evenets
DB_USERNAME=root
DB_PASSWORD=
```

If your MySQL installation uses a password, put it in `DB_PASSWORD`.

For the current development setup, sessions can be stored as files:

``` env
SESSION_DRIVER=file
```

After changing `.env`, clear the Laravel configuration cache:

``` bash
php artisan optimize:clear
```

## Migrations

Run the migrations:

``` bash
php artisan migrate
```

If you are working on a fresh development database and do not need
existing data:

``` bash
php artisan migrate:fresh
```

> `migrate:fresh` deletes the tables managed by the Laravel migrations
> before recreating them. Do not use it on a database containing data
> you want to keep.

## Seeders

If seeders are configured, run:

``` bash
php artisan db:seed
```

You can also run a specific seeder:

``` bash
php artisan db:seed --class=CategorySeeder
```

## Running the Project

Start the Laravel development server:

``` bash
php artisan serve
```

Then open:

``` text
http://127.0.0.1:8000
```

## Routes

The current event workflow contains these routes:

  Method   URL                    Action
  -------- ---------------------- -----------------------------
  GET      `/`                    Display events
  GET      `/evenements/create`   Display event creation form
  POST     `/evenements`          Store a new event

The routes are defined in:

``` text
routes/web.php
```

## Controller

The main controller is:

``` text
app/Http/Controllers/EvenementController.php
```

It currently handles:

-   Displaying the event list
-   Displaying the create form
-   Validating submitted event data
-   Creating a new event
-   Redirecting back to the event list

The controller uses Eloquent:

``` php
$evenements = Evenement::with('category')->get();
```

## Models

### Evenement

``` text
app/Models/Evenement.php
```

The model represents the `evenements` table.

It contains relationships with:

-   `Category`
-   `Organisateur`

### Category

``` text
app/Models/Category.php
```

The model represents the `categories` table.

A category can have many events.

### Organisateur

``` text
app/Models/Organisateur.php
```

The model represents the `organisateurs` table.

An organizer can have many events.

## Blade Views

The event views are located in:

``` text
resources/views/evenements/
```

### Event list

``` text
index.blade.php
```

Displays:

-   Event image
-   Title
-   Content
-   Date
-   Location
-   Price
-   Time
-   Number of places
-   End date
-   Category

### Create event

``` text
create.blade.php
```

Contains a form for:

-   Title
-   Content
-   Image
-   Event date
-   Location
-   Price
-   Event time
-   Number of places
-   End date
-   Status
-   Category

Laravel CSRF protection is used with:

``` blade
@csrf
```

## Validation

The event creation request validates fields such as:

``` text
titre
content
date_evenement
lieu
prix
status
id_category
heure_evenement
nombre_places
date_fin
```

Examples:

``` php
'titre' => 'required|string|max:150',
'prix' => 'required|numeric|min:0',
'status' => 'required|in:publish,draft',
'id_category' => 'required|exists:categories,id_category',
'nombre_places' => 'required|integer|min:1',
```

## Development History

The project started as a procedural PHP application with files such as:

``` text
index.php
ajout.php
db.php
script.sql
style.css
```

The original PHP application used PDO to:

-   Connect to MySQL
-   Read categories
-   Display events
-   Insert new events

The project was then converted to Laravel.

The main conversion was:

``` text
Procedural PHP
      ↓
Laravel MVC
```

### Before

``` text
index.php
    ↓
SQL query
    ↓
HTML
```

### After

``` text
Route
  ↓
Controller
  ↓
Eloquent Model
  ↓
MySQL
  ↓
Blade View
```

## Important Laravel Concepts Used

This project demonstrates:

-   Laravel MVC
-   Routing
-   Controllers
-   Eloquent Models
-   Eloquent relationships
-   Migrations
-   Seeders
-   Blade templates
-   Form handling
-   CSRF protection
-   Validation
-   `.env` configuration
-   MySQL database connection

## Troubleshooting

### SQLite instead of MySQL

If Laravel displays:

``` text
Connection: sqlite
```

check `.env`:

``` env
DB_CONNECTION=mysql
```

Then run:

``` bash
php artisan optimize:clear
```

### `sessions` table does not exist

If the error mentions:

``` text
Table 'evenets.sessions' doesn't exist
```

you can use file-based sessions for this project:

``` env
SESSION_DRIVER=file
```

Then:

``` bash
php artisan optimize:clear
```

Alternatively, create and migrate the sessions table if you want
database sessions.

### `evenement` table does not exist

The Laravel project currently uses the plural table name:

``` text
evenements
```

Make sure `Evenement.php` points to:

``` php
protected $table = 'evenements';
```

Likewise:

``` php
// Category.php
protected $table = 'categories';

// Organisateur.php
protected $table = 'organisateurs';
```

### Blade view not found

If Laravel says:

``` text
View [evenements.index] not found.
```

the controller:

``` php
return view('evenements.index');
```

expects this exact file:

``` text
resources/views/evenements/index.blade.php
```

The `evenements` directory is a folder, while `index.blade.php` is the
file inside it.

## Future Improvements

Possible next features:

-   Edit events
-   Delete events
-   Event details page
-   Organizer authentication
-   Login / logout
-   Authorization for admin and users
-   Use the authenticated organizer instead of a fixed organizer ID
-   Image upload instead of image URLs
-   Search events
-   Filter by category
-   Pagination
-   Better form error messages
-   Dashboard for administrators
-   REST API
-   API authentication
-   Responsive UI

## Author

Developed as a Laravel learning project based on an original PHP Event
Management System.

## License

This project is for learning and portfolio purposes.
