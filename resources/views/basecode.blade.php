<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel Base Code Setup</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                color: #333;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }

            header {
                text-align: center;
                margin-bottom: 30px;
                color: white;
            }

            h1 {
                font-size: 2.5rem;
                margin-bottom: 10px;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }

            .subtitle {
                font-size: 1.2rem;
                opacity: 0.9;
            }

            .card {
                background: white;
                border-radius: 15px;
                padding: 25px;
                margin-bottom: 20px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            }

            .card h2 {
                color: #667eea;
                margin-bottom: 15px;
                font-size: 1.5rem;
                border-bottom: 2px solid #f0f0f0;
                padding-bottom: 8px;
            }

            .code-block {
                background: #2d3748;
                color: #e2e8f0;
                padding: 20px;
                border-radius: 10px;
                margin: 15px 0;
                font-family: 'Courier New', monospace;
                overflow-x: auto;
                position: relative;
            }

            .code-block::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(90deg, #667eea, #764ba2);
                border-radius: 10px 10px 0 0;
            }

            .copy-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                background: #4a5568;
                color: white;
                border: none;
                padding: 5px 10px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 12px;
                transition: background 0.3s ease;
            }

            .copy-btn:hover {
                background: #667eea;
            }

            .grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 20px;
            }

            .step-number {
                background: #667eea;
                color: white;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                margin-right: 10px;
            }

            .feature-list {
                list-style: none;
                padding: 0;
            }

            .feature-list li {
                padding: 8px 0;
                position: relative;
                padding-left: 30px;
            }

            .feature-list li::before {
                content: '✅';
                position: absolute;
                left: 0;
                font-size: 1.2em;
            }

            .architecture-flow {
                text-align: center;
                padding: 20px;
                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                color: white;
                border-radius: 10px;
                margin: 20px 0;
            }

            .flow-arrow {
                display: inline-block;
                margin: 0 10px;
                font-size: 1.5em;
            }

            @media (max-width: 768px) {
                h1 {
                    font-size: 2rem;
                }

                .grid {
                    grid-template-columns: 1fr;
                }

                .container {
                    padding: 10px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>🚀 Laravel Base Code Setup</h1>
                <p class="subtitle">Complete setup with Repository Pattern, Service Layer & Clean Architecture</p>
            </header>

            <div class="card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <h2 style="color: white; border-bottom: 2px solid rgba(255,255,255,0.3);">📋 Summary - High Level Application Structure</h2>
                <p style="font-size: 1.1em; margin-bottom: 20px;">
                    <strong>Clean Architecture for Easy Code Management:</strong> This Laravel setup follows industry best practices with clear separation of concerns, making your application scalable, maintainable, and testable.
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; margin: 20px 0;">
                    <div style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;">
                        <h4>🎯 Controllers</h4>
                        <p>Handle HTTP requests & responses only</p>
                    </div>
                    <div style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;">
                        <h4>⚡ Services</h4>
                        <p>Business logic & complex operations</p>
                    </div>
                    <div style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;">
                        <h4>🗄️ Repositories</h4>
                        <p>Data access & database queries</p>
                    </div>
                    <div style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;">
                        <h4>📤 Resources</h4>
                        <p>Format & transform API responses</p>
                    </div>
                </div>

                <div style="background: rgba(255,255,255,0.15); padding: 15px; border-radius: 10px; margin-top: 15px;">
                    <h4>🎁 Benefits:</h4>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px; margin-top: 10px;">
                        <div>✅ <strong>Easy Testing</strong> - Mock any layer</div>
                        <div>✅ <strong>Clean Code</strong> - Single responsibility</div>
                        <div>✅ <strong>Reusable</strong> - Share logic across app</div>
                        <div>✅ <strong>Maintainable</strong> - Change one layer at a time</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2><span class="step-number">1</span>Quick Installation</h2>
                <div class="code-block">
                    <button class="copy-btn" onclick="copyCode(this)">Copy</button>
                    # Create Laravel project
                    composer create-project laravel/laravel my-app
                    cd my-app

                    # Install packages
                    composer require laravel/sanctum spatie/laravel-permission

                    # Setup environment
                    cp .env.example .env
                    php artisan key:generate
                    php artisan storage:link
                </div>
            </div>

            <div class="architecture-flow">
                <h3>🏗️ Architecture Flow</h3>
                <p>
                    Request <span class="flow-arrow">→</span> 
                    Controller <span class="flow-arrow">→</span> 
                    Service <span class="flow-arrow">→</span> 
                    Repository <span class="flow-arrow">→</span> 
                    Model <span class="flow-arrow">→</span> 
                    Database
                </p>
                <p style="margin-top: 15px; font-size: 0.9em; opacity: 0.9;">
                    Response <span class="flow-arrow">←</span> 
                    Resources <span class="flow-arrow">←</span> 
                    Controller <span class="flow-arrow">←</span> 
                    Service <span class="flow-arrow">←</span> 
                    Repository <span class="flow-arrow">←</span> 
                    Model
                </p>
            </div>

            <div class="grid">
                <div class="card">
                    <h2><span class="step-number">2</span>Database Setup</h2>
                    <div class="code-block">
                        <button class="copy-btn" onclick="copyCode(this)">Copy</button>
                        # Create migrations
                        php artisan make:migration create_users_table
                        php artisan make:migration create_posts_table

                        # Run migrations
                        php artisan migrate

                        # Seed database
                        php artisan db:seed
                    </div>
                </div>

                <div class="card">
                    <h2><span class="step-number">3</span>Create Structure</h2>
                    <div class="code-block">
                        <button class="copy-btn" onclick="copyCode(this)">Copy</button>
                        # Create directories
                        mkdir -p app/Services
                        mkdir -p app/Repositories
                        mkdir -p app/Http/Resources
                        mkdir -p app/Http/Requests

                        # Generate files
                        php artisan make:controller Api/UserController
                        php artisan make:model User
                        php artisan make:request StoreUserRequest
                    </div>
                </div>
            </div>

            <div class="grid">
                <div class="card">
                    <h2><span class="step-number">4</span>API Endpoints</h2>
                    <div class="code-block">
                        <button class="copy-btn" onclick="copyCode(this)">Copy</button>
                        POST /api/v1/login           # Authentication
                        GET  /api/v1/users           # List users
                        POST /api/v1/users           # Create user
                        GET  /api/v1/users/{id}      # Get user
                        PUT  /api/v1/users/{id}      # Update user
                        DELETE /api/v1/users/{id}    # Delete user
                    </div>
                </div>

                <div class="card">
                    <h2><span class="step-number">5</span>Testing & Deploy</h2>
                    <div class="code-block">
                        <button class="copy-btn" onclick="copyCode(this)">Copy</button>
                        # Run tests
                        php artisan test

                        # Production deploy
                        composer install --no-dev --optimize-autoloader
                        php artisan config:cache
                        php artisan route:cache
                        php artisan optimize

                        # Start server
                        php artisan serve
                    </div>
                </div>
            </div>

            <div class="card">
                <h2>✨ Included Features</h2>
                <ul class="feature-list">
                    <li>Repository Pattern Implementation</li>
                    <li>Service Layer for Business Logic</li>
                    <li>API Resources for Response Formatting</li>
                    <li>Form Request Validation</li>
                    <li>Laravel Sanctum Authentication</li>
                    <li>Rate Limiting Protection</li>
                    <li>Centralized Error Handling</li>
                    <li>Unit & Feature Testing Setup</li>
                    <li>Queue System Integration</li>
                    <li>Redis Caching Support</li>
                    <li>Email System Configuration</li>
                    <li>Health Check Endpoints</li>
                </ul>
            </div>

            <div class="card">
                <h2>📁 Project Structure</h2>
                <div class="code-block">
                    <button class="copy-btn" onclick="copyCode(this)">Copy</button>
                    app/
                    ├── Http/Controllers/Api/UserController.php
                    ├── Services/UserService.php
                    ├── Repositories/UserRepository.php
                    ├── Models/User.php
                    ├── Http/Resources/UserResource.php
                    ├── Http/Requests/StoreUserRequest.php
                    ├── Jobs/SendWelcomeEmail.php
                    └── Traits/ApiResponse.php

                    database/
                    ├── migrations/
                    ├── seeders/
                    └── factories/

                    tests/
                    ├── Feature/UserControllerTest.php
                    └── Unit/Services/UserServiceTest.php
                </div>
            </div>

            <div class="card">
                <h2>🚀 One Command Setup</h2>
                <div class="code-block">
                    <button class="copy-btn" onclick="copyCode(this)">Copy</button>
                    git add . && git commit -m "feat: Complete Laravel API setup with Repository Pattern, Service Layer, Authentication, Testing & Documentation"
                </div>
            </div>
        </div>

        <script>
            function copyCode(button) {
                const codeBlock = button.parentElement;
                const code = codeBlock.textContent.replace('Copy', '').trim();

                navigator.clipboard.writeText(code).then(() => {
                    const originalText = button.textContent;
                    button.textContent = 'Copied!';
                    button.style.background = '#48bb78';

                    setTimeout(() => {
                        button.textContent = originalText;
                        button.style.background = '#4a5568';
                    }, 2000);
                }).catch(() => {
                    // Fallback for older browsers
                    const textarea = document.createElement('textarea');
                    textarea.value = code;
                    document.body.appendChild(textarea);
                    textarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textarea);

                    button.textContent = 'Copied!';
                    setTimeout(() => {
                        button.textContent = 'Copy';
                    }, 2000);
                });
            }

            // Add smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Add loading animation
            window.addEventListener('load', () => {
                document.querySelectorAll('.card').forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(30px)';
                        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 100);
                    }, index * 200);
                });
            });
        </script>
    </body>
</html>