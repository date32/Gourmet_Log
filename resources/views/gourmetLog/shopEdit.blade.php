<?php
use App\Models\Category;
?>

@extends('layouts.app')

<div class="dis">
    @include('components.header2')
    <div class=" wi9 mcenter">
        <div class="mt10 tcenter">
            <div class="f1-5 mb10">お店新規登録/編集</div>
            <form class="" method="POST" action="/shop/edit/result/{{ $formData['id'] }}"
                enctype="multipart/form-data">
                @csrf

                @if (isset($formData))
                    <div class="dis ccenter2">
                        <div>【店名*】</div>
                        @error('name')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($errors->any())
                        <div><input class="wi3" type="text" name="name" value="{{ old('name') }}"></div>
                    @else
                        <div class="mb10"><input class="wi3" type="text" name="name"
                                value="{{ $formData['name'] }}"></div>
                    @endif

                    <div class="dis ccenter2 mt10">
                        <div>【店名 フリガナ*】</div>
                        @error('name_katakana')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($errors->any())
                        <div><input class="wi3" type="text" name="name_katakana"
                                value="{{ old('name_katakana') }}"></div>
                    @else
                        <div class="mb10"><input class="wi3" type="text" name="name_katakana"
                                value="{{ $formData['name_katakana'] }}"></div>
                    @endif

                    <div class="dis ccenter2 mt10">
                        <div>【カテゴリー*】</div>
                        @error('category_name')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="wi3 mcenter">
                        @if ($errors->any())
                            <div class="radio-container">
                                @foreach ($categories as $category)
                                    <div class="mr10">
                                        <input type="radio" name="category_name" value="{{ $category->name }}"
                                            {{ old('category_name') === $category->name ? 'checked' : '' }}>
                                        <label for="{{ $category->name }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="radio-container">
                                @foreach ($categories as $category)
                                    @if ($category->name == $formData['category_name'])
                                        <div class="mr10 mb10">
                                            <input type="radio" id="{{ $category->name }}" name="category_name"
                                                value="{{ $category->name }}" checked>
                                            <label for="{{ $category->name }}">{{ $category->name }}</label>
                                        </div>
                                    @else
                                        <div class="mr10 mb10">
                                            <input type="radio" id="{{ $category->name }}" name="category_name"
                                                value="{{ $category->name }}">
                                            <label for="{{ $category->name }}">{{ $category->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="dis ccenter2 mt10">
                        <div>【レビュー*】（最高：５/最低：１）</div>
                        @error('review')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($errors->any())
                        <div><input type="number" name="review" min="1" max="5"
                                value="{{ old('review') }}"></div>
                    @else
                        <div><input type="number" name="review" min="1" max="5"
                                value="{{ $formData['review'] }}"></div>
                    @endif

                    <div class="dis mt10 ccenter">
                        <div class="mr20">
                            <div>【料理画像】</div>
                            @if (isset($formData['food_picture']))
                                <div class="mb10">
                                    <img width="300" src="{{ $formData['food_picture'] }}" alt="img">
                                </div>
                            @endif
                            <div>
                                <input type="file" name="food_picture"><br>
                            </div>
                        </div>

                        <div>
                            <div>【Google Map URL】<a
                                    href="https://www.google.co.jp/maps/@35.738468,139.6673026,10z?hl=ja&entry=ttu"
                                    target="_blank" class="a">(mapを開く)</a></div>
                            @error('map_url')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                            @if (isset($formData['map_url']))
                                <div class="mb10"><iframe src="{{ $formData['map_url'] }}"></iframe></div>
                                <div><input class="wi3" type="text" name="map_url" placeholder="変更する時は入力してください。">
                                </div>
                            @else
                                <div><input class="wi3" type="text" name="map_url"></div>
                            @endif
                            <div>
                                <a href="/map" class="a" target="_blank">貼り付け方はこちら（別タブが開きます）</a>
                            </div>
                        </div>
                    </div>


                    <div class="dis ccenter2 mt10">
                        <div>【電話番号】</div>
                        @error('tel')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($errors->any())
                        <div><input class="wi3" type="tel" name="tel"
                                value="{{ old('tel') }}"></div>
                    @else
                        <div class="mb10"><input class="wi3" type="tel" name="tel"
                                value="{{ $formData['tel'] }}"></div>
                    @endif

                    <div class="dis ccenter2 mt10">
                        <div>【コメント】</div>
                        @error('comment')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($errors->any())
                        <div class="mb10"><input class="wi3" type="text" name="comment"
                                value="{{ old('comment') }}"></div>
                    @else
                        <div class="mb10"><input class="wi3" type="text" name="comment"
                                value="{{ $formData['comment'] }}"></div>
                    @endif


                    {{-- <div class="mt10">【電話番号】</div>
                    <div><input class="wi3" type="tel" name="tel" value="{{ $formData['tel'] }}"></div>

                    <div class="mt10">【コメント】</div>
                    <div class="mb10"><input class="wi3" type="text" name="comment"
                            value="{{ $formData['comment'] }}">
                    </div> --}}
                @endif


                <button class="btn btn-outline-primary">確認画面へ</button>
            </form>



        </div>
    </div>
</div>

<style>
    .radio-container {
        display: flex;
        flex-wrap: wrap;
    }
</style>
