<?php
use Carbon\Carbon;
use GuzzleHttp\Client;
?>
@extends('layouts.app')
<div class="dis">
    <div>
        @include('components.header2')
    </div>


    <div class="ml20">
        @if (isset($user))
            {{-- 日付取得 --}}
            @php
                $date = date('Y年 m月 d日');
                $weekdays = [
                    '日', // 0: 日曜日
                    '月', // 1: 月曜日
                    '火', // 2: 火曜日
                    '水', // 3: 水曜日
                    '木', // 4: 木曜日
                    '金', // 5: 金曜日
                    '土', // 6: 土曜日
                ];
                
                $dayOfWeek = date('w');
                $weekday = $weekdays[$dayOfWeek];
            @endphp

            {{-- 天気取得 --}}
            {{-- @php
                
                $city = 'Tokyo';
                $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid=d49f6992e904b3ad121a49dab818c5e6";
                
                $client = new Client();
                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);
                
                $weather = $data['weather'][0]['icon'];
                $temp = $data['main']['temp'];
                $icon = "https://openweathermap.org/img/wn/"

            @endphp --}}

            {{-- 時間によって挨拶変更 --}}
            @php
                $now = Carbon::now();
                $hour = $now->hour;
                
                if ($hour >= 5 && $hour < 12) {
                    $greeting = 'おはようございます';
                } elseif ($hour >= 12 && $hour < 18) {
                    $greeting = 'こんにちは';
                } else {
                    $greeting = 'こんばんは';
                }
            @endphp

            

            <div class=" mt20">今日は{{ $date . '(' . $weekday . ')' }}です</div>
            {{-- <div>今日の東京の天気です</div>
            <img src="{{$icon. $weather}}@2x.png" alt=""> --}}
            <div class="wi9 mcenter">{{ $greeting . $user->name }}さん</div>
        @else
            <div class="wi9 mcenter mt10">ようこそ！</div>
        @endif
    </div>


</div>
