<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
class ForgotPasswordController extends Controller
{
    /*
    | Şifre Sıfırlama Denetleyicisi
    | Bu denetleyici, şifre sıfırlama e-postalarını yönetmekle sorumludur ve 
    | uygulamanızdan kullanıcılarınıza bu bildirimleri göndermeye yardımcı olan bir trait içerir.
    | your application to your users. Feel free to explore this trait.
    */
    use SendsPasswordResetEmails;
}
