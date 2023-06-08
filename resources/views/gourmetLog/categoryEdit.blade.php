@extends('layouts.app')

<div class="dis">
    @include('components.header2')
    <div class=" wi9 mcenter">
        <div class="mt20 mt100">
            <div class="f1-5 mb20">カテゴリー編集</div>
            <div>
                <div>ID:{{ $category->id }}</div>
                <div class="dis">
                    <div class="mr10">カテゴリー名</div>
                    @error('cateName')
                        <div class="c3">{{ $message }}</div>
                    @enderror
                </div>
                

                <form method="POST" action="/shop/category/update/{{ $category->id }}">
                    @csrf
                    <div class="mb20"><input type="text" name="cateName" placeholder="{{ $category->name }}"></div>
                    <a class="btn btn-secondary mr20" href="/shop/category">戻る</a>
                    {{-- <button onclick="location.href='/shop/category'">戻る</button> --}}
                    <button class="btn btn-primary">修正</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script></script>

<style>

</style>
