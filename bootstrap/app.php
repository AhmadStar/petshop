<?php
/*
| Uygulamayı Oluştur
| İlk yapacağımız şey, Laravel’in tüm bileşenlerini birbirine bağlayan yeni bir Laravel
| uygulama örneği oluşturmaktır. Bu örnek, sistemdeki çeşitli parçaları birbirine bağlayan
| IoC (Kontrolün Tersine Çevrilmesi) konteyneridir.
*/
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);
/*
| Arayüzleri Bağla
| Sonrasında, bazı önemli arayüzleri konteynıra bağlamamız gerekiyor ki ihtiyaç
| duyduğumuzda onları çözümleyebilelim. Kernel'lar, bu uygulamaya gelen istekleri hem
| web üzerinden hem de komut satırından işler.
*/
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);
/*
| Uygulamayı Döndür
| Bu betik, uygulama örneğini döndürür. Bu örnek, çağıran betiğe verilir, böylece
| uygulama örneklerinin oluşturulması ile uygulamanın çalıştırılması ve yanıtların
| gönderilmesi işlemleri birbirinden ayrılmış olur.
*/
return $app;
