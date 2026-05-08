# BlogYaari - Blog Management System

A modern, responsive blog management system built with Laravel, featuring AJAX filtering, search functionality, and an intuitive admin panel.

## 🚀 Features
live link: https://tushitha4.github.io/job-yari/
https://tushitha4.github.io/job-yari/admin.html-admin link

### Frontend Features
- **Responsive Design**: Works seamlessly on mobile, tablet, and desktop devices
- **Dynamic Blog Listing**: All blog content fetched dynamically from database
- **AJAX Filtering**: Filter blogs by category and date without page refresh
- **Real-time Search**: Instant search functionality with debouncing
- **Beautiful UI**: Modern design with gradients, animations, and micro-interactions
- **Blog Detail Pages**: Full-featured blog post viewing with proper formatting

### Admin Panel Features
- **Secure Authentication**: Simple but effective admin login system
- **Blog Management**: Complete CRUD operations for blog posts
- **Rich Text Editor**: Summernote WYSIWYG editor for content creation
- **Image Upload**: Support for featured images with proper validation
- **Category Management**: Organize blogs by categories
- **Responsive Admin Interface**: Mobile-friendly admin dashboard

### Technical Features
- **Laravel 9 Framework**: Modern PHP framework with best practices
- **MySQL Database**: Efficient data storage and retrieval
- **AJAX + jQuery**: Dynamic content loading without page refresh
- **Bootstrap 5**: Responsive CSS framework
- **Font Awesome**: Beautiful icons throughout the application
- **SEO Friendly**: Clean URLs and proper meta tags

## 📋 Requirements

- PHP 8.0 or higher
- MySQL 5.7 or higher
- Composer
- Web server (Apache, Nginx, or Laravel Valet)
- Node.js (for asset compilation - optional)

## 🛠️ Installation

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/blogyaari.git
cd blogyaari
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
- Create a new MySQL database named `blogyaari`
- Update your `.env` file with database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blogyaari
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 5. Run Migrations and Seed Data
```bash
php artisan migrate
php artisan db:seed
```

### 6. Create Uploads Directory
```bash
mkdir -p public/uploads/blogs
chmod -R 777 public/uploads
```

### 7. Start the Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## 🔐 Admin Access

### Default Login Credentials
- **Email**: admin@blogyaari.com
- **Password**: admin123

### Admin Panel URL
`http://localhost:8000/admin/login`

## 📁 Project Structure

```
blogyaari/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── BlogController.php      # Public blog operations
│   │   │   └── AdminController.php    # Admin panel operations
│   │   └── Middleware/
│   │       └── AdminAuth.php          # Admin authentication middleware
│   ├── Models/
│   │   └── Blog.php                   # Blog model
│   └── Providers/                     # Laravel service providers
├── config/                            # Laravel configuration files
├── database/
│   ├── migrations/
│   │   └── 2024_01_01_000000_create_blogs_table.php
│   └── seeders/
│       ├── BlogSeeder.php             # Sample blog data
│       └── DatabaseSeeder.php
├── public/
│   ├── uploads/blogs/                 # Blog image uploads
│   └── index.php                      # Application entry point
├── resources/
│   └── views/
│       ├── blogs/
│       │   ├── index.blade.php        # Blog listing page
│       │   ├── show.blade.php         # Blog detail page
│       │   └── partials/
│       │       └── blog-list.blade.php # Blog list component
│       └── admin/
│           ├── login.blade.php        # Admin login
│           ├── dashboard.blade.php    # Admin dashboard
│           └── blogs/                 # Admin blog management
├── routes/
│   └── web.php                        # Application routes
├── storage/                           # Laravel storage
└── vendor/                            # Composer dependencies
```

## 🎨 Frontend Technologies Used

- **Bootstrap 5**: Responsive CSS framework
- **Font Awesome 6**: Icon library
- **jQuery 3.6**: JavaScript library for AJAX operations
- **Summernote**: WYSIWYG text editor for admin panel
- **Custom CSS**: Modern gradients, animations, and transitions

## 🔧 Backend Technologies Used

