<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
class ResetPasswordController extends Controller
{
    /*
    | Şifre Sıfırlama Denetleyicisi
    | Bu denetleyici, şifre sıfırlama isteklerini yönetmekle sorumludur ve bu işlevi dahil etmek için basit bir trait kullanır.
    | Bu trait'i inceleyebilir ve dilediğiniz yöntemleri özelleştirebilirsiniz.
    */
    use ResetsPasswords;
    /**
     * 
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
