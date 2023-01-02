@extends('layouts.l-app')
@section('title', 'userlist')
@section('main')
    <h2>ユーザーリスト</h2>
    <table>
        <tr>
            <td>ID</td>
            <td>name</td>
            <td>created_at</td>
            <td>last_login_at</td>
            <td>role</td>
            <td>del/res</td>
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