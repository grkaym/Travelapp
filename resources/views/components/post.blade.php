{{-- マイページ、タイムラインに出てくるときの投稿 --}}
<div class="post">
    <div class="post__header">
        <h2 class="post__title">{{$post_title}}</h2>
        <p class="post__user">投稿者：{{$post_user}}</p>
    </div>
    <p class="post__desc">{{$post_desc}}</p>
    <div class="post__tags">
        {{$post_tag}}
    </div>
    {{$post_edit}}
</div>