# Kanban API

This is a kanban REST API.

## 🔧 Technologies

-   [Laravel 8](https://laravel.com/)
-   [MariaDB](https://mariadb.org/)

## 🛠️ Setup

### Prerequisites

-   PHP >= 7.4
-   Composer
-   MariaDB >= 10.6

### Installation

```bash
# Clone the repo
git clone https://github.com/maksstepak/laravel-kanban-api.git

# Navigate into the directory
cd laravel-kanban-api

# Copy the .env.example file and make the required configuration changes in the .env file
cp .env.example .env

# Install depedencies
composer install

# Execute migrations
php artisan migrate

# Run the app
php artisan serve
```

## ⚙️ API endpoints

<table>
    <thead>
        <tr>
            <th>Method</th>
            <th>Endpoint</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>POST</td>
            <td>/login</td>
            <td>Login a user</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/register</td>
            <td>Register a user</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/me</td>
            <td>Show authenticated user</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/logout</td>
            <td>Logout authenticated user</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/users/{userId}/boards</td>
            <td>Show boards for a user</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/boards</td>
            <td>Create a board</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/boards/{boardId}</td>
            <td>Show a board</td>
        </tr>
        <tr>
            <td>PUT</td>
            <td>/boards/{boardId}</td>
            <td>Update a board</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/boards/{boardId}</td>
            <td>Delete a board</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/boards/{boardId}/columns</td>
            <td>Show columns for a board</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/boards/{boardId}/columns</td>
            <td>Create a column for a board</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/columns/{columnId}</td>
            <td>Show a column</td>
        </tr>
        <tr>
            <td>PUT</td>
            <td>/columns/{columnId}</td>
            <td>Update a column</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/columns/{columnId}</td>
            <td>Delete a column</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/columns/{boardId}/cards</td>
            <td>Show cards for a column</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/columns/{boardId}/cards</td>
            <td>Create a card for a column</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/cards/{cardId}</td>
            <td>Show a card</td>
        </tr>
        <tr>
            <td>PUT</td>
            <td>/cards/{cardId}</td>
            <td>Update a card</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/cards/{cardId}</td>
            <td>Delete a card</td>
        </tr>
    </tbody>
</table>
