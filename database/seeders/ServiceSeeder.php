<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name_id' => 'Konsultasi Desain',
                'name_en' => 'Design Consultation',
                'slug' => 'konsultasi-desain',
                'short_description_id' => 'Konsultasi profesional untuk merencanakan desain interior ruangan Anda.',
                'short_description_en' => 'Professional consultation to plan your interior space design.',
                'description_id' => 'Layanan konsultasi desain interior yang komprehensif. Tim desainer kami akan membantu Anda merencanakan setiap aspek ruangan mulai dari konsep, pemilihan warna, material, hingga furniture. Konsultasi ini mencakup site visit, diskusi kebutuhan, dan presentasi konsep desain awal.',
                'description_en' => 'Comprehensive interior design consultation service. Our design team will help you plan every aspect of your space from concept, color selection, materials, to furniture. This consultation includes site visits, needs discussion, and initial design concept presentation.',
                'icon' => 'fa-comments',
                'features_id' => ['Site visit dan survey', 'Analisis kebutuhan ruangan', 'Konsep desain awal', 'Rekomendasi material', 'Estimasi budget'],
                'features_en' => ['Site visit and survey', 'Space needs analysis', 'Initial design concept', 'Material recommendations', 'Budget estimation'],
                'process_steps_id' => ['Konsultasi awal', 'Survey lokasi', 'Presentasi konsep', 'Revisi desain'],
                'process_steps_en' => ['Initial consultation', 'Site survey', 'Concept presentation', 'Design revision'],
                'starting_price' => 2500000.00,
                'is_active' => true,
            ],
            [
                'name_id' => 'Renovasi Interior',
                'name_en' => 'Interior Renovation',
                'slug' => 'renovasi-interior',
                'short_description_id' => 'Layanan renovasi lengkap dari pembongkaran hingga finishing.',
                'short_description_en' => 'Complete renovation service from demolition to finishing.',
                'description_id' => 'Layanan renovasi interior menyeluruh yang mencakup pembongkaran, rekonstruksi, instalasi, hingga finishing. Tim kami menangani semua aspek renovasi dengan standar kualitas tinggi dan ketepatan waktu. Termasuk pengurusan izin dan koordinasi dengan kontraktor.',
                'description_en' => 'Comprehensive interior renovation service covering demolition, reconstruction, installation, to finishing. Our team handles all aspects of renovation with high quality standards and on-time delivery. Including permit processing and coordination with contractors.',
                'icon' => 'fa-hammer',
                'features_id' => ['Pembongkaran dan pembuangan', 'Rekonstruksi struktur', 'Instalasi MEP', 'Finishing berkualitas', 'Garansi pekerjaan'],
                'features_en' => ['Demolition and disposal', 'Structural reconstruction', 'MEP installation', 'Quality finishing', 'Work warranty'],
                'process_steps_id' => ['Survey dan perencanaan', 'Pembongkaran', 'Konstruksi', 'Instalasi', 'Finishing'],
                'process_steps_en' => ['Survey and planning', 'Demolition', 'Construction', 'Installation', 'Finishing'],
                'starting_price' => 50000000.00,
                'is_active' => true,
            ],
            [
                'name_id' => 'Furniture Custom',
                'name_en' => 'Custom Furniture',
                'slug' => 'furniture-custom',
                'short_description_id' => 'Pembuatan furniture custom sesuai kebutuhan dan desain interior.',
                'short_description_en' => 'Custom furniture manufacturing according to needs and interior design.',
                'description_id' => 'Layanan pembuatan furniture custom yang dirancang khusus untuk ruangan Anda. Dari konsep hingga produksi, kami memastikan setiap piece furniture sesuai dengan desain interior dan kebutuhan fungsional Anda. Menggunakan material berkualitas dengan craftsmanship yang detail.',
                'description_en' => 'Custom furniture manufacturing service designed specifically for your space. From concept to production, we ensure each furniture piece matches the interior design and your functional needs. Using quality materials with detailed craftsmanship.',
                'icon' => 'fa-couch',
                'features_id' => ['Desain custom eksklusif', 'Material premium', 'Craftsmanship detail', 'Pengukuran site', 'Instalasi dan setting'],
                'features_en' => ['Exclusive custom design', 'Premium materials', 'Detailed craftsmanship', 'Site measurement', 'Installation and setting'],
                'process_steps_id' => ['Konsultasi desain', 'Pengukuran', 'Produksi', 'Finishing', 'Delivery dan instalasi'],
                'process_steps_en' => ['Design consultation', 'Measurement', 'Production', 'Finishing', 'Delivery and installation'],
                'starting_price' => 10000000.00,
                'is_active' => true,
            ],
            [
                'name_id' => 'Supervisi Proyek',
                'name_en' => 'Project Supervision',
                'slug' => 'supervisi-proyek',
                'short_description_id' => 'Pengawasan profesional untuk memastikan kualitas eksekusi desain.',
                'short_description_en' => 'Professional supervision to ensure quality design execution.',
                'description_id' => 'Layanan supervisi proyek yang memastikan pelaksanaan desain berjalan sesuai rencana. Tim supervisor kami akan memonitor setiap tahapan konstruksi, memeriksa kualitas pekerjaan, dan memastikan ketepatan waktu penyelesaian. Laporan progress rutin diberikan kepada klien.',
                'description_en' => 'Project supervision service ensuring design implementation runs according to plan. Our supervisor team will monitor every construction stage, check work quality, and ensure timely completion. Regular progress reports are provided to clients.',
                'icon' => 'fa-clipboard-check',
                'features_id' => ['Supervisor berpengalaman', 'Monitoring harian/mingguan', 'Quality control', 'Progress reporting', 'Koordinasi vendor'],
                'features_en' => ['Experienced supervisor', 'Daily/weekly monitoring', 'Quality control', 'Progress reporting', 'Vendor coordination'],
                'process_steps_id' => ['Kick-off meeting', 'Supervisi reguler', 'Quality inspection', 'Final inspection'],
                'process_steps_en' => ['Kick-off meeting', 'Regular supervision', 'Quality inspection', 'Final inspection'],
                'starting_price' => 15000000.00,
                'is_active' => true,
            ],
            [
                'name_id' => 'Manajemen Proyek',
                'name_en' => 'Project Management',
                'slug' => 'manajemen-proyek',
                'short_description_id' => 'Manajemen proyek end-to-end dari perencanaan hingga handover.',
                'short_description_en' => 'End-to-end project management from planning to handover.',
                'description_id' => 'Layanan manajemen proyek komprehensif yang menangani seluruh aspek proyek interior Anda. Dari perencanaan, budgeting, tendering, pelaksanaan, hingga handover. Kami menjadi single point of contact yang mengkoordinasikan semua pihak terkait untuk hasil yang optimal.',
                'description_en' => 'Comprehensive project management service handling all aspects of your interior project. From planning, budgeting, tendering, execution, to handover. We become a single point of contact coordinating all related parties for optimal results.',
                'icon' => 'fa-tasks',
                'features_id' => ['Project planning', 'Budget management', 'Vendor selection', 'Timeline management', 'Risk management'],
                'features_en' => ['Project planning', 'Budget management', 'Vendor selection', 'Timeline management', 'Risk management'],
                'process_steps_id' => ['Project initiation', 'Planning dan budgeting', 'Execution', 'Monitoring', 'Closing'],
                'process_steps_en' => ['Project initiation', 'Planning and budgeting', 'Execution', 'Monitoring', 'Closing'],
                'starting_price' => 25000000.00,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
