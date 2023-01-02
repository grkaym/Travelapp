{{-- マイページ、タイムラインに出てくるときの投稿 --}}
<div class="post js-post">
    <div class="post__header">
        <h2>{{$post_title}}</h2>
        <p>投稿者：{{$post_user}}</p>
    </div>
    <p>{{$post_desc}}</p>
    <div class="tags">
        {{$post_tag}}
    </div>
    <p><a href="/edit/{{$post_id}}">編集</a></p>
</div>