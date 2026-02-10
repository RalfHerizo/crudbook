<div align="center">

# 📚 Library Manager

### Clean Architecture CRUD System

A modern Book Management System built with Laravel 11, implementing Clean Architecture principles and Test-Driven Development (TDD).

[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Pest PHP](https://img.shields.io/badge/Pest_PHP-Testing-6B7280?style=for-the-badge&logo=php&logoColor=white)](https://pestphp.com)

[Features](#-features) • [Installation](#-installation) • [Architecture](#-architecture) • [Testing](#-testing) • [Usage](#-usage)

</div>

---

## 🎯 Overview

This project goes beyond a simple CRUD application by implementing **Clean Architecture** principles and comprehensive **Test-Driven Development**. The system is designed for maintainability, scalability, and easy testing.

### Why This Project Stands Out

- **🏗️ Decoupled Architecture** - Business logic separated from framework dependencies
- **🔍 Advanced Search** - Smart filtering by title and author
- **✅ Test-Driven** - Comprehensive test coverage with Pest PHP
- **🎨 Modern UI** - Tailwind CSS with interactive modals
- **⚡ Optimized** - Efficient pagination with query persistence

---

## 🛠️ Tech Stack

| Category | Technology |
|----------|-----------|
| **Framework** | Laravel 11 |
| **Language** | PHP 8.2+ |
| **Database (Dev)** | MySQL |
| **Database (Test)** | SQLite |
| **Frontend** | Blade Templates |
| **Styling** | Tailwind CSS |
| **Build Tool** | Vite |
| **Testing** | Pest PHP |
| **Architecture** | Repository Pattern |

---

## ✨ Features

### 📖 Core Functionality
- **CRUD Operations** - Create, Read, Update, Delete books
- **Advanced Search** - Filter books by title or author
- **Pagination** - Optimized data loading with query string persistence
- **Validation** - Strict data integrity with Form Requests

### 🏛️ Architecture Highlights
- **Repository Pattern** - Business logic decoupled from Eloquent ORM
- **Clean Architecture** - Easy to switch from database to API or other storage
- **Form Requests** - Centralized validation logic
- **Service Layer** - Reusable business logic

### 🎨 User Experience
- **Responsive Design** - Works seamlessly on all devices
- **Interactive Modals** - Confirmation dialogs for destructive actions
- **Real-time Search** - Instant filtering without page reload
- **Flash Messages** - User-friendly success/error notifications

---

## 🚀 Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL (for development)

### Step-by-Step Guide

#### 1️⃣ Clone the Repository

```bash
git clone https://github.com/RalfHerizo/crudbook.git
cd crudbook
```

#### 2️⃣ Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

#### 3️⃣ Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### 4️⃣ Database Setup

Configure your database in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_manager
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run migrations:

```bash
php artisan migrate
```

#### 5️⃣ Build Assets & Start Server

```bash
# Build frontend assets (in one terminal)
npm run dev

# Start Laravel development server (in another terminal)
php artisan serve
```

🎉 **Your application is now running at** `http://localhost:8000`

---

## 🏗️ Architecture

This project implements **Clean Architecture** principles for maximum flexibility and maintainability.

### Repository Pattern

```
┌─────────────┐      ┌──────────────┐      ┌─────────────┐
│ Controller  │ ───> │  Repository  │ ───> │   Model     │
└─────────────┘      └──────────────┘      └─────────────┘
       │                     │                     │
       │                     │                     │
       v                     v                     v
  HTTP Layer          Business Logic         Data Layer
```

**Benefits:**
- ✅ Business logic decoupled from Eloquent
- ✅ Easy to mock for testing
- ✅ Can switch to API/Cache without changing controllers
- ✅ Single Responsibility Principle

### Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── BookController.php
│   └── Requests/
│       ├── StoreBookRequest.php
├── Models/
│   └── Book.php
└── Repositories/
│   └── BookRepository.php
└── Interfaces/
    └── BookRepositoryInterface.php

tests/
├── Feature/
│   ├── BookManagementTest.php
└── Unit/
```

### Key Components

#### 📝 Form Requests
Centralized validation logic:
- `StoreBookRequest.php` - Validation for books methods

#### 🔧 Repository Interface
```php
interface BookRepositoryInterface {
    public function getPaginated($perPage = 10, ?string $search = null);
    public function getAll();
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function deleteAll();
}
```

#### 🔍 Advanced Search Logic
Uses Laravel's `when()` method for conditional queries:
```php
return Book::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
```

---

## 🧪 Testing

Quality is a priority. This project uses **Pest PHP** for elegant and readable tests.

### Test Coverage

| Category | Description |
|----------|-------------|
| ✅ **Feature Tests** | End-to-end CRUD operations |
| ✅ **Validation Tests** | Invalid data handling |
| ✅ **Search Tests** | Filtering logic verification |
| ✅ **Database Tests** | Data integrity checks |

### Running Tests

```bash
# Run all tests
php artisan test

# Run with coverage
php artisan test --coverage

# Run specific test file
php artisan test --filter BookCrudTest

# Run in parallel (faster)
php artisan test --parallel
```

### Test Examples

```php
// Feature Test Example
test('update a book TEST', function () {
    
    
    $book = Book::create([
        'title' => 'Titre Valide',
        'author' => 'Auteur',
        'description' => 'Description'
    ]);

    $response = $this->post(route('books.update', $book->id), [
        'title' => '', // On envoie du vide
        'author' => 'Auteur',
        'description' => 'Description'
    ]);

    $response->assertStatus(302); 
    $response->assertSessionHasErrors(['title']);

    $this->assertEquals('Titre Valide', $book->refresh()->title);

});
```

### Database Isolation

All tests use `RefreshDatabase` trait to ensure:
- ✅ Clean state for each test
- ✅ No test pollution
- ✅ Fast SQLite in-memory database

---

## 💻 Usage

### Managing Books

#### Create a Book
1. Click "Add New Book" button
2. Fill in the form (Title, Author, ISBN, etc.)
3. Click "Save"

#### Search Books
- Use the search bar to filter by title or author
- Results update automatically

#### Edit a Book
1. Click "Edit" button on any book
2. Modify the fields
3. Click "Update"

#### Delete Books
- **Single**: Click "Delete" and confirm in the modal
- **Bulk**: Select multiple books and click "Delete Selected"

### API-Like Usage

While this is a web application, the repository pattern makes it easy to expose an API:

```php
// In a future API Controller
public function index(BookRepository $repository)
{
    return response()->json([
        'data' => $repository->all()
    ]);
}
```

---

## 🎨 UI Screenshots

### Book List View
- Responsive table design
- Search functionality
- Pagination controls
- Bulk actions

### Interactive Modals
- Delete confirmation
- Bulk delete warning
- Smooth animations

---

## 🔧 Configuration

### Customizing Pagination

Edit `app/Http/Controllers/BookController.php`:

```php
// Change from 10 to your preferred number
$books = Book::paginate(15);
```

### Adding New Fields

1. Create migration:
```bash
php artisan make:migration add_publisher_to_books_table
```

2. Update Form Requests (validation)
3. Update views (forms and tables)
4. Add tests

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Guidelines

- ✅ Write tests for new features
- ✅ Follow PSR-12 coding standards
- ✅ Update documentation
- ✅ Keep commits atomic and descriptive

---

## 📝 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 👤 Author

**RalfHerizo**

- GitHub: [@RalfHerizo](https://github.com/RalfHerizo)
- Project Link: [https://github.com/RalfHerizo/crudbook](https://github.com/RalfHerizo/crudbook)

---

## 🙏 Acknowledgments

- Laravel Community for excellent documentation
- Pest PHP for making testing enjoyable
- Tailwind CSS for modern styling
- All contributors and supporters

---

<div align="center">

### ⭐ Star this repository if you find it helpful!

**Made with ❤️ using Laravel & Clean Architecture**

</div>
