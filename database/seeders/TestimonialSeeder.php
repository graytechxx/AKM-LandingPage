<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Andi Wijaya',
                'client_photo' => 'testimonials/client-1.jpg',
                'project_name' => 'Rumah Minimalis BSD',
                'content_id' => 'AKM Interior Design memberikan hasil yang luar biasa untuk rumah kami. Tim mereka sangat profesional dan memahami kebutuhan kami dengan sempurna. Hasil akhir melebihi ekspektasi kami!',
                'content_en' => 'AKM Interior Design delivered extraordinary results for our home. Their team is very professional and understands our needs perfectly. The final result exceeded our expectations!',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'client_name' => 'Diana Kusuma',
                'client_photo' => 'testimonials/client-2.jpg',
                'project_name' => 'Apartemen Kemang Village',
                'content_id' => 'Sangat puas dengan layanan AKM. Desain apartemen studio saya menjadi sangat fungsional dan aesthetic. Prosesnya smooth dari awal sampai akhir.',
                'content_en' => 'Very satisfied with AKM\'s service. My studio apartment design became very functional and aesthetic. The process was smooth from start to finish.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'client_name' => 'PT Nusantara Jaya',
                'client_photo' => 'testimonials/client-3.jpg',
                'project_name' => 'Kantor Pusat Jakarta',
                'content_id' => 'Kami mempercayakan desain kantor pusat kepada AKM dan hasilnya sangat memuaskan. Ruang kerja karyawan menjadi lebih nyaman dan produktif. Recommended!',
                'content_en' => 'We entrusted our head office design to AKM and the results are very satisfying. Our employees\' workspace became more comfortable and productive. Highly recommended!',
                'rating' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
