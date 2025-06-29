<?php

// Hata raporlamayı aç (yalnızca geliştirme aşamasında tarayıcıda görmek için)
// Bu satırları sadece geçici hata ayıklama için kullanın ve sonra kaldırın
ini_set('display_errors', 1);          // BU SATIRI AKTİF ET
ini_set('display_startup_errors', 1);  // BU SATIRI AKTİF ET
error_reporting(E_ALL);                // BU SATIRI AKTİF ET

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
