<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

# Laravel Application - Complete Setup Guide

A comprehensive Laravel application following industry best practices with Repository Pattern, Service Layer, and Clean Architecture.

## 📁 Project Structure

```
laravel-app/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   │   └── Handler.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   ├── UserController.php
│   │   │   │   └── PostController.php
│   │   │   ├── BaseController.php
│   │   │   └── HealthController.php
│   │   ├── Middleware/
│   │   │   └── EnsureUserIsActive.php
│   │   ├── Requests/
│   │   │   ├── StoreUserRequest.php
│   │   │   └── UpdateUserRequest.php
│   │   └── Resources/
│   │       ├── UserResource.php
│   │       ├── UserCollection.php
│   │       └── PostResource.php
│   ├── Jobs/
│   │   └── SendWelcomeEmail.php
│   ├── Mail/
│   │   └── WelcomeEmail.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Post.php
│   ├── Providers/
│   │   └── RepositoryServiceProvider.php
│   ├── Repositories/
│   │   ├── Contracts/
│   │   │   ├── BaseRepositoryInterface.php
│   │   │   └── UserRepositoryInterface.php
│   │   ├── BaseRepository.php
│   │   ├── UserRepository.php
│   │   └── PostRepository.php
│   ├── Services/
│   │   ├── UserService.php
│   │   └── PostService.php
│   └── Traits/
│       ├── ApiResponse.php
│       └── HasUuid.php
├── config/
├── database/
│   ├── factories/
│   │   └── UserFactory.php
│   ├── migrations/
│   │   ├── 2024_01_01_000000_create_users_table.php
│   │   ├── 2024_01_01_000001_create_posts_table.php
│   │   └── add_indexes_for_performance.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── UserSeeder.php
├── resources/
│   └── views/
│       └── emails/
│           └── welcome.blade.php
├── routes/
│   ├── api.php
│   └── web.php
├── storage/
├── tests/
│   ├── Feature/
│   │   └── UserControllerTest.php
│   └── Unit/
│       └── Services/
│           └── UserServiceTest.php
├── .env
├── .env.example
├── composer.json
├── phpunit.xml
└── README.md
```

## 🚀 Quick Start

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL/PostgreSQL
- Redis (optional, for caching)
- Node.js & NPM (for frontend assets)

### Installation

```bash
# Clone the repository
git clone <repository-url>
cd laravel-app

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env file
# Then run migrations
php artisan migrate

# Seed the database
php artisan db:seed

# Create storage link
php artisan storage:link

# Install and compile frontend assets (if needed)
npm install
npm run build

# Start the development server
php artisan serve
```

## 🏗️ Architecture Overview

This application follows a **Clean Architecture** pattern with clear separation of concerns:

```
HTTP Request → Route → Middleware → Controller → Service → Repository → Model → Database
                                                                                    ↓
HTTP Response ← Resource/View ← Controller ← Service ← Repository ← Model ← Database Response
```

### Core Layers

1. **Controllers**: Handle HTTP requests and responses
2. **Services**: Contain business logic
3. **Repositories**: Data access layer with abstraction
4. **Models**: Eloquent models representing database entities
5. **Resources**: API response transformation layer
6. **Requests**: Input validation and sanitization

## 📦 Features

### ✅ Implemented Features

- **User Management**: Full CRUD operations with authentication
- **Post Management**: Content management system
- **Repository Pattern**: Clean data access abstraction
- **Service Layer**: Business logic separation
- **API Resources**: Consistent JSON responses
- **Form Request Validation**: Input validation and sanitization
- **Exception Handling**: Centralized error handling
- **Rate Limiting**: API protection against abuse
- **Caching**: Performance optimization
- **Queue System**: Background job processing
- **Email System**: Notification and messaging
- **Testing Suite**: Unit and feature tests
- **API Documentation**: Swagger/OpenAPI integration
- **Health Checks**: System monitoring endpoint

### 🔒 Security Features

- Laravel Sanctum authentication
- Rate limiting middleware
- Input validation and sanitization
- SQL injection protection
- XSS protection
- CSRF protection
- User account activation/deactivation

## 🛠️ Configuration

### Environment Variables

Key environment variables to configure:

```env
# Application
APP_NAME="Laravel App"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=root
DB_PASSWORD=

# Cache & Session
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=database

# Mail
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
```

### Database Setup

```bash
# Run migrations
php artisan migrate

# Seed with sample data
php artisan db:seed

# Create specific seeder
php artisan make:seeder PostSeeder
php artisan db:seed --class=PostSeeder
```

## 📚 API Documentation

### Authentication

All protected endpoints require authentication using Laravel Sanctum:

```bash
# Login to get token
POST /api/v1/login
{
    "email": "user@example.com",
    "password": "password"
}

# Use token in subsequent requests
Authorization: Bearer {your-token}
```

### API Endpoints

#### Users
```bash
GET    /api/v1/users              # List users (paginated)
GET    /api/v1/users/{id}         # Get user details
POST   /api/v1/users              # Create user
PUT    /api/v1/users/{id}         # Update user
DELETE /api/v1/users/{id}         # Delete user
PATCH  /api/v1/users/{id}/activate    # Activate user
PATCH  /api/v1/users/{id}/deactivate  # Deactivate user
```

