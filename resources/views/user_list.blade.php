@extends('layouts.l-app')
@section('title', 'ユーザーリスト / travel')
@section('main')
    <h2>ユーザーリスト</h2>
    <table class="users">
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>登録日時</th>
            <th>最終ログイン</th>
            <th>種類</th>
            <th>削除/解除</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->last_login_at}}</td>
                <td>
                    @if ($user->role === 0)
                        管理
                    @elseif ($user->role === 1)
                        一般
                    @elseif ($user->role === 2)
                        停止
                    @endif
                </td>
                @if ($user->role === 1)
                    <td><a href="/delete_user?id={{$user->id}}">削除</a></td>
                @elseif ($user->role === 2)
                    <td><a href="/restore_user?id={{$user->id}}">戻す</a></td>
                @endif

            </tr>
        @endforeach
    </table>
@endsection