@extends('layouts.app')

<div class="dis">
    @include('components.header2')
    <div class=" wi9 mcenter">
        {{-- <div class="mt20">
            <div class="f1-5 mb20">新規登録 確認画面</div>
            <form class="" method="POST" action="/shop/edit/store/{{ $formData['id'] }}" enctype="multipart/form-data">
                @csrf

                <div>店名</div>
                <div>{{ $formData['name'] }}</div>

                <div>店名 フリガナ</div>
                <div>{{ $formData['name_katakana'] }}</div>

                <div>カテゴリー</div>
                <div>{{ $formData['category_name'] }}</div>

                <div>レビュー（最高：５/最低：１）</div>
                <div class="dis">
                    @for ($i = 1; $i <= $formData['review']; $i++)
                        <div>★</div>
                    @endfor
                    @for ($i = 1; $i <= 5 - $formData['review']; $i++)
                        <div>☆</div>
                    @endfor
                </div>

                <div>料理画像</div>
                @if (isset($formData['food_picture']))
                    <img src="{{ $formData['food_picture'] }}" alt="img">
                @endif

                <div>Google Map</div>
                @if (isset($formData['map_url']))
                    <div><iframe src="{{ $formData['map_url'] }}"></iframe></div>
                @endif

                <div>電話番号</div>
                <div>{{ $formData['tel'] }}</div>

                <div>コメント</div>
                <div>{{ $formData['comment'] }}</div>


                <button type="submit" name="submit" value="0">修正する</button>
                <button type="submit" name="submit" value="1">登録する</button>
            </form>

        </div> --}}

        <div class="mt20">
            <div class="f1-5 mb20">新規登録 確認画面</div>
            <form class="" method="POST" action="/shop/edit/store/{{ $formData['id'] }}" enctype="multipart/form-data">
                @csrf

                <div class="dis mb10">
                    <div class="mr10">店名:</div>
                    <div>{{ $formData['name'] }}</div>
                </div>

                <div class="dis mb10">
                    <div class="mr10">店名 フリガナ:</div>
                    <div>{{ $formData['name_katakana'] }}</div>
                </div>

                <div class="dis mb10">
                    <div class="mr10">カテゴリー:</div>
                    <div>{{ $formData['category_name'] }}</div>
                </div>

                <div class="mb10">
                    <div>レビュー（最高：５/最低：１）</div>
                    <div class="dis">
                        @for ($i = 1; $i <= $formData['review']; $i++)
                            <div>★</div>
                        @endfor
                        @for ($i = 1; $i <= 5 - $formData['review']; $i++)
                            <div>☆</div>
                        @endfor
                    </div>
                </div>

                <div class="dis mb10">
                    <div class="mr20">
                        <div>料理画像</div>
                        @if (isset($formData['food_picture']))
                            <div>
                                <img width="300" src="{{ $formData['food_picture'] }}" alt="img">
                            </div>
                        @endif
                    </div>
    
                    <div>
                        <div>Google Map</div>
                        @if (isset($formData['map_url']))
                            <div><iframe src="{{ $formData['map_url'] }}"></iframe></div>
                        @endif
                    </div>
                </div>

                <div>電話番号:</div>
                <div class="mb10">{{ $formData['tel'] }}</div>

                <div>コメント:</div>
                <div class="mb30">{{ $formData['comment'] }}</div>

                <button class="btn btn-outline-secondary mr20" name="submit" value="0">修正する</button>
                <button class="btn btn-outline-primary" name="submit" value="1">登録する</button>
            </form>

        </div>
    </div>
</div>
