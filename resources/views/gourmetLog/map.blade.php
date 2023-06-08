<?php
use App\Models\Category;
?>

@extends('layouts.app')

<div class="dis">
    @include('components.header2')
    <div class=" wi9 mcenter">
        <div class="mt20">
            <div class="f1-5 mb20 tcenter">URL張り付け方</div>
            <a href="https://www.google.co.jp/maps/@35.738468,139.6673026,10z?hl=ja&entry=ttu" target="_blank" class="a">(mapを開く)</a>

            <div class="dis mb20">
                <div class="mr20 wi4">google mapで共有のアイコンをクリックします。</div>
                <div>
                    <img class="mb20 original-box-shadow" width="300" src="img/1.png" alt="Image">
                    <img class="original-box-shadow" width="300" src="img/2.png" alt="Image">
                </div>
            </div>

            <div class="dis mb20">
                <div class="mr20 wi4">「地図を埋め込む」のタブをクリックします。</div>
                <div>
                    <img class="original-box-shadow" width="300" src="img/3.png" alt="Image">
                </div>
            </div>

            <div class="dis mb20">
                <div class="mr20 wi4">「HTMLをコピー」をクリックします。<br>
                    <span class="c3 bb">このコピーを張り付けてください。</span> 
                </div>
                <div>
                    <img class="original-box-shadow" width="300" src="img/4.png" alt="Image">
                </div>
            </div>

           


        </div>
    </div>
</div>


<style>
.original-box-shadow {
  display: flex;
  align-items: center;
  justify-content: center;
  color: #333333;
  background-color: #dddddd;
  /* font-size: 30px; */
  /* width: 300px; */
  /* height: 100px; */
  border-radius: 3px;
  box-shadow: 6px 6px 10px 0px rgba(0, 0, 0, 0.4);
}
</style>
