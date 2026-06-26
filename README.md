# IPM Interior Design

Website landing page desain interior dengan Laravel 10, bilingual (Bahasa Indonesia & Inggris), dan admin panel.

## Fitur Utama

### Frontend
- **Landing Page** - Hero, About, Featured Portfolio, Services, Pricing, Testimonials, Contact
- **Gallery** - Filter by category, pagination, lightbox
- **Services Page** - 6 layanan dengan detail lengkap
- **Pricing Page** - 4 paket harga dengan comparison
- **Portfolio Detail** - Gambar gallery, project info, related projects
- **Quote Request** - Form dengan upload referensi
- **Bilingual** - Bahasa Indonesia & Inggris dengan language switcher
- **WhatsApp Integration** - Floating button dengan pre-filled messages

### Admin Panel
- **Dashboard** - Statistik dan recent activity
- **Portfolio Management** - CRUD dengan image upload
- **Service Management** - CRUD layanan
- **Pricing Management** - CRUD paket harga
- **Quote Management** - Status workflow (pending → in_review → quoted → accepted/rejected)
- **Contact Messages** - Inbox dengan read/unread
- **Testimonials** - CRUD testimoni client
- **Settings** - Site configuration

## Tech Stack

- **Backend**: Laravel 10.x, PHP 8.1+
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL 8.0+
- **Authentication**: Laravel Breeze
- **Image Handling**: Intervention Image 3.x
- **Localization**: Laravel Localization

## Instalasi

### 1. Clone Repository

```bash
cd C:\laragon\www
# Copy project files ke folder baru
mkdir ipm-interior
cd ipm-interior
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
copy .env.example .env

# Generate application key
php artisan key:generate
```

Edit `.env` file:
```env
DB_DATABASE=ipm_interior
DB_USERNAME=root
DB_PASSWORD=

APP_LOCALE=id
APP_FALLBACK_LOCALE=id

WHATSAPP_NUMBER=+6281234567890
WHATSAPP_ENABLED=true
```

### 4. Database Setup

```bash
# Create database
php artisan migrate

# Run seeders
php artisan db:seed
```

### 5. Storage Setup

```bash
# Create symbolic link for storage
php artisan storage:link
```

### 6. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 7. Access Website

- **Frontend**: http://localhost/ipm-interior/public/
- **Admin**: http://localhost/ipm-interior/public/admin
- **Login**: admin@ipm.com / password

## Struktur Folder

```
ipm-interior/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Frontend/     # Frontend controllers
│   │   │   └── Admin/        # Admin controllers
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   ├── Helpers/
│   └── Providers/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── frontend/         # Frontend pages
│   │   ├── admin/            # Admin pages
│   │   ├── layouts/          # Master layouts
│   │   └── partials/         # Shared components
│   ├── lang/                 # Translations (id, en)
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   ├── admin.php
│   └── auth.php
└── public/
    └── images/
```

## Bilingual System

Website mendukung 2 bahasa:

1. **Bahasa Indonesia** (default)
2. **English**

Language files tersedia di `resources/lang/id/` dan `resources/lang/en/`.

### Cara Menggunakan

Di views:
```blade
{{ __('messages.nav.home') }}
{{ __('pages.home.hero_title') }}
```

Switch language:
```
/language/en  → Switch ke English
/language/id  → Switch ke Indonesia
```

## Admin Panel

### Default Login
- **Email**: admin@ipm.com
- **Password**: password

### Fitur Admin
1. **Dashboard** - Lihat statistik dan aktivitas terbaru
2. **Portfolios** - Kelola project portfolio dengan gambar
3. **Services** - Kelola layanan yang ditawarkan
4. **Pricing** - Kelola paket harga
5. **Quotes** - Manage quote requests dari client
6. **Contacts** - Lihat pesan dari contact form
7. **Testimonials** - Kelola testimoni client
8. **Settings** - Konfigurasi website

## WhatsApp Integration

### Floating Button
- Muncul di pojok kanan bawah
- Custom message per halaman
- Auto-redirect ke WhatsApp Web/App

### Pre-filled Messages
- **Home**: "Halo IPM, saya tertarik dengan layanan desain interior..."
- **Gallery**: "Halo IPM, saya suka dengan project [nama]..."
- **Services**: "Halo IPM, saya ingin tahu lebih detail tentang [layanan]..."

### Configuration
Edit di `Settings > WhatsApp` atau `.env`:
```env
WHATSAPP_NUMBER=+6281234567890
WHATSAPP_ENABLED=true
```

## Database Schema

### Tables
- **users** - Admin users
- **portfolios** - Portfolio projects (bilingual)
- **services** - Services (bilingual)
- **pricing_packages** - Pricing plans (bilingual)
- **testimonials** - Client testimonials (bilingual)
- **quote_requests** - Quote submissions
- **contact_messages** - Contact form messages
- **settings** - Site configuration

## Customization

### Colors
Edit `tailwind.config.js`:
```javascript
colors: {
    primary: {
        500: '#c9a962',  // Gold accent
    },
    dark: {
        900: '#1a1a1a',  // Charcoal
    },
}
```

### Logo
Replace files in `public/images/`:
- logo.png
- logo-white.png
- favicon.ico

### Content
Edit di `resources/lang/` untuk text bilingual.

## Troubleshooting

### 500 Error
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Storage not found
```bash
php artisan storage:link
```

### Assets not loading
```bash
npm run build
```

### Database connection error
Check `.env` database configuration dan pastikan MySQL running.

## Development

### Run Development Server
```bash
php artisan serve
npm run dev
```

### Create New Migration
```bash
php artisan make:migration create_table_name
```

### Create New Seeder
```bash
php artisan make:seeder SeederName
```

## Deployment

### Production Checklist
1. Set `APP_ENV=production`
2. Set `APP_DEBUG=false`
3. Configure proper database credentials
4. Set up SSL certificate
5. Configure web server (Apache/Nginx)
6. Set up queue worker (if using email queues)
7. Configure backup schedule

### Build for Production
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

## License

This project is licensed under the MIT License.

## Credits

- **Brand**: IPM Interior Design
- **Framework**: Laravel 10
- **Styling**: Tailwind CSS
- **Icons**: Heroicons

## Support

For support or inquiries:
- Email: hello@ipm-interior.com
- WhatsApp: +62 812-3456-7890

---

© 2024 IPM Interior Design. All rights reserved.
