@foreach ($ajax_posts as $post)
@component('components.post')
    @slot('post_title')
        {{$post->name}}
    @endslot

    @slot('post_tag')
        @foreach ($tags as $tag)
            @if ($post->id === $tag->post_id)
                {{$tag->name}}
            @endif
        @endforeach            
    @endslot

    @slot('post_desc')
        {{$post->description}}
    @endslot
@endcomponent
@endforeach