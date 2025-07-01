<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Web sitesi istatistikleri için veriler
        $websiteStats = [
            'years_experience'  => 7,
            'happy_customers'   => 1200,
            'total_sales'       => 850,
            'average_rating'    => 4.9,
        ];

        // Öne çıkan ürünler için örnek veriler
        $featuredProducts = [
            [
                'id' => 1,
                'name' => 'Gothic Angel Print T-Shirt"',
                'description' => '"In Tenebris Lucet" felsefesiyle güçlenen Gotik Melek Tişörtü. Karanlık estetiği sevenler için çarpıcı bir seçim. Konforlu ve stil sahibi..',
                'price' => 49.99,
                // BURAYI DÜZELTTİK: public/assets/image/products/product1.jpg oldu
                'image' => 'assets/image/products/product4.jpg',
                'rating' => 4.8,
                'etsy_url' => 'https://www.etsy.com/listing/4318539197/gothic-t-shirt-oversized-tee-for-men?ref=related-4&logging_key=25a1c43680e3c6787e80fcff1588b67e1375674d%3A4318539197',
                'currency' => 'TL',
                'stock_status' => 'in_stock',
            ],
            [
                'id' => 2,
                'name' => 'Spirit of Dark Blooms - Oversized Gothic T-Shirt',
                'description' => 'Gotik estetiğin derinliğini ve sofistikeliğini yansıtan Oversize Flos in Tenebris Crescit Tişörtümüzle tanışın. Siyahın asaleti üzerinde yükselen detaylı kurukafa ve kırmızı gül baskısı, gizemli bir çekicilik katıyor. "Karanlıkta çiçek açar" mesajıyla ilham veren bu tişört, hem erkekler hem de kadınlar için mükemmel bir seçimdir. Günlük kullanımda veya özel etkinliklerde tarzınızı öne çıkarın.

',
                'price' => 35.00,
                // BURAYI DÜZELTTİK: public/assets/image/products/product2.jpg oldu
                'image' => 'assets/image/products/product2.jpg',
                'rating' => 4.5,
                'etsy_url' => 'https://www.etsy.com/listing/4318162754/gothic-embroidered-cap-in-tenebris-lucet?ref=listings_manager_grid',
                'currency' => 'TL',
                'stock_status' => 'in_stock',
            ],
            [
                'id' => 3,
                'name' => 'Dark Aesthetic Cross Motif Baseball Hat',
                'description' => 'Her kombininize gizemli bir hava katacak "In Tenebris Lucet" Gotik Baseball Şapkamızla tanışın. Siyah rengi ve kontrast oluşturan beyaz nakış detayları, haç motifiyle birleşerek güçlü bir duruş sergiler. Ayarlanabilir kayışı ile her baş ölçüsüne uyum sağlar. Gündelik sokak stilinizden, özel temalı etkinliklerinize kadar geniş bir kullanım alanına sahiptir. Hem erkekler hem de kadınlar için ideal olan bu şapka ile karanlıkta bile parlayın',
                'price' => 89.00,
                // BURAYI DÜZELTTİK: public/assets/image/products/product3.jpg oldu (çift .jpg hatası düzeltildi)
                'image' => 'assets/image/products/product3.jpg',
                'rating' => 4.9,
                'etsy_url' => 'https://www.etsy.com/listing/4307373982/gothic-t-shirt-dark-tees-alternative?ref=related-5&logging_key=b8c542f741547a5341e043e0892b9d37d06f7b4e%3A4307373982',
                'currency' => 'TL',
                'stock_status' => 'out_of_stock',
            ],
        ];

        // Müşteri yorumları için örnek veriler
        $customerReviews = [
            [
                'author' => 'Muhammed Çağrı Karaca',
                'rating' => 5,
                'comment' => 'T-Shirtler muhteşem! Tam da istediğim karanlık ve zarif bir parça. Hızlı kargo için teşekkürler.',
                'date' => '2025-06-20',
                'verified' => true,
            ],
            [
                'author' => 'Enes Altuğ Karaca ',
                'rating' => 4,
                'comment' => 'Kafatası figürü detaylarıyla çok başarılı. Koleksiyonuma harika bir ek oldu. Tekrar alışveriş yapacağım.',
                'date' => '2025-06-18',
                'verified' => false,
            ],
            [
                'author' => 'Emirhan Karaca',
                'rating' => 5,
                'comment' => 'Şapka inanılmaz kaliteli ve kafama tam oturdu. Tam bir sanat eseri! Gothizen \'e bayılıyorum.',
                'date' => '2025-06-15',
                'verified' => true,
            ],
            [
                'author' => 'Meryem Ekinci',
                'rating' => 5,
                'comment' => 'Beklentilerimin çok üzerinde bir alışveriş oldu. Ürünler gerçekten eşsiz ve ruhunuzu yansıtıyor.',
                'date' => '2025-06-10',
                'verified' => true,
            ],

            [
                'author' => 'Behzat Mamak',
                'rating' => 5,
                'comment' => 'Thirtler harika spor yaparken şarkıyla çok uyumlu oluyor :)',
                'date' => '2025-06-15',
                'verified' => true,
            ],

            [
                'author' => 'Kıvanç Havacı',
                'rating' => 5,
                'comment' => 'Bu ürünler inanilmaz kaliteli ve güzel Gothizen süpersin',
                'date' => '2025-06-15',
                'verified' => true,
            ],
        ];

        // İletişim formu başarı mesajı için değişkeni tanımla
        $successMessage = null;
        // İletişim formu HATA mesajı için değişkeni tanımla
        $errorMessage = null;

        // home/index.html.twig şablonunu render ederken tüm bu verileri gönderiyoruz
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'site_title' => 'Dark Arts Atelier - Gotik El Yapımı Sanat',
            'stats' => $websiteStats,
            'featured_products' => $featuredProducts,
            'reviews' => $customerReviews,
            'success_message' => $successMessage,
            'error_message' => $errorMessage,
        ]);
    }
}
