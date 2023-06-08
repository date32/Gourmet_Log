<div class="wi3 bc10 hmax">
    <div class="original-text-shadow p20 mb20">Gourmet Log</div>
    <div class="tcenter yohaku">
        <div class="original-border mb20">MENU</div>
        <div>
            <div class="btnn bgleft"><a href="/shop" class=""><span>お店リスト</span></a></div>
            <div class="btnn bgleft"><a href="/shop/create" class=""><span>新規登録/編集</span></a></div>
            <div class="btnn bgleft"><a href="/shop/category" class=""><span>カテゴリー管理</span></a></div>
        </div>
    </div>

    <div class="pb30">
        <div class="dis ccenter">
            @if ($user)
                <div class="mr20"><button onclick="location.href='/logout'"
                        class="btn btn-primary mt20">ログアウト</button>
                </div>
            @else
                <div class="mr20"><button onclick="location.href='/login'" class="btn btn-primary mt20">ログイン</button>
                </div>
            @endif
            <div><button onclick="location.href='/register'" class="btn btn-primary mt20">新規登録</button></div>
        </div>
    </div>

</div>




<style>
    .hmax {
        height: 100vh
    }
    .yohaku {
        margin-bottom: 300px;
    }

    .original-border {
        border-top: 5px solid #ffffff;
        border-bottom: 5px solid #ffffff;
        padding: 10px
    }

    .original-text-shadow {
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        color: #000000;
        font-size: 40px;
        text-shadow: 0px 20px 8px rgba(0, 0, 0, 0.4);
        font-weight: bold;
    }



    /*== ボタン共通設定 */
    .btnn {
        /*アニメーションの起点とするためrelativeを指定*/
        position: relative;
        overflow: hidden;
        /*ボタンの形状*/
        text-decoration: none;
        /* display: inline-block; */
        /* border: 1px solid rgba(45, 207, 161, 0.532); */
        /* ボーダーの色と太さ */
        padding: 10px 30px;
        text-align: center;
        outline: none;
        /*アニメーションの指定*/
        transition: ease .2s;
    }

    /*ボタン内spanの形状*/
    .btnn span {
        font: bold;
        position: relative;
        z-index: 3;
        /*z-indexの数値をあげて文字を背景よりも手前に表示*/
        color: #ffffff;

    }

    .btnn:hover span {
        color: #fff;
        color: rgba(17, 80, 62, 0.532);
    }

    /*== 背景が流れる（左から右） */
    .bgleft:before {
        content: '';
        /*絶対配置で位置を指定*/
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        /*色や形状*/
        background: #ffffff;
        /*背景色*/
        width: 100%;
        height: 100%;
        /*アニメーション*/
        transition: transform .6s cubic-bezier(0.8, 0, 0.2, 1) 0s;
        transform: scale(0, 1);
        transform-origin: right top;
    }

    /*hoverした際の形状*/
    .bgleft:hover:before {
        transform-origin: left top;
        transform: scale(1, 1);
    }
</style>
