@extends('layouts.app')

<div class="dis">
    @include('components.header2')
    <div class=" wi9 mcenter">
        <div class="mt20">
            <div class="f1-5 mb10">お店の詳細</div>
            <div class="dis ccenter2">
                <div class="mr20">{{ $restaurant->name }}</div>
                <div>({{ $restaurant->name_katakana }})</div>
            </div>


            <div class="dis mt20 mb20">
                <div>カテゴリー:</div>
                <div>{{ $cate_name }}</div>
            </div>


            <div>レビュー（最高：★★★★★/最低：★☆☆☆☆）</div>
            <div class="mb20">
                <div class="dis">
                    @for ($i = 1; $i <= $restaurant->review; $i++)
                        <div>★</div>
                    @endfor
                    @for ($i = 1; $i <= 5 - $restaurant->review; $i++)
                        <div>☆</div>
                    @endfor
                </div>
            </div>

            <div class="dis ccenter mb20">
                <div class="wi4">
                    <div>料理画像</div>
                    @if (isset($restaurant->food_picture))
                        <img class="wi4" src="{{ $restaurant->food_picture }}" alt="img">
                    @else
                        <a href="/shop/edit/{{ $restaurant->id }}">こちらから登録出来ます。</a>
                    @endif
                </div>
                <div class="wi4">
                    <div>Google Map</div>
                    @if (isset($map))
                        <iframe src="{{ $map }}"></iframe>
                    @else
                        <a href="/shop/edit/{{ $restaurant->id }}">こちらから登録出来ます。</a>
                    @endif
                </div>
            </div>

            <div class="mb20">
                <div>電話番号</div>
                @if (isset($restaurant->tel))
                    <div>{{ $restaurant->tel }}</div>
                @else
                    <a href="/shop/edit/{{ $restaurant->id }}">こちらから登録出来ます。</a>
                @endif
            </div>


           

            <div class="mb20">
                <div>コメント</div>
                @if (isset($restaurant->comment))
                    <div>{{ $restaurant->comment }}</div>
                @else
                    <a href="/shop/edit/{{ $restaurant->id }}">こちらから登録出来ます。</a>
                @endif
            </div>




            <div>
                <button onclick="location.href='/shop'" class="btn btn-secondary">お店リストに戻る</button>
            </div>




        </div>
    </div>
</div>
