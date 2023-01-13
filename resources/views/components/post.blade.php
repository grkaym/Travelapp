{{-- マイページ、タイムラインに出てくるときの投稿 --}}
<div class="post post_target">
    <input type="hidden" name="post_id" value="{{$post_id}}" class="post_id">
    <div class="post__header">
        <h2 class="post__title">{{$post_title}}</h2>
        <p class="post__user"><i class="fa-solid fa-user-pen"></i><a href="/other/{{$user_id}}">{{$post_user}}</a></p>
    </div>
    <p class="post__desc">{{$post_desc}}</p>
    <div class="post__wrap">
        <div class="post__tags">
            <i class="fa-solid fa-tags post__tags--icon"></i>
            {{$post_tag}}
        </div>
        {{$post_edit}}
    </div>
</div>