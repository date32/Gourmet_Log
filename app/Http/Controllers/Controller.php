<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome()
    {
        $user = Auth::user();
        return view('welcome', ['user' => $user]);
    }
    public function logout()
    {
        Auth::logout();
        $user = Auth::user();
        return view('welcome', ['user' => $user]);
    }

    public function map()
    {
        $user = Auth::user();
        return view('gourmetLog.map', ['user' => $user]);
    }

    public function test()
    {


        return view('test');
    }

    public function up()
    {
        $str = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26782.63148185052!2d131.8876044318142!3d32.955525545555915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354689ca346e04eb%3A0x42ad4a49f811299!2z5L2Q5Lyv6aeF!5e0!3m2!1sja!2sjp!4v1685952530239!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
           

       
$length = strlen($str);


    $start = substr($str, 0, 13);
    $end = substr($str, -9);
    $middle = substr($str, 13, $length - 22);

        dd($middle);
        // $position = strpos($string, "http"); // 7
        // $substring = substr($string, $position);
        

        $msg = '結果みて';
        return view('test', ['msg' => $msg]);
    }
}
