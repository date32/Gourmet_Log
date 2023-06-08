<div class="bc8 he1">
    <div class="wi12 dis mcenter">
        <div class="original-text-shadow mt10">Gourmet Log</div>
        <div class="mr dis f1-5">
            @if($user)
            <div class="mr20"><button onclick="location.href='/dashboard'" class="btn btn-primary mt20">dashboard</button>
            </div>
            <div class="mr20"><button onclick="location.href='/logout'" class="btn btn-primary mt20">ログアウト</button>
            </div>
            @else
            <div class="mr20"><button onclick="location.href='/login'" class="btn btn-primary mt20">ログイン</button>
            </div>
            @endif
            <div><button onclick="location.href='/register'" class="btn btn-primary mt20">新規登録</button></div>
        </div>
    </div>
    @if (isset($user))
    <div class="wi12 mcenter mt10 tr">こんにちは{{$user->name}}さん</div>
    @else
    <div class="wi12 mcenter mt10 tr">ようこそ！</div>
    @endif
    
</div>

<style>
    .original-text-shadow {
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        color: #000000;
        font-size: 50px;
        text-shadow: 0px 20px 8px rgba(0, 0, 0, 0.4);
        font-weight: bold;
    }
</style>