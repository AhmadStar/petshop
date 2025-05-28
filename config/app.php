<?php
return [
    /*
    | Uygulama Adı
    | Bu değer, uygulamanızın adıdır. Framework, uygulamanın adını bir bildirimde veya
    | uygulama ya da paketleri tarafından gereken başka bir yerde kullanması gerektiğinde
    | bu değeri kullanır.
    */
    'name' => env('APP_NAME', 'Laravel'),
    /*
    | Uygulama Ortamı
    | Bu değer, uygulamanızın şu anda hangi "ortamda" çalıştığını belirler. Bu, uygulamanın
    | kullandığı çeşitli servisleri nasıl yapılandırmak istediğinizi etkileyebilir. Bu değeri ".env"
    | dosyanızda ayarlayın.
    */
    'env' => env('APP_ENV', 'production'),
    /*
    | Uygulama Hata Ayıklama Modu
    | Uygulamanız hata ayıklama modundayken, meydana gelen her hatada ayrıntılı hata
    | mesajları ve stack trace (yığın izi) gösterilir. Bu mod devre dışı bırakıldığında, yalnızca
    | basit ve genel bir hata sayfası görüntülenir.
    */
    'debug' => (bool) env('APP_DEBUG', false),
    /*
    | Uygulama URL'si
    | Bu URL, Artisan komut satırı aracı kullanılırken URL'lerin doğru şekilde oluşturulabilmesi
    | için konsol tarafından kullanılır. Uygulamanızın kök (root) adresi olacak şekilde
    | ayarlanmalıdır, böylece Artisan görevleri çalıştırılırken bu URL esas alınır.
    */
    'url' => env('APP_URL', 'http://localhost'),
    'asset_url' => env('ASSET_URL', null),
    /*
    | Uygulama Zaman Dilimi
    | Burada, uygulamanız için varsayılan zaman dilimini belirleyebilirsiniz. Bu zaman dilimi,
    | PHP'nin tarih ve saat fonksiyonları tarafından kullanılacaktır. Biz sizin için kutudan çıktığı
    | haliyle makul bir varsayılan değer belirledik.
    */
    'timezone' => 'UTC',
    /*
    | Uygulama Yerel Ayar (Locale) Yapılandırması
    | Uygulama yerel ayarı, çeviri servis sağlayıcısı tarafından kullanılacak varsayılan dili
    | belirler. Bu değeri, uygulamanızın destekleyeceği dillerden herhangi biriyle özgürce
    | değiştirebilirsiniz.
    */
    'locale' => 'en',
    /*
    | Uygulama Yedek (Fallback) Locale Ayarı
    | Yedek locale, mevcut dil seçeneği bulunamadığında kullanılacak olan dil ayarını belirler.
    | Bu değeri, uygulamanızda bulunan dil klasörlerinden herhangi birine göre değiştirebilirsiniz.
    */
    'fallback_locale' => 'en',
    /*
    | Faker Locale
    | Bu yerel ayar, veritabanı seed işlemlerinde sahte veri üretmek için kullanılan Faker PHP
    | kütüphanesi tarafından kullanılır. Örneğin, yerel telefon numaraları, sokak adresleri gibi
    | yerelleştirilmiş veriler bu ayara göre oluşturulur.
    */
    'faker_locale' => 'en_US',
    /*
    | Şifreleme Anahtarı
    | Bu anahtar, Laravel'in Illuminate şifreleme servisi tarafından kullanılır ve rastgele, 32
    | karakter uzunluğunda bir dize olmalıdır. Aksi takdirde şifrelenmiş veriler güvenli olmaz.
    | Uygulamayı yayına almadan önce mutlaka bu anahtarı ayarlayın!
    */
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    /*
    | Otomatik Yüklenen Servis Sağlayıcılar (Service Providers)
    | Burada listelenen servis sağlayıcılar, uygulamanıza gelen her istekte otomatik olarak
    | yüklenecektir. Uygulamanıza ek işlevsellik kazandırmak için kendi servis sağlayıcılarınızı
    | bu diziye eklemekte özgürsünüz.
    */
    'providers' => [
        /*
         * Laravel Framework Servis Sağlayıcıları...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        // unisharp
        UniSharp\LaravelFilemanager\LaravelFilemanagerServiceProvider::class,
       
        Intervention\Image\ImageServiceProvider::class,
        Barryvdh\DomPDF\ServiceProvider::class,
        Srmklive\PayPal\Providers\PayPalServiceProvider::class,
        Laravel\Socialite\SocialiteServiceProvider::class,

        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    | Sınıf Takma Adları
    | Bu sınıf takma adları dizisi, uygulama başlatıldığında kaydedilecektir. Ancak, istediğiniz
    | kadar alias (takma ad) eklemekte özgürsünüz çünkü bu alias'lar "tembel" (lazy) yüklenir,
    | yani performansı olumsuz etkilemezler.
    */
    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
        // unisharp
        'Image' => Intervention\Image\Facades\Image::class,
        'PDF' => Barryvdh\DomPDF\Facade::class,
        'PayPal' => Srmklive\PayPal\Facades\PayPal::class,
        'Socialite' => Laravel\Socialite\Facades\Socialite::class,
    ],
];
