<?php
use App\Models\Category;
?>

@extends('layouts.app')

<div class="dis">
    @include('components.header2')
    <div class=" wi9 mcenter">
        {{-- 見出しと検索 --}}
        <div class="mt100">
            <div class="f1-5">お店リスト</div>

            <div class="wi5 dis">
                <div>
                    <form action="/search" method="post">
                        @csrf
                        <input type="text" name="key" class="wi3 mr20" placeholder="検索キーワードを入力してください" />
                        <button type="" class="btn btn-secondary"><i
                                class="fa-solid fa-magnifying-glass"></i>検索</button>
                    </form>
                </div>
            </div>
        </div>


        @if (!$count == 0)
            {{-- 検索あり --}}
            @if ($list == 'search')
                    <div class="mt20">
                        <table>
                            <tr class="tcenter">
                                <th width=30px class="b1">ID</th>
                                <th width=100px class="b1">店名</th>
                                <th width=100px class="b1">カテゴリー</th>
                                <th width=100px class="b1">レビュー</th>
                                <th width=300px class="b1">コメント</th>
                                <th width=80px class="b1">詳細</th>
                                <th width=80px class="b1">編集</th>
                                <th width=80px class="b1">削除</th>
                            </tr>
                            @foreach ($search as $rest)
                                <tr>
                                    <td class="b1 p5">{{ $rest->id }}</td>
                                    <td class="b1 p5">{{ $rest->name }}</td>
                                    @php
                                        $cate_id = $rest->category_tags->category_id;
                                        $category_name = Category::find($cate_id)->name;
                                    @endphp
                                    <td class="b1 p5">
                                        <div>{{ $category_name }}</div>
                                    </td>
                                    <td class="b1 p5">
                                        <div class="dis">
                                            @for ($i = 1; $i <= $rest->review; $i++)
                                                <div>★</div>
                                            @endfor
                                            @for ($i = 1; $i <= 5 - $rest->review; $i++)
                                                <div>☆</div>
                                            @endfor
                                        </div>
                                    </td>
                                    @php
                                        if (mb_strlen($rest->comment) > 20) {
                                            $rest->comment = mb_substr($rest->comment, 0, 20) . '...';
                                        }
                                    @endphp
                                    <td class="b1 p5">{{ $rest->comment }}</td>
                                    <form method="POST" action="/shop/show/{{ $rest->id }}">
                                        @csrf
                                        <td class="b1 p5 tcenter">
                                            <input type="hidden" name="cate_name" value="{{ $category_name }}">
                                            <button class="btn btn-success">詳細</button>
                                        </td>
                                    </form>
                                    <td onclick="location.href='/shop/edit/{{ $rest->id }}'" class="b1 p5 tcenter">
                                        <button class="btn btn-primary">編集</button>
                                    </td>
                                    <form method="POST" action="/shop/del/{{ $rest->id }}"
                                        onsubmit="return showPopup()">
                                        @csrf
                                        <td class="b1 p5 tcenter">
                                            <button class="btn btn-danger">削除</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </table>

                        <button onclick="location.href='/shop'" class="btn btn-secondary mt20"><i
                                class="fa-solid fa-list"></i>一覧表示</button>
                    </div>
            @endif

            {{-- 検索なし --}}
            @if ($list == 'no')
                <div class="mt20">
                    <div>{{ $msg }}</div>
                    <button type="" onclick="location.href='/shop'" class="btn btn-secondary mt20"><i
                            class="fa-solid fa-list"></i>一覧表示</button>
                </div>
            @endif

            {{-- 一覧 --}}
            @if ($list == 'list')
                <div class="mt20">
                    <div class="mb20">
                        {{ $restaurants->links() }}
                    </div>
                    <table>
                        <tr class="tcenter">
                            <th width=30px class="b1">ID</th>
                            <th width=100px class="b1">店名</th>
                            <th width=100px class="b1">カテゴリー</th>
                            <th width=100px class="b1">レビュー</th>
                            <th width=300px class="b1">コメント</th>
                            <th width=80px class="b1">詳細</th>
                            <th width=80px class="b1">編集</th>
                            <th width=80px class="b1">削除</th>
                        </tr>
                        @foreach ($restaurants as $restaurant)
                            <tr>
                                <td class="b1 p5">{{ $restaurant->id }}</td>
                                <td class="b1 p5">{{ $restaurant->name }}</td>
                                @php
                                    $cate_id = $restaurant->category_tags->category_id;
                                    $category_name = Category::find($cate_id)->name;
                                @endphp
                                <td class="b1 p5">
                                    <div>{{ $category_name }}</div>
                                </td>
                                <td class="b1 p5">
                                    <div class="dis">
                                        @for ($i = 1; $i <= $restaurant->review; $i++)
                                            <div>★</div>
                                        @endfor
                                        @for ($i = 1; $i <= 5 - $restaurant->review; $i++)
                                            <div>☆</div>
                                        @endfor
                                    </div>
                                </td>
                                @php
                                    if (mb_strlen($restaurant->comment) > 20) {
                                        $restaurant->comment = mb_substr($restaurant->comment, 0, 20) . '...';
                                    }
                                @endphp
                                <td class="b1 p5">{{ $restaurant->comment }}</td>
                                <form method="POST" action="/shop/show/{{ $restaurant->id }}">
                                    @csrf
                                    <td class="b1 p5 tcenter">
                                        <input type="hidden" name="cate_name" value="{{ $category_name }}">
                                        <button class="btn btn-success" type="">詳細</button>
                                    </td>
                                </form>
                                <td onclick="location.href='/shop/edit/{{ $restaurant->id }}'" class="b1 p5 tcenter">
                                    <button class="btn btn-primary">編集</button>
                                </td>
                                <form method="POST" action="/shop/del/{{ $restaurant->id }}"
                                    onsubmit="return showPopup()">
                                    @csrf
                                    <td class="b1 p5 tcenter">
                                        <button class="btn btn-danger" type="">削除</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach

                    </table>
                    <div class="mt20">
                        {{ $restaurants->links() }}
                    </div>
                </div>
            @endif
        @else
            <p>お店を新規登録しましょう</p>
            <a href="/shop/create">登録はこちら</a>
        @endif
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
