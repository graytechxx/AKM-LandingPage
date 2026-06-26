<?php

namespace Database\Seeders;

use App\Models\PricingPackage;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name_id' => 'Konsultasi',
                'name_en' => 'Consultation',
                'slug' => 'konsultasi',
                'price' => 2500000.00,
                'description_id' => 'Paket konsultasi desain untuk satu ruangan. Ideal untuk renovasi kecil atau update interior.',
                'description_en' => 'Design consultation package for one room. Ideal for small renovations or interior updates.',
                'features_id' => [
                    'Konsultasi 2 jam',
                    'Site visit',
                    'Rekomendasi warna dan material',
                    'Shopping list',
                    '1x revisi konsep',
                ],
                'features_en' => [
                    '2 hours consultation',
                    'Site visit',
                    'Color and material recommendations',
                    'Shopping list',
                    '1x concept revision',
                ],
                'is_popular' => false,
                'is_active' => true,
            ],
            [
                'name_id' => 'Basic',
                'name_en' => 'Basic',
                'slug' => 'basic',
                'price' => 15000000.00,
                'description_id' => 'Paket desain lengkap untuk satu ruangan dengan konsep menyeluruh.',
                'description_en' => 'Complete design package for one room with comprehensive concept.',
                'features_id' => [
                    'Konsultasi & survey',
                    'Desain konsep lengkap',
                    'Detail drawing',
                    'Material specification',
                    '3x revisi desain',
                    'Dukungan via WhatsApp',
                ],
                'features_en' => [
                    'Consultation & survey',
                    'Complete concept design',
                    'Detail drawing',
                    'Material specification',
                    '3x design revisions',
                    'WhatsApp support',
                ],
                'is_popular' => false,
                'is_active' => true,
            ],
            [
                'name_id' => 'Standard',
                'name_en' => 'Standard',
                'slug' => 'standard',
                'price' => 45000000.00,
                'description_id' => 'Paket desain untuk apartemen atau rumah kecil (2-3 ruangan). Include supervision.',
                'description_en' => 'Design package for apartment or small house (2-3 rooms). Include supervision.',
                'features_id' => [
                    'Semua fitur Basic',
                    'Desain 2-3 ruangan',
                    'Furniture layout plan',
                    'Lighting plan',
                    'Shopping assistance',
                    'Supervisi 4x site visit',
                ],
                'features_en' => [
                    'All Basic features',
                    '2-3 rooms design',
                    'Furniture layout plan',
                    'Lighting plan',
                    'Shopping assistance',
                    'Supervision 4x site visit',
                ],
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'name_id' => 'Premium',
                'name_en' => 'Premium',
                'slug' => 'premium',
                'price' => 100000000.00,
                'description_id' => 'Paket lengkap untuk rumah atau kantor dengan manajemen proyek penuh.',
                'description_en' => 'Complete package for house or office with full project management.',
                'features_id' => [
                    'Semua fitur Standard',
                    'Desain unlimited ruangan',
                    'Custom furniture design',
                    'Full project management',
                    'Vendor coordination',
                    'Quality control',
                    'Weekly progress report',
                    '1 tahun after-sales support',
                ],
                'features_en' => [
                    'All Standard features',
                    'Unlimited rooms design',
                    'Custom furniture design',
                    'Full project management',
                    'Vendor coordination',
                    'Quality control',
                    'Weekly progress report',
                    '1 year after-sales support',
                ],
                'is_popular' => false,
                'is_active' => true,
            ],
        ];

        foreach ($packages as $package) {
            PricingPackage::create($package);
        }
    }
}
