@extends('layouts.app')

<div class="dis">
    @include('components.header2')
    <div class=" wi9 mcenter">
        <div class="mt20">
            <div class="mt100 f1-5 mb20">カテゴリー管理</div>
            <div>{{$msg}}</div>
            <div>
                <form class="" method="POST" action="/shop/category/store">
                    @csrf

                    <div class="dis">
                        <div class="mr10">新規カテゴリー</div>
                        @error('cateName')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <input class="wi3 mr20" type="text" name="cateName" id="">
                    <button class="btn btn-primary">登録</button>
                </form>
            </div>

            <div class="mb20">
                {{ $categories->links() }}
            </div>
            <table>
                <tr class="tcenter">
                    <th width=30px class="waku">ID</th>
                    <th width=200px class="waku">カテゴリー</th>
                    <th width=80px class="waku">編集</th>
                    <th width=80px class="waku">削除</th>
                </tr>
                @if(isset($categories))
                @foreach ($categories as $category)
                    <tr>
                        <td class="waku p5">{{ $category->id }}</td>
                        <td class="waku p5">{{ $category->name }}</td>
                        <td class="waku p5 tcenter"><button onclick="location.href='/shop/category/edit/{{$category->id}}'" class="btn btn-primary">編集</button></td>
                        <form method="POST" action="/shop/category/del/{{ $category->id }}"
                            onsubmit="return showPopup()">
                            @csrf
                            <td class="waku p5 tcenter">
                                <button class="btn btn-danger">削除</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
                @endif
            </table>
            <div class="mt20">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>


<script>
    function showPopup() {
        if (confirm('本当に削除しますか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>

<style>
    .waku {
        border: 1px solid black;
    }
    .td2 {
        display: inline-block;

        /*中央揃え*/

    }

    .td {
        /* display: block; */
        vertical-align: middle;
        /*中央揃え*/

    }
</style>
