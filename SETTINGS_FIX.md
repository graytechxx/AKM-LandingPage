# Admin Settings - Panduan Perbaikan

## Masalah yang Diperbaiki

### 1. **File Upload Validation Error**
- **Masalah**: Validasi file menggunakan rule `image` yang tidak mendukung SVG
- **Solusi**: Mengubah validasi menjadi `mimes:png,jpg,jpeg,svg` tanpa rule `image`
- **File**: `app/Http/Controllers/Admin/SettingController.php`

### 2. **Storage Symlink Issue** 
- **Masalah**: `public/storage` bukan symlink yang valid di Windows
- **Solusi**: Membuat junction menggunakan PowerShell `New-Item` alih-alih `php artisan storage:link`
- **Command**: 
  ```powershell
  Remove-Item -Path "C:\laragon\www\ipmtes\public\storage" -Recurse -Force
  New-Item -ItemType Junction -Path "C:\laragon\www\ipmtes\public\storage" -Target "C:\laragon\www\ipmtes\storage\app\public"
  ```

### 3. **Form UX Improvements**
- **Ditambahkan**: Error message display yang lebih jelas
- **Ditambahkan**: Success message notification
- **Ditambahkan**: File preview dengan ukuran file
- **Ditambahkan**: Reset button
- **Ditambahkan**: Loading state pada submit button
- **Ditambahkan**: Better image error handling dengan fallback
- **File**: `resources/views/admin/settings/index.blade.php`

## Kompoemen yang Berhasil Ditest

✓ **Database Settings**: 23 settings berhasil tersimpan
✓ **Logo Upload**: PNG file tersimpan dan dapat diakses
✓ **Favicon Upload**: ICO file tersimpan dan dapat diakses  
✓ **Validation**: Semua field berhasil divalidasi
✓ **Storage Access**: Files dapat diakses melalui `/storage/`
✓ **Site Name Update**: Berhasil tersimpan dan dapat dibaca

## Cara Menggunakan

### Mengubah Nama Web
1. Buka Admin Panel → Settings
2. Ubah field "Site Name" 
3. Klik tombol "Save Settings"
4. Tunggu notifikasi sukses

### Upload Logo/Favicon
1. Buka Admin Panel → Settings
2. Scroll ke bagian "Logo & Favicon"
3. Klik "Choose File" untuk upload file baru
4. Format yang didukung:
   - Logo: PNG, JPG, JPEG, SVG (Max 2MB)
   - Favicon: PNG, ICO (Max 1MB)
5. Klik "Save Settings" untuk menyimpan

### Troubleshooting

**Jika file tidak bisa di-upload:**
- Pastikan file format sesuai (PNG, JPG, JPEG, SVG untuk logo)
- Pastikan ukuran file tidak melebihi batas maksimum
- Cek internet connection saat upload

**Jika perubahan tidak tersimpan:**
- Lihat error message yang muncul
- Pastikan semua field yang wajib diisi sudah terisi
- Coba refresh halaman dan ulangi

**Jika gambar tidak tampil:**
- Clear browser cache atau tekan Ctrl+Shift+Delete
- Pastikan storage symlink sudah benar dengan command di atas

## Test Files (dapat dihapus)
- `test_settings.php` - Test symlink dan settings model
- `test_settings_logic.php` - Test form validation dan saving
- `check_settings_db.php` - Check database dan file storage

Untuk menghapus: `rm test_*.php check_settings_db.php`