#### Posts
```bash
GET    /api/v1/posts              # List posts
GET    /api/v1/posts/{id}         # Get post details
POST   /api/v1/posts              # Create post
PUT    /api/v1/posts/{id}         # Update post
DELETE /api/v1/posts/{id}         # Delete post
PATCH  /api/v1/posts/{id}/publish     # Publish post
PATCH  /api/v1/posts/{id}/unpublish   # Unpublish post
```

#### System
```bash
GET    /health                    # Health check endpoint
```

### Response Format

All API responses follow a consistent format:

```json
{
    "success": true,
    "message": "Operation successful",
    "data": {
        // Response data
    },
    "timestamp": "2024-01-01T12:00:00Z"
}
```

Error responses:
```json
{
    "success": false,
    "message": "Error message",
    "errors": {
        // Validation errors (if any)
    },
    "timestamp": "2024-01-01T12:00:00Z"
}
```

## 🧪 Testing

### Running Tests

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit

# Run with coverage
php artisan test --coverage

# Run specific test
php artisan test tests/Feature/UserControllerTest.php
```

### Test Structure

- **Feature Tests**: Test complete user workflows and API endpoints
- **Unit Tests**: Test individual classes and methods in isolation
- **Database**: Uses in-memory SQLite for fast test execution

### Writing Tests

```php
// Feature test example
public function test_can_create_user()
{
    $userData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123'
    ];

    $response = $this->postJson('/api/v1/users', $userData);

    $response->assertStatus(201)
            ->assertJson(['success' => true]);
}
```

## 🚀 Deployment

### Production Checklist

```bash
# Install production dependencies
composer install --optimize-autoloader --no-dev

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize for production
php artisan optimize

# Setup queue worker
php artisan queue:work --sleep=3 --tries=3

# Setup cron job for scheduler
* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
```

### Environment Setup

1. Set `APP_ENV=production`
2. Set `APP_DEBUG=false`
3. Configure proper database credentials
4. Set up Redis for caching and sessions
5. Configure mail settings
6. Set up queue worker with Supervisor
7. Configure web server (Apache/Nginx)

### Supervisor Configuration

```ini
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /path/to/app/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=8
redirect_stderr=true
stdout_logfile=/path/to/app/storage/logs/worker.log
```

## 🔧 Development

### Adding New Features

1. **Create Migration**: `php artisan make:migration create_table_name`
2. **Create Model**: `php artisan make:model ModelName`
3. **Create Repository Interface**: Extend `BaseRepositoryInterface`
4. **Create Repository**: Extend `BaseRepository`
5. **Create Service**: Handle business logic
6. **Create Controller**: Extend `BaseController`
7. **Create Form Requests**: For validation
8. **Create Resources**: For API responses
9. **Add Routes**: In `routes/api.php`
10. **Write Tests**: Feature and unit tests

### Code Standards

- Follow PSR-12 coding standards
- Use meaningful variable and method names
- Write comprehensive tests
- Document complex business logic
- Use type hints and return types
- Follow Laravel naming conventions

## 📊 Performance Optimization

### Caching Strategy

```php
// Repository caching example
public function findCached(int $id): ?User
{
    return Cache::remember("user:{$id}", 3600, function () use ($id) {
        return $this->find($id);
    });
}
```

### Database Optimization

- Proper indexing on frequently queried columns
- Eager loading relationships to avoid N+1 queries
- Database query optimization
- Connection pooling in production

### Application Optimization

```bash
# Enable OPcache in production
# Use Redis for caching and sessions
# Optimize Composer autoloader
composer install --optimize-autoloader --no-dev
```

## 🐛 Debugging

### Useful Commands

```bash
# Clear all caches
php artisan optimize:clear

# View logs
tail -f storage/logs/laravel.log

# Queue status
php artisan queue:work --verbose

# Database queries debugging
php artisan telescope:install  # Install Telescope for debugging
```

### Common Issues

1. **Permission Issues**: Ensure `storage/` and `bootstrap/cache/` are writable
2. **Environment Variables**: Check `.env` file configuration
3. **Database Connection**: Verify database credentials and connection
4. **Cache Issues**: Clear cache with `php artisan cache:clear`

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/new-feature`
3. Commit changes: `git commit -am 'Add new feature'`
4. Push to branch: `git push origin feature/new-feature`
5. Submit a pull request

### Development Workflow

1. Write tests first (TDD approach)
2. Implement feature
3. Ensure all tests pass
4. Update documentation
5. Submit PR with detailed description

## 📄 License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## 🆘 Support

### Documentation

- [Laravel Documentation](https://laravel.com/docs)
- [API Documentation](http://localhost:8000/api/documentation) (when running locally)

### Getting Help

1. Check the [Laravel Documentation](https://laravel.com/docs)
2. Search existing issues in the repository
3. Create a new issue with detailed information
4. Join the Laravel community forums

### Common Commands Quick Reference

```bash
# Development
php artisan serve                    # Start development server
php artisan make:controller Name     # Create controller
php artisan make:model Name         # Create model
php artisan make:migration name     # Create migration
php artisan migrate                 # Run migrations
php artisan db:seed                # Seed database
php artisan tinker                 # Interactive shell

# Testing
php artisan test                   # Run tests
php artisan test --coverage       # Run with coverage

# Optimization
php artisan optimize              # Optimize for production
php artisan config:cache         # Cache config
php artisan route:cache          # Cache routes
php artisan view:cache           # Cache views

# Maintenance
php artisan down                 # Put app in maintenance mode
php artisan up                   # Bring app out of maintenance
php artisan queue:work          # Process queue jobs
```

---

**Built with ❤️ using Laravel Framework**
