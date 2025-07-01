<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    // Yalnızca '/' olarak kalsın, prefix otomatik eklenecek
    #[Route('/', name: 'app_home')]
    // app_home_locale rotasını silin, çünkü app_home ile çakışabilir ve prefix genel olarak her yerde olduğu için gereksizdir.
        // #[Route('/{_locale}', name: 'app_home_locale', defaults: ['_locale' => '%kernel.default_locale%'], requirements: ['_locale' => 'en|tr'])]
    public function index(Request $request, string $_locale = null): Response
    {
        // Request objesinden mevcut locale'i alın
        $currentLocale = $request->getLocale();

        // Session'a locale'i kaydedin (zaten yaptığınız gibi, bu kısım iyi)
        if ($this->container->has('session') && $request->getSession()->get('_locale') !== $currentLocale) {
            $request->getSession()->set('_locale', $currentLocale);
        }

        $websiteStats = [
            'years_experience'  => 7,
            'happy_customers'   => 1200,
            'total_sales'       => 850,
            'average_rating'    => 4.9,
        ];

        // Ürün verilerini dile göre tanımlayın (BU KISIM HARİKA)
        $productsData = [
            'en' => [
                [
                    'id' => 1,
                    'name' => 'Gothic Angel Print T-Shirt',
                    'description' => '&quot;In Tenebris Lucet&quot; philosophy-powered Gothic Angel T-Shirt. A striking choice for lovers of dark aesthetics. Comfortable and stylish.',
                    'price' => 49.99,
                    'image' => 'assets/image/products/product4.jpg',
                    'rating' => 4.8,
                    'etsy_url' => 'https://www.etsy.com/listing/4318539197/gothic-t-shirt-oversized-tee-for-men?ref=related-4&logging_key=25a1c43680e3c6787e80fcff1588b67e1375674d%3A4318539197',
                    'currency' => 'TL',
                    'stock_status' => 'in_stock',
                ],
                [
                    'id' => 2,
                    'name' => 'Spirit of Dark Blooms - Oversized Gothic T-Shirt',
                    'description' => 'Meet our Oversize Flos in Tenebris Crescit T-Shirt, reflecting the depth and sophistication of Gothic aesthetics. The detailed skull and red rose print, rising on the nobility of black, adds a mysterious charm. This T-shirt, inspired by the message &quot;Blooms in Darkness,&quot; is a perfect choice for both men and women. Highlight your style in daily wear or special events.',
                    'price' => 35.00,
                    'image' => 'assets/image/products/product2.jpg',
                    'rating' => 4.5,
                    'etsy_url' => 'https://www.etsy.com/listing/4318162754/gothic-embroidered-cap-in-tenebris-lucet?ref=listings_manager_grid',
                    'currency' => 'TL',
                    'stock_status' => 'in_stock',
                ],
                [
                    'id' => 3,
                    'name' => 'Dark Aesthetic Cross Motif Baseball Hat',
                    'description' => 'Meet our &quot;In Tenebris Lucet&quot; Gothic Baseball Cap, which will add a mysterious touch to any outfit. Its black color and contrasting white embroidery details, combined with the cross motif, create a powerful stance. The adjustable strap ensures a perfect fit for any head size. It has a wide range of uses, from your casual street style to your special themed events. Shine even in the dark with this cap, ideal for both men and women.',
                    'price' => 89.00,
                    'image' => 'assets/image/products/product3.jpg',
                    'rating' => 4.9,
                    'etsy_url' => 'https://www.etsy.com/listing/4307373982/gothic-t-shirt-dark-tees-alternative?ref=related-5&logging_key=b8c542f741547a5341e043e0892b9d37d06f7b4e%3A4307373982',
                    'currency' => 'TL',
                    'stock_status' => 'out_of_stock',
                ],
            ],
            'tr' => [
                [
                    'id' => 1,
                    'name' => 'Gotik Melek Baskılı Tişört',
                    'description' => '&quot;In Tenebris Lucet&quot; felsefesiyle güçlenen Gotik Melek Tişörtü. Karanlık estetiği sevenler için çarpıcı bir seçim. Konforlu ve stil sahibi.',
                    'price' => 49.99,
                    'image' => 'assets/image/products/product4.jpg',
                    'rating' => 4.8,
                    'etsy_url' => 'https://www.etsy.com/listing/4318539197/gothic-t-shirt-oversized-tee-for-men?ref=related-4&logging_key=25a1c43680e3c6787e80fcff1588b67e1375674d%3A4318539197',
                    'currency' => 'TL',
                    'stock_status' => 'in_stock',
                ],
                [
                    'id' => 2,
                    'name' => 'Karanlık Çiçeklerin Ruhu - Oversize Gotik Tişört',
                    'description' => 'Gotik estetiğin derinliğini ve sofistikeliğini yansıtan Oversize Flos in Tenebris Crescit Tişörtümüzle tanışın. Siyahın asaleti üzerinde yükselen detaylı kurukafa ve kırmızı gül baskısı, gizemli bir çekicilik katıyor. &quot;Karanlıkta çiçek açar&quot; mesajıyla ilham veren bu tişört, hem erkekler hem de kadınlar için mükemmel bir seçimdir. Günlük kullanımda veya özel etkinliklerde tarzınızı öne çıkarın.',
                    'price' => 35.00,
                    'image' => 'assets/image/products/product2.jpg',
                    'rating' => 4.5,
                    'etsy_url' => 'https://www.etsy.com/listing/4318162754/gothic-embroidered-cap-in-tenebris-lucet?ref=listings_manager_grid',
                    'currency' => 'TL',
                    'stock_status' => 'in_stock',
                ],
                [
                    'id' => 3,
                    'name' => 'Karanlık Estetik Haç Motifli Beyzbol Şapkası',
                    'description' => 'Her kombininize gizemli bir hava katacak &quot;In Tenebris Lucet&quot; Gotik Baseball Şapkamızla tanışın. Siyah rengi ve kontrast oluşturan beyaz nakış detayları, haç motifiyle birleşerek güçlü bir duruş sergiler. Ayarlanabilir kayışı ile her baş ölçüsüne uyum sağlar. Gündelik sokak stilinizden, özel temalı etkinliklerinize kadar geniş bir kullanım alanına sahiptir. Hem erkekler hem de kadınlar için ideal olan bu şapka ile karanlıkta bile parlayın.',
                    'price' => 89.00,
                    'image' => 'assets/image/products/product3.jpg',
                    'rating' => 4.9,
                    'etsy_url' => 'https://www.etsy.com/listing/4307373982/gothic-t-shirt-dark-tees-alternative?ref=related-5&logging_key=b8c542f741547a5341e043e0892b9d37d06f7b4e%3A4307373982',
                    'currency' => 'TL',
                    'stock_status' => 'out_of_stock',
                ],
            ],
        ];

        // Müşteri yorumlarını dile göre tanımlayın (BU KISIM HARİKA)
        $reviewsData = [
            'en' => [
                [
                    'author' => 'Muhammed Çağrı Karaca',
                    'rating' => 5,
                    'comment' => 'The T-shirts are magnificent! Exactly the dark and elegant piece I wanted. Thanks for the fast shipping.',
                    'date' => '2025-06-20',
                    'verified' => true,
                ],
                [
                    'author' => 'Enes Altuğ Karaca ',
                    'rating' => 4,
                    'comment' => 'Very successful with skull figure details. A great addition to my collection. I will shop again.',
                    'date' => '2025-06-18',
                    'verified' => false,
                ],
                [
                    'author' => 'Emirhan Karaca',
                    'rating' => 5,
                    'comment' => 'The hat is incredibly high quality and fits my head perfectly. A true work of art! I love Gothizen.',
                    'date' => '2025-06-15',
                    'verified' => true,
                ],
                [
                    'author' => 'Meryem Ekinci',
                    'rating' => 5,
                    'comment' => 'It was a shopping experience far beyond my expectations. The products are truly unique and reflect your soul.',
                    'date' => '2025-06-10',
                    'verified' => true,
                ],
                [
                    'author' => 'Behzat Mamak',
                    'rating' => 5,
                    'comment' => 'The shirts are great, they go well with the song while exercising :)',
                    'date' => '2025-06-15',
                    'verified' => true,
                ],
                [
                    'author' => 'Kıvanç Havacı',
                    'rating' => 5,
                    'comment' => 'These products are incredibly high quality and beautiful Gothizen, you are great!',
                    'date' => '2025-06-15',
                    'verified' => true,
                ],
            ],
            'tr' => [
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
                    'comment' => 'Şapka inanılmaz kaliteli ve kafama tam oturdu. Tam bir sanat eseri! Gothizen\'e bayılıyorum.',
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
                    'comment' => 'Tişörtler harika spor yaparken şarkıyla çok uyumlu oluyor :)',
                    'date' => '2025-06-15',
                    'verified' => true,
                ],
                [
                    'author' => 'Kıvanç Havacı',
                    'rating' => 5,
                    'comment' => 'Bu ürünler inanılmaz kaliteli ve güzel Gothizen, süpersin!',
                    'date' => '2025-06-15',
                    'verified' => true,
                ],
            ],
        ];

        // Mevcut dile göre doğru ürün ve yorum dizisini seç
        $featuredProducts = $productsData[$currentLocale] ?? $productsData['en']; // Eğer lokal bulunamazsa varsayılan İngilizce
        $customerReviews = $reviewsData[$currentLocale] ?? $reviewsData['en']; // Eğer lokal bulunamazsa varsayılan İngilizce

        $successMessage = null;
        $errorMessage = null;

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'site_title' => 'Dark Arts Atelier - Gotik El Yapımı Sanat',
            'stats' => $websiteStats,
            'featured_products' => $featuredProducts, // Seçilen dilin ürünleri
            'reviews' => $customerReviews,           // Seçilen dilin yorumları
            'success_message' => $successMessage,
            'error_message' => $errorMessage,
        ]);
    }
}
