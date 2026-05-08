# Deployment Guide - BlogYaari

This guide will help you deploy the BlogYaari application to various hosting platforms.

## 🚀 Quick Deployment Options

### Option 1: InfinityFree (Recommended - Free)
1. Sign up at [InfinityFree](https://infinityfree.net/)
2. Create a new account and verify your email
3. Go to your control panel and create a new website
4. Upload all files using the File Manager or FTP
5. Import the database using phpMyAdmin
6. Update the `.env` file with your database credentials
7. Set file permissions for `storage/` and `uploads/` directories

### Option 2: 000webhost (Free)
1. Register at [000webhost](https://www.000webhost.com/)
2. Create a new website with PHP and MySQL
3. Upload files using File Manager or FTP
4. Import the database
5. Configure `.env` file
6. Set proper permissions

### Option 3: Render (Free Tier Available)
1. Sign up at [Render](https://render.com/)
2. Connect your GitHub repository
3. Create a new Web Service
4. Set build command: `composer install`
5. Set start command: `php artisan serve --host=0.0.0.0 --port=$PORT`
6. Add environment variables for database

## 📋 Pre-Deployment Checklist

### 1. Environment Configuration
```bash
# Set production values in .env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database configuration
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=your-db-username
DB_PASSWORD=your-db-password
```

### 2. Optimize Application
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 3. Database Setup
- Export your local database:
```bash
mysqldump -u username -p database_name > blogyaari.sql
```
- Import to production database via phpMyAdmin or command line

### 4. File Permissions
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 777 public/uploads/
```

## 🔧 Platform-Specific Instructions

### Shared Hosting (cPanel)
1. Upload all files to `public_html/` directory
2. Set document root to `public_html/public`
3. Create MySQL database via cPanel
4. Import database using phpMyAdmin
5. Edit `.env` file with database credentials
6. Set file permissions via cPanel File Manager

### VPS/Dedicated Server
1. Install LAMP/LEMP stack
2. Configure Apache/Nginx virtual host
3. Install Composer
4. Clone repository from GitHub
5. Run `composer install --no-dev --optimize-autoloader`
6. Configure environment file
7. Set up database and run migrations
8. Configure web server to point to `public/` directory

### Docker Deployment
Create `Dockerfile`:
```dockerfile
FROM php:8.0-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["php-fpm"]
```

## 🔍 Troubleshooting

### Common Issues

#### 1. 500 Internal Server Error
- Check `.env` file configuration
- Verify file permissions
- Check error logs: `storage/logs/laravel.log`

#### 2. Database Connection Failed
- Verify database credentials
- Check if database server is running
- Ensure database exists and user has permissions

#### 3. Images Not Uploading
- Check `uploads/` directory permissions
- Verify PHP upload limits in `php.ini`
- Ensure disk space is available

#### 4. AJAX Not Working
- Check if jQuery is loading
- Verify CSRF token is present
- Check browser console for JavaScript errors

### Debug Mode
Enable debug mode temporarily:
```env
APP_DEBUG=true
```
Remember to disable it in production!

## 🌐 Domain Configuration

### Apache (.htaccess)
The `.htaccess` file is already included in the `public/` directory.

### Nginx
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/html/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## 📊 Performance Optimization

### 1. Enable Caching
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Use CDN for Static Assets
- Upload CSS, JS, and images to CDN
- Update asset URLs in views

### 3. Database Optimization
- Add database indexes
- Use query caching
- Optimize slow queries

## 🔒 Security Considerations

### 1. Environment Security
- Never commit `.env` file to version control
- Use strong database passwords
- Change default admin credentials

### 2. File Permissions
```bash
chmod 600 .env
chmod 755 artisan
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### 3. HTTPS Setup
- Install SSL certificate
- Force HTTPS in `.env`: `APP_URL=https://your-domain.com`
- Update web server configuration

## 📱 Testing After Deployment

### 1. Basic Functionality
- [ ] Homepage loads correctly
- [ ] Blog listing works
- [ ] Blog detail pages load
- [ ] AJAX filtering works
- [ ] Search functionality works

### 2. Admin Panel
- [ ] Admin login works
- [ ] Dashboard loads
- [ ] Blog CRUD operations work
- [ ] Image upload works

### 3. Responsive Design
- [ ] Mobile view works
- [ ] Tablet view works
- [ ] Desktop view works

### 4. Performance
- [ ] Page load time under 3 seconds
- [ ] AJAX responses are fast
- [ ] Images load properly

## 📞 Support Resources

### Documentation
- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [jQuery Documentation](https://jquery.com/documentation)

### Community
- [Laravel Forums](https://laracasts.com/discuss)
- [Stack Overflow](https://stackoverflow.com/questions/tagged/laravel)

### Hosting Support
- Contact your hosting provider's support team
- Check hosting provider's documentation

## 🎉 Success!

Your BlogYaari application is now live! Share your website with the world and don't forget to:

1. **Submit your assignment** with:
   - GitHub Repository Link
   - Live Website Link
   - Admin Panel URL + Login Credentials
   - README file with setup instructions

2. **Test thoroughly** before submission

3. **Keep your credentials secure** after submission

Good luck with your JobYaari assessment! 🚀
