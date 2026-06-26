<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Form Field Labels (used by quote & contact forms)
    |--------------------------------------------------------------------------
    */
    'name' => 'Nama Lengkap',
    'email' => 'Alamat Email',
    'phone' => 'Nomor Telepon',
    'location' => 'Lokasi Proyek',
    'project_type' => 'Tipe Proyek',
    'area' => 'Luas Area',
    'budget_range' => 'Kisaran Anggaran',
    'timeline' => 'Timeline',
    'description' => 'Deskripsi Proyek',
    'attachments' => 'Lampiran',
    'select_option' => 'Pilih opsi',
    'upload_files' => 'Klik untuk mengunggah file',
    'file_types' => 'Format: JPG, PNG, PDF (Maks. 10MB)',

    /*
    |--------------------------------------------------------------------------
    | Form Labels
    |--------------------------------------------------------------------------
    */
    'labels' => [
        'name' => 'Nama Lengkap',
        'first_name' => 'Nama Depan',
        'last_name' => 'Nama Belakang',
        'email' => 'Alamat Email',
        'phone' => 'Nomor Telepon',
        'mobile' => 'Nomor HP',
        'whatsapp' => 'Nomor WhatsApp',
        'subject' => 'Subjek',
        'message' => 'Pesan',
        'inquiry_type' => 'Jenis Pertanyaan',
        
        'project_type' => 'Tipe Proyek',
        'project_name' => 'Nama Proyek',
        'project_description' => 'Deskripsi Proyek',
        'project_location' => 'Lokasi Proyek',
        'project_area' => 'Luas Area (m²)',
        'project_budget' => 'Estimasi Anggaran',
        'project_timeline' => 'Target Timeline',
        'project_style' => 'Gaya Desain yang Diinginkan',
        
        'address' => 'Alamat',
        'city' => 'Kota',
        'province' => 'Provinsi',
        'postal_code' => 'Kode Pos',
        'country' => 'Negara',
        
        'company_name' => 'Nama Perusahaan',
        'company_address' => 'Alamat Perusahaan',
        'job_title' => 'Jabatan',
        
        'preferred_contact' => 'Metode Kontak yang Diinginkan',
        'best_time_to_call' => 'Waktu Terbaik untuk Dihubungi',
        
        'service_type' => 'Jenis Layanan',
        'consultation_date' => 'Tanggal Konsultasi',
        'consultation_time' => 'Waktu Konsultasi',
        
        'attachment' => 'Lampiran',
        'file_upload' => 'Unggah File',
        'reference_images' => 'Gambar Referensi',
        'floor_plan' => 'Denah / Floor Plan',
        
        'password' => 'Kata Sandi',
        'password_confirmation' => 'Konfirmasi Kata Sandi',
        'current_password' => 'Kata Sandi Saat Ini',
        'new_password' => 'Kata Sandi Baru',
        
        'newsletter' => 'Berlangganan Newsletter',
        'terms' => 'Saya menyetujui syarat dan ketentuan',
        'privacy' => 'Saya menyetujui kebijakan privasi',
        
        'captcha' => 'Verifikasi Keamanan',
        'submit_button' => 'Kirim',
        'reset_button' => 'Reset',
        'cancel_button' => 'Batal',
        'save_button' => 'Simpan',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form Placeholders
    |--------------------------------------------------------------------------
    */
    'placeholders' => [
        'name' => 'Masukkan nama lengkap Anda',
        'full_name' => 'Masukkan nama lengkap Anda',
        'first_name' => 'Masukkan nama depan',
        'last_name' => 'Masukkan nama belakang',
        'email' => 'contoh@email.com',
        'phone' => '+62 8xx xxxx xxxx',
        'phone_optional' => '+62 8xx xxxx xxxx (opsional)',
        'subject' => 'Subjek pesan Anda',
        'message' => 'Tuliskan pesan atau pertanyaan Anda di sini...',
        
        'project_name' => 'Contoh: Renovasi Rumah Jati',
        'project_description' => 'Ceritakan tentang proyek Anda, kebutuhan khusus, dan preferensi desain...',
        'project_location' => 'Alamat lengkap proyek',
        'project_area' => 'Contoh: 150',
        'location' => 'Alamat atau lokasi proyek',
        'area' => 'Luas area dalam m²',
        'tell_us' => 'Ceritakan kebutuhan proyek atau pertanyaan Anda...',
        
        'address' => 'Alamat lengkap',
        'city' => 'Nama kota',
        'postal_code' => 'Kode pos',
        
        'company_name' => 'Nama perusahaan Anda',
        'job_title' => 'Jabatan Anda',
        
        'search' => 'Cari...',
        'select_option' => 'Pilih opsi',
        'select_date' => 'Pilih tanggal',
        'select_time' => 'Pilih waktu',
        
        'attachment' => 'Klik atau seret file ke sini',
        'file_types' => 'Format yang diterima: JPG, PNG, PDF (Max 10MB)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Dropdown Options
    |--------------------------------------------------------------------------
    */
    'options' => [
        'project_types' => [
            'residential' => 'Rumah Tinggal',
            'apartment' => 'Apartemen',
            'office' => 'Kantor',
            'restaurant' => 'Restoran / Kafe',
            'hotel' => 'Hotel / Villa',
            'retail' => 'Toko / Retail',
            'showroom' => 'Showroom',
            'other' => 'Lainnya',
        ],
        
        'inquiry_types' => [
            'general' => 'Pertanyaan Umum',
            'quote' => 'Minta Penawaran',
            'consultation' => 'Jadwalkan Konsultasi',
            'collaboration' => 'Kerja Sama',
            'career' => 'Karir',
            'feedback' => 'Masukan',
            'other' => 'Lainnya',
        ],
        
        'service_types' => [
            'full_design' => 'Desain Lengkap',
            'consultation_only' => 'Konsultasi Saja',
            'renovation' => 'Renovasi',
            'makeover' => 'Makeover',
            'custom' => 'Kustom',
        ],
        
        'budget_ranges' => [
            'under_50m' => 'Di bawah Rp 50 juta',
            '50m_100m' => 'Rp 50 juta - Rp 100 juta',
            '100m_250m' => 'Rp 100 juta - Rp 250 juta',
            '250m_500m' => 'Rp 250 juta - Rp 500 juta',
            '500m_1b' => 'Rp 500 juta - Rp 1 miliar',
            'above_1b' => 'Di atas Rp 1 miliar',
            'discuss' => 'Akan didiskusikan',
        ],
        
        'timeline_options' => [
            'urgent' => 'Segera (1-2 minggu)',
            'short' => 'Dalam waktu dekat (1 bulan)',
            'medium' => '1-3 bulan',
            'flexible' => 'Fleksibel',
            'discuss' => 'Akan didiskusikan',
        ],
        
        'design_styles' => [
            'modern' => 'Modern',
            'minimalist' => 'Minimalis',
            'classic' => 'Klasik',
            'scandinavian' => 'Skandinavia',
            'industrial' => 'Industrial',
            'contemporary' => 'Kontemporer',
            'traditional' => 'Tradisional',
            'bohemian' => 'Bohemian',
            'luxury' => 'Mewah',
            'mixed' => 'Campuran',
            'not_sure' => 'Belum yakin',
        ],
        
        'contact_methods' => [
            'email' => 'Email',
            'phone' => 'Telepon',
            'whatsapp' => 'WhatsApp',
        ],
        
        'best_times' => [
            'morning' => 'Pagi (08.00 - 12.00)',
            'afternoon' => 'Siang (12.00 - 15.00)',
            'evening' => 'Sore (15.00 - 18.00)',
            'anytime' => 'Kapan saja',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Messages
    |--------------------------------------------------------------------------
    */
    'validation' => [
        'required' => ':attribute wajib diisi',
        'email' => 'Format :attribute tidak valid',
        'phone' => 'Format :attribute tidak valid',
        'min' => ':attribute minimal :min karakter',
        'max' => ':attribute maksimal :max karakter',
        'numeric' => ':attribute harus berupa angka',
        'integer' => ':attribute harus berupa bilangan bulat',
        'date' => ':attribute harus berupa tanggal yang valid',
        'url' => ':attribute harus berupa URL yang valid',
        'file' => ':attribute harus berupa file',
        'mimes' => ':attribute harus berupa file dengan format: :values',
        'size' => 'Ukuran :attribute maksimal :size KB',
        'confirmed' => 'Konfirmasi :attribute tidak cocok',
        'unique' => ':attribute sudah terdaftar',
        'accepted' => 'Anda harus menyetujui :attribute',
        
        'custom' => [
            'name' => [
                'required' => 'Nama lengkap wajib diisi',
                'min' => 'Nama minimal 3 karakter',
                'max' => 'Nama maksimal 100 karakter',
            ],
            'email' => [
                'required' => 'Alamat email wajib diisi',
                'email' => 'Format email tidak valid',
                'unique' => 'Email ini sudah terdaftar',
            ],
            'phone' => [
                'required' => 'Nomor telepon wajib diisi',
                'regex' => 'Format nomor telepon tidak valid',
            ],
            'message' => [
                'required' => 'Pesan wajib diisi',
                'min' => 'Pesan minimal 10 karakter',
                'max' => 'Pesan maksimal 1000 karakter',
            ],
            'project_type' => [
                'required' => 'Silakan pilih tipe proyek',
            ],
            'project_description' => [
                'required' => 'Deskripsi proyek wajib diisi',
                'min' => 'Deskripsi minimal 20 karakter',
            ],
            'terms' => [
                'accepted' => 'Anda harus menyetujui syarat dan ketentuan',
            ],
            'privacy' => [
                'accepted' => 'Anda harus menyetujui kebijakan privasi',
            ],
            'captcha' => [
                'required' => 'Verifikasi keamanan wajib diisi',
                'captcha' => 'Verifikasi keamanan tidak valid',
            ],
        ],
        
        'attributes' => [
            'name' => 'Nama Lengkap',
            'email' => 'Email',
            'phone' => 'Nomor Telepon',
            'message' => 'Pesan',
            'subject' => 'Subjek',
            'project_type' => 'Tipe Proyek',
            'project_description' => 'Deskripsi Proyek',
            'project_location' => 'Lokasi Proyek',
            'project_area' => 'Luas Area',
            'project_budget' => 'Estimasi Anggaran',
            'service_type' => 'Jenis Layanan',
            'consultation_date' => 'Tanggal Konsultasi',
            'address' => 'Alamat',
            'city' => 'Kota',
            'postal_code' => 'Kode Pos',
            'password' => 'Kata Sandi',
            'password_confirmation' => 'Konfirmasi Kata Sandi',
            'attachment' => 'Lampiran',
            'terms' => 'Syarat dan Ketentuan',
            'privacy' => 'Kebijakan Privasi',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Success Messages
    |--------------------------------------------------------------------------
    */
    'success' => [
        'contact_sent' => 'Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.',
        'quote_requested' => 'Permintaan penawaran berhasil dikirim! Kami akan memproses dalam 1-2 hari kerja.',
        'consultation_booked' => 'Konsultasi berhasil dijadwalkan! Konfirmasi telah dikirim ke email Anda.',
        'subscribed' => 'Anda berhasil berlangganan newsletter kami!',
        'profile_updated' => 'Profil berhasil diperbarui!',
        'password_changed' => 'Kata sandi berhasil diubah!',
        'file_uploaded' => 'File berhasil diunggah!',
        'inquiry_sent' => 'Pertanyaan Anda berhasil dikirim!',
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Messages
    |--------------------------------------------------------------------------
    */
    'error' => [
        'general' => 'Terjadi kesalahan. Silakan coba lagi.',
        'send_failed' => 'Gagal mengirim pesan. Silakan coba lagi nanti.',
        'file_upload_failed' => 'Gagal mengunggah file. Pastikan format dan ukuran sesuai.',
        'invalid_file_type' => 'Tipe file tidak didukung.',
        'file_too_large' => 'Ukuran file terlalu besar. Maksimal 10MB.',
        'already_subscribed' => 'Email ini sudah berlangganan newsletter.',
        'booking_conflict' => 'Jadwal yang dipilih tidak tersedia. Silakan pilih waktu lain.',
        'captcha_failed' => 'Verifikasi keamanan gagal. Silakan coba lagi.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Helper Text
    |--------------------------------------------------------------------------
    */
    'helper' => [
        'phone_format' => 'Format: +62 atau 08xx',
        'email_privacy' => 'Email Anda akan dijaga kerahasiaannya',
        'file_requirements' => 'Maks. 10MB. Format: JPG, PNG, PDF',
        'required_fields' => 'Kolom bertanda * wajib diisi',
        'budget_hint' => 'Anggaran membantu kami memberikan rekomendasi yang tepat',
        'timeline_hint' => 'Timeline membantu kami mengatur prioritas proyek',
        'description_hint' => 'Jelaskan kebutuhan, preferensi gaya, dan hal khusus lainnya',
    ],

    'help' => [
        'description' => 'Jelaskan kebutuhan, preferensi gaya, dan hal khusus yang Anda inginkan.',
        'attachments' => 'Anda dapat mengunggah gambar referensi, denah, atau dokumen (opsional).',
    ],

];
