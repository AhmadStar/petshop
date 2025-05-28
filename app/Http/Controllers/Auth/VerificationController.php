<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
class VerificationController extends Controller
{
    /*
    | E-posta Doğrulama Denetleyicisi
    | Bu denetleyici, uygulamaya yeni kayıt olan herhangi bir kullanıcının e-posta
    | doğrulamasını yönetmekle sorumludur.
    | Kullanıcı orijinal e-posta mesajını almadıysa, e-posta yeniden gönderilebilir.
    */
    use VerifiesEmails;
    /**
     * 
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
