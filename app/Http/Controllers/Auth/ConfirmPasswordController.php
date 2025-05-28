<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
class ConfirmPasswordController extends Controller
{
    /*
    | Şifreyi Doğrulama Denetleyicisi
    | Bu denetleyici, şifre doğrulama işlemlerini yönetmekle sorumludur ve bu işlevi basit bir trait aracılığıyla sağlar.
    | Bu trait'i inceleyebilir ve özelleştirme gereken işlevleri dilediğin gibi geçersiz kılabilirsin.
    */
    use ConfirmsPasswords;
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
    }
}
