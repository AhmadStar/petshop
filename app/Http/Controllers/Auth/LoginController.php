<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
class LoginController extends Controller
{
    /*
    | Giriş Denetleyicisi
    | Bu denetleyici, uygulama için kullanıcı kimlik doğrulamasını gerçekleştirir ve
    | onları ana ekrana yönlendirir.
    | İşlevselliğini uygulamanıza kolayca sağlamak için bir trait kullanır.
    */
    use AuthenticatesUsers;
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
    public function credentials(Request $request){
        return ['email'=>$request->email,'password'=>$request->password,'status'=>'active','role'=>'admin'];
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirect($provider)
    {
        
     return Socialite::driver($provider)->redirect();
    }
    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users      =   User::where(['email' => $userSocial->getEmail()])->first();
        
        if($users){
            Auth::login($users);
            return redirect('/')->with('success','Şuradan giriş yapıyorsunuz: '.$provider);
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
         return redirect()->route('home');
        }
    }
}