- **Laravel 9**: PHP framework
- **MySQL**: Relational database
- **Eloquent ORM**: Database abstraction layer
- **Blade Templates**: Server-side templating
- **Middleware**: Request filtering and authentication

## 📱 Responsive Design

The application is fully responsive and works on:
- **Mobile phones** (320px and up)
- **Tablets** (768px and up)
- **Desktop computers** (1024px and up)

### Responsive Features
- Collapsible navigation menu
- Adaptive grid layouts
- Touch-friendly interface elements
- Optimized typography for different screen sizes
- Flexible image sizing

## 🔄 AJAX Functionality

### Filtering System
- **Category Filter**: Filter blogs by specific categories
- **Date Filter**: Filter blogs by publication date
- **Combined Filters**: Apply multiple filters simultaneously
- **Clear Filters**: Reset all filters with one click

### Search System
- **Real-time Search**: Search as you type with debouncing
- **Multi-field Search**: Search across title, content, and description
- **Instant Results**: Results update without page refresh
- **Loading Indicators**: Visual feedback during AJAX requests

## 🖼️ Image Management

### Supported Formats
- JPEG
- PNG
- GIF
- Maximum file size: 2MB

### Image Features
- Automatic image resizing
- Secure file upload validation
- Image deletion when blog is removed
- Fallback placeholder for missing images

## 🚀 Deployment

### Local Development
```bash
php artisan serve
```

### Production Deployment

#### 1. Server Requirements
- PHP 8.0+
- MySQL 5.7+
- Web server with mod_rewrite
- Composer

#### 2. Production Setup
```bash
# Set environment to production
APP_ENV=production
APP_DEBUG=false

# Optimize the application
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper file permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

#### 3. Web Server Configuration

**Apache (.htaccess)**
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

**Nginx**
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## 🔍 API Endpoints

### Public Endpoints
- `GET /` - Blog listing page
- `GET /blog/{slug}` - Blog detail page
- `GET /filter-blogs` - AJAX filter endpoint
- `GET /search-blogs` - AJAX search endpoint

### Admin Endpoints
- `GET /admin/login` - Admin login page
- `POST /admin/login` - Admin login submission
- `POST /admin/logout` - Admin logout
- `GET /admin/` - Admin dashboard
- `GET /admin/blogs` - Blog management index
- `GET /admin/blogs/create` - Create blog form
- `POST /admin/blogs` - Store new blog
- `GET /admin/blogs/{id}/edit` - Edit blog form
- `PUT /admin/blogs/{id}` - Update blog
- `DELETE /admin/blogs/{id}` - Delete blog

## 🧪 Testing

The application includes built-in testing capabilities:

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter BlogTest
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Troubleshooting

### Common Issues

#### 1. Database Connection Error
- Ensure MySQL server is running
- Check database credentials in `.env` file
- Verify database exists and user has proper permissions

#### 2. Image Upload Issues
- Ensure `uploads/blogs` directory exists and is writable
- Check PHP file upload limits in `php.ini`
- Verify image file size and format restrictions

#### 3. AJAX Not Working
- Check jQuery is loading properly
- Verify CSRF token is present
- Check browser console for JavaScript errors

#### 4. Admin Login Issues
- Clear session cache: `php artisan cache:clear`
- Verify session configuration in `.env`
- Check if admin session middleware is properly configured

### Debug Mode
Enable debug mode in `.env` for detailed error messages:
```env
APP_DEBUG=true
```

## 📞 Support

For support and questions:
- Create an issue on GitHub
- Email: support@blogyaari.com
- Documentation: [Project Wiki](https://github.com/yourusername/blogyaari/wiki)

## 🔄 Version History

- **v1.0.0** - Initial release with core functionality
- **v1.1.0** - Added AJAX filtering and search
- **v1.2.0** - Enhanced responsive design
- **v1.3.0** - Added rich text editor
- **v1.4.0** - Improved admin panel UI

## 🌟 Acknowledgments

- Laravel Framework and Community
- Bootstrap CSS Framework
- Font Awesome Icons
- Summernote Editor
- All contributors and testers

---

**Built with ❤️ for the JobYaari Developer Assessment**
