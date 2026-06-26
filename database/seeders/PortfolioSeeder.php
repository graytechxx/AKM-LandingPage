<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'title_id' => 'Ruang Tamu Modern Minimalis',
                'title_en' => 'Modern Minimalist Living Room',
                'slug' => 'ruang-tamu-modern-minimalis',
                'description_id' => 'Desain ruang tamu dengan konsep modern minimalis yang menghadirkan kesan elegan dan luas. Menggunakan warna netral dengan aksen kayu untuk menciptakan suasana hangat.',
                'description_en' => 'Living room design with modern minimalist concept that creates an elegant and spacious feel. Using neutral colors with wood accents to create a warm atmosphere.',
                'category' => 'living_room',
                'client' => 'Budi Santoso',
                'location' => 'Jakarta Selatan',
                'area_sqm' => 45.00,
                'duration' => '3 minggu',
                'budget_range' => 'Rp 50 - 80 Juta',
                'featured_image' => 'portfolios/living-room-1.jpg',
                'gallery_images' => ['portfolios/living-room-1-1.jpg', 'portfolios/living-room-1-2.jpg'],
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title_id' => 'Kamar Tidur Master Suite',
                'title_en' => 'Master Suite Bedroom',
                'slug' => 'kamar-tidur-master-suite',
                'description_id' => 'Kamar tidur utama dengan desain mewah yang dilengkapi walk-in closet dan kamar mandi dalam. Nuansa warna biru tua memberikan kesan elegan dan tenang.',
                'description_en' => 'Master bedroom with luxurious design featuring walk-in closet and en-suite bathroom. Deep blue tones provide an elegant and calm impression.',
                'category' => 'bedroom',
                'client' => 'Sarah Wijaya',
                'location' => 'BSD City, Tangerang',
                'area_sqm' => 35.00,
                'duration' => '4 minggu',
                'budget_range' => 'Rp 40 - 60 Juta',
                'featured_image' => 'portfolios/bedroom-1.jpg',
                'gallery_images' => ['portfolios/bedroom-1-1.jpg', 'portfolios/bedroom-1-2.jpg'],
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title_id' => 'Dapur Kontemporer',
                'title_en' => 'Contemporary Kitchen',
                'slug' => 'dapur-kontemporer',
                'description_id' => 'Dapur modern dengan desain kontemporer yang menggabungkan fungsionalitas dan estetika. Kitchen island sebagai pusat aktivitas memasak.',
                'description_en' => 'Modern kitchen with contemporary design that combines functionality and aesthetics. Kitchen island as the center of cooking activities.',
                'category' => 'kitchen',
                'client' => 'PT Maju Jaya',
                'location' => 'Jakarta Pusat',
                'area_sqm' => 25.00,
                'duration' => '5 minggu',
                'budget_range' => 'Rp 60 - 90 Juta',
                'featured_image' => 'portfolios/kitchen-1.jpg',
                'gallery_images' => ['portfolios/kitchen-1-1.jpg'],
                'is_featured' => false,
                'status' => 'published',
            ],
            [
                'title_id' => 'Kantor Eksekutif',
                'title_en' => 'Executive Office',
                'slug' => 'kantor-eksekutif',
                'description_id' => 'Ruang kantor eksekutif dengan desain profesional yang mencerminkan identitas perusahaan. Dilengkapi dengan area meeting dan lounge.',
                'description_en' => 'Executive office space with professional design that reflects company identity. Equipped with meeting area and lounge.',
                'category' => 'office',
                'client' => 'ABC Corporation',
                'location' => 'SCBD, Jakarta',
                'area_sqm' => 120.00,
                'duration' => '8 minggu',
                'budget_range' => 'Rp 150 - 200 Juta',
                'featured_image' => 'portfolios/office-1.jpg',
                'gallery_images' => ['portfolios/office-1-1.jpg', 'portfolios/office-1-2.jpg', 'portfolios/office-1-3.jpg'],
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title_id' => 'Restoran Fine Dining',
                'title_en' => 'Fine Dining Restaurant',
                'slug' => 'restoran-fine-dining',
                'description_id' => 'Desain interior restoran fine dining dengan konsep klasik modern. Pencahayaan yang dramatis menciptakan atmosfer eksklusif.',
                'description_en' => 'Fine dining restaurant interior design with classic modern concept. Dramatic lighting creates an exclusive atmosphere.',
                'category' => 'commercial',
                'client' => 'La Grande Restaurant',
                'location' => 'Kemang, Jakarta',
                'area_sqm' => 200.00,
                'duration' => '12 minggu',
                'budget_range' => 'Rp 300 - 400 Juta',
                'featured_image' => 'portfolios/commercial-1.jpg',
                'gallery_images' => ['portfolios/commercial-1-1.jpg', 'portfolios/commercial-1-2.jpg'],
                'is_featured' => false,
                'status' => 'published',
            ],
            [
                'title_id' => 'Apartemen Studio',
                'title_en' => 'Studio Apartment',
                'slug' => 'apartemen-studio',
                'description_id' => 'Desain interior apartemen studio yang mengoptimalkan ruang terbatas. Smart storage solutions dan multi-functional furniture.',
                'description_en' => 'Studio apartment interior design that optimizes limited space. Smart storage solutions and multi-functional furniture.',
                'category' => 'living_room',
                'client' => 'Andi Kurniawan',
                'location' => 'Thamrin, Jakarta',
                'area_sqm' => 32.00,
                'duration' => '2 minggu',
                'budget_range' => 'Rp 25 - 35 Juta',
                'featured_image' => 'portfolios/apartment-1.jpg',
                'gallery_images' => ['portfolios/apartment-1-1.jpg'],
                'is_featured' => false,
                'status' => 'draft',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
