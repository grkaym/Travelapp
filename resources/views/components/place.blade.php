{{-- detail, edit内のplaceコンポ－ネント --}}
<div class="place">
    <ul class="place__images js_slick">
        {{$images}}
    </ul>
    <h3 class="place__name">{{$place_name}}</h3>
    <p class="place__address">{{$place_address}}</p>
    <p class="place__description">{{$place_description}}</p>
    {{$place_image}}
</div>