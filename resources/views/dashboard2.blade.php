@extends('layouts.app')
<div class="dis">
    <div>
        @include('components.header2')
    </div>
    
    
    <div>
        @if (isset($user))
            <div class="wi12 mcenter mt10 tr">こんにちは{{ $user->name }}さん</div>
        @else
            <div class="wi12 mcenter mt10 tr">ようこそ！</div>
        @endif
    </div>
<p>2です</p>
    
</div>
