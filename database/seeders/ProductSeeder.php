<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // ─── CHAIRS ──────────────────────────────────────────────────────────────
            [
                'title'       => 'Scandinavian Oak Armchair',
                'category'    => 'chairs',
                'price'       => 2850000,
                'image'       => 'https://images.unsplash.com/photo-1758565204105-4085d36b8221?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8U2NhbmRpbmF2aWFuJTIwT2FrJTIwQXJtY2hhaXJ8ZW58MHx8MHx8fDA%3D',
                'description' => 'Desain Skandinavia minimalis dengan rangka kayu oak solid dan dudukan berbalut kain linen premium. Nyaman untuk ruang tamu maupun ruang kerja Anda.',
                'stock'       => 15,
                'is_featured' => true,
            ],
            [
                'title'       => 'Velvet Accent Chair',
                'category'    => 'chairs',
                'price'       => 3200000,
                'image'       => 'https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?w=600&q=80',
                'description' => 'Kursi aksen mewah dengan upholstery beludru warna emerald. Kaki berbahan kuningan brushed memberikan sentuhan glamor yang elegan.',
                'stock'       => 8,
                'is_featured' => true,
            ],
            [
                'title'       => 'Wicker Cane Rattan Chair',
                'category'    => 'chairs',
                'price'       => 1950000,
                'image'       => 'https://images.unsplash.com/photo-1540574163026-643ea20ade25?w=600&q=80',
                'description' => 'Kursi rotan alami yang dianyam tangan. Ringan, breathable, dan cocok untuk indoor maupun outdoor. Dilengkapi bantal duduk cotton.',
                'stock'       => 20,
                'is_featured' => false,
            ],
            [
                'title'       => 'Mid-Century Dining Chair',
                'category'    => 'chairs',
                'price'       => 1750000,
                'image'       => 'https://images.unsplash.com/photo-1581539250439-c96689b516dd?w=600&q=80',
                'description' => 'Kursi makan bergaya mid-century modern dengan kaki kayu walnut meruncing. Sandaran kurva ergonomis untuk kenyamanan maksimal saat makan.',
                'stock'       => 25,
                'is_featured' => false,
            ],
            [
                'title'       => 'Leather Executive Chair',
                'category'    => 'chairs',
                'price'       => 5500000,
                'image'       => 'https://images.unsplash.com/photo-1579656381229-15bdb188da49?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8TGVhdGhlciUyMENoYWlyfGVufDB8fDB8fHww',
                'description' => 'Kursi eksekutif premium berlapis kulit asli full-grain. Dilengkapi penyangga lumbar, sandaran tangan, dan roda putar 360°.',
                'stock'       => 5,
                'is_featured' => true,
            ],
            [
                'title'       => 'Boho Hanging Egg Chair',
                'category'    => 'chairs',
                'price'       => 4200000,
                'image'       => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
                'description' => 'Kursi gantung berbentuk telur dengan anyaman rotan sintetis yang kuat. Hadir dengan bingkai besi galvanis dan bantal interior yang empuk.',
                'stock'       => 7,
                'is_featured' => false,
            ],

            // ─── TABLES ──────────────────────────────────────────────────────────────
            [
                'title'       => 'Solid Teak Dining Table',
                'category'    => 'tables',
                'price'       => 8500000,
                'image'       => 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=600&q=80',
                'description' => 'Meja makan dari kayu jati solid berukuran 180x90x75 cm. Finishing minyak alami yang menonjolkan serat kayu yang indah. Kapasitas 6-8 orang.',
                'stock'       => 6,
                'is_featured' => true,
            ],
            [
                'title'       => 'Marble Top Coffee Table',
                'category'    => 'tables',
                'price'       => 6800000,
                'image'       => 'https://images.unsplash.com/photo-1533090161767-e6ffed986c88?w=600&q=80',
                'description' => 'Meja kopi mewah dengan permukaan marmer Carrara asli dan kaki kuningan matte. Dimensi 120x60x45 cm, cocok untuk ruang tamu premium.',
                'stock'       => 4,
                'is_featured' => true,
            ],
            [
                'title'       => 'Minimalist Study Desk',
                'category'    => 'tables',
                'price'       => 3200000,
                'image'       => 'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=600&q=80',
                'description' => 'Meja kerja minimalis berbahan MDF premium dengan lapisan walnut veneer. Dilengkapi laci tersembunyi dan cable management terpadu.',
                'stock'       => 12,
                'is_featured' => false,
            ],
            [
                'title'       => 'Industrial Iron & Wood Table',
                'category'    => 'tables',
                'price'       => 4500000,
                'image'       => 'https://images.unsplash.com/photo-1604074131665-7a4b13870ab3?w=600&q=80',
                'description' => 'Meja bergaya industrial dengan kombinasi besi hitam powder-coat dan papan kayu pinus reclaimed. Unik dan berkarakter kuat.',
                'stock'       => 9,
                'is_featured' => false,
            ],
            [
                'title'       => 'Japanese Low Floor Table',
                'category'    => 'tables',
                'price'       => 2100000,
                'image'       => 'https://images.unsplash.com/photo-1567016376408-0226e4d0c1ea?w=600&q=80',
                'description' => 'Meja rendah bergaya Jepang (chabudai) dari kayu bambu solid. Ideal untuk ruang keluarga dengan konsep duduk lesehan.',
                'stock'       => 14,
                'is_featured' => false,
            ],
            [
                'title'       => 'Glass & Chrome Side Table',
                'category'    => 'tables',
                'price'       => 1850000,
                'image'       => 'https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=600&q=80',
                'description' => 'Meja samping modern dengan permukaan kaca tempered 8mm dan rangka krom polish. Desain transparan yang tidak memakan visual ruang.',
                'stock'       => 18,
                'is_featured' => false,
            ],

            // ─── SOFAS ───────────────────────────────────────────────────────────────
            [
                'title'       => 'Italian Linen 3-Seater Sofa',
                'category'    => 'sofas',
                'price'       => 12500000,
                'image'       => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
                'description' => 'Sofa 3 dudukan premium berlapis linen Italia beige muda. Rangka kayu solid dan busa high-density untuk kenyamanan jangka panjang.',
                'stock'       => 3,
                'is_featured' => true,
            ],
            [
                'title'       => 'L-Shape Corner Sectional',
                'category'    => 'sofas',
                'price'       => 18900000,
                'image'       => 'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=600&q=80',
                'description' => 'Sofa sudut besar berkapasitas 5-6 orang dengan modul modular yang fleksibel. Upholstery microfiber anti-noda dengan kaki kayu natural.',
                'stock'       => 2,
                'is_featured' => true,
            ],
            [
                'title'       => 'Chesterfield Velvet Sofa',
                'category'    => 'sofas',
                'price'       => 15200000,
                'image'       => 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=600&q=80',
                'description' => 'Sofa Chesterfield klasik dengan quilting tufted khas dan upholstery beludru deep navy. Kaki kayu mahogani berukir menambah kesan mewah.',
                'stock'       => 3,
                'is_featured' => false,
            ],
            [
                'title'       => 'Modular Japandi Sofa',
                'category'    => 'sofas',
                'price'       => 9800000,
                'image'       => 'https://images.unsplash.com/photo-1550254478-ead40cc54513?w=600&q=80',
                'description' => 'Sofa modular bergaya Japandi (Japan + Scandinavia) dengan kain tenun lokal. Low-profile, simpel, dan harmonis dengan berbagai dekorasi ruangan.',
                'stock'       => 5,
                'is_featured' => false,
            ],
            [
                'title'       => 'Leather Recliner Loveseat',
                'category'    => 'sofas',
                'price'       => 11500000,
                'image'       => 'https://images.unsplash.com/photo-1567016432779-094069958ea5?w=600&q=80',
                'description' => 'Sofa 2 dudukan dengan mekanisme recliner manual pada kedua sisi. Kulit sintetis PU premium yang lembut dan mudah dibersihkan.',
                'stock'       => 4,
                'is_featured' => false,
            ],
            [
                'title'       => 'Boho Rattan Accent Sofa',
                'category'    => 'sofas',
                'price'       => 8200000,
                'image'       => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80',
                'description' => 'Sofa aksen boho dengan rangka rotan anyaman tangan dan bantal duduk kapas organik. Membawa nuansa alam yang hangat ke dalam rumah Anda.',
                'stock'       => 6,
                'is_featured' => false,
            ],
            
            // Produk Tempat Tidur //
            [
                'title'       => 'Modern Platform Bed',
                'category'    => 'beds',
                'price'       => 7500000,
                'image'       => 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YmVkc3xlbnwwfHwwfHx8MA%3D%3D',
                'description' => 'Tempat tidur platform modern dengan rangka kayu solid dan headboard berlapis kain. Desain minimalis yang cocok untuk berbagai gaya kamar tidur.',
                'stock'       => 10,
                'is_featured' => true,
            ],
            [
                'title'       => 'Upholstered Storage Bed',
                'category'    => 'beds',
                'price'       => 9500000,
                'image'       => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'description' => 'Tempat tidur dengan ruang penyimpanan tersembunyi di bawah kasur. Upholstery kain lembut dan rangka kayu kuat untuk kenyamanan dan fungsionalitas.',
                'stock'       => 8,
                'is_featured' => true,
            ],
        ];

        foreach ($products as $data) {
            Product::create(array_merge($data, [
                'slug' => \Illuminate\Support\Str::slug($data['title']),
            ]));
        }
    }
}
