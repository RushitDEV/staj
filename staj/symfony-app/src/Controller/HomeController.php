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
                'name' => 'Gotik Kolye "Gece Gözyaşı"',
                'description' => 'El yapımı gümüş ve obsidyen detaylı mistik kolye.',
                'price' => 49.99,
                'image' => '/images/products/product1.jpg',
                'rating' => 4.8,
                'etsy_url' => 'https://www.etsy.com/listing/your-product-1-etsy-link',
                'currency' => 'TL',
                'stock_status' => 'in_stock',
            ],
            [
                'id' => 2,
                'name' => 'Karga Kafatası Dekorasyonu',
                'description' => 'Reçineden yapılmış detaylı karga kafatası figürü, ev dekorasyonu için.',
                'price' => 35.00,
                'image' => '/images/products/product2.jpg',
                'rating' => 4.5,
                'etsy_url' => 'https://www.etsy.com/listing/your-product-2-etsy-link',
                'currency' => 'TL',
                'stock_status' => 'in_stock',
            ],
            [
                'id' => 3,
                'name' => 'Kadife ve Dantel Korset',
                'description' => 'Gotik tarzda el yapımı kadife ve dantel korset.',
                'price' => 89.00,
                'image' => '/images/products/product3.jpg',
                'rating' => 4.9,
                'etsy_url' => 'https://www.etsy.com/listing/your-product-3-etsy-link',
                'currency' => 'TL',
                'stock_status' => 'out_of_stock',
            ],
        ];

        // Müşteri yorumları için örnek veriler
        $customerReviews = [
            [
                'author' => 'Luna Shadow',
                'rating' => 5,
                'comment' => 'Kolye muhteşem! Tam da istediğim karanlık ve zarif bir parça. Hızlı kargo için teşekkürler.',
                'date' => '2025-06-20',
                'verified' => true,
            ],
            [
                'author' => 'Victor Blackwood',
                'rating' => 4,
                'comment' => 'Kafatası figürü detaylarıyla çok başarılı. Koleksiyonuma harika bir ek oldu. Tekrar alışveriş yapacağım.',
                'date' => '2025-06-18',
                'verified' => false,
            ],
            [
                'author' => 'Elara Nightshade',
                'rating' => 5,
                'comment' => 'Korset inanılmaz kaliteli ve üzerime tam oturdu. Tam bir sanat eseri! Dark Arts Atelier\'e bayılıyorum.',
                'date' => '2025-06-15',
                'verified' => true,
            ],
            [
                'author' => 'Raven Darkholme',
                'rating' => 5,
                'comment' => 'Beklentilerimin çok üzerinde bir alışveriş oldu. Ürünler gerçekten eşsiz ve ruhunuzu yansıtıyor.',
                'date' => '2025-06-10',
                'verified' => true,
            ],
        ];

        // İletişim formu başarı mesajı için değişkeni tanımla
        $successMessage = null;
        // İletişim formu HATA mesajı için değişkeni tanımla
        $errorMessage = null; // <-- BU SATIRI EKLİYORUZ

        // home/index.html.twig şablonunu render ederken tüm bu verileri gönderiyoruz
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'site_title' => 'Dark Arts Atelier - Gotik El Yapımı Sanat',
            'stats' => $websiteStats,
            'featured_products' => $featuredProducts,
            'reviews' => $customerReviews,
            'success_message' => $successMessage,
            'error_message' => $errorMessage, // <-- BU SATIRI EKLİYORUZ
        ]);
    }
}
