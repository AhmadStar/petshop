<?php
namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
use Hash;
class MatchOldPassword implements Rule
{
    /**
     * 
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    /**
     * 
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value,auth()->user()->password);
    }
    /**
     * 
     *
     * @return string
     */
    public function message()
    {
        return 'Mevcut şifre eski şifreyle eşleşmelidir!';
    }
}
