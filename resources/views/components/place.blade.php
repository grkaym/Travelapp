{{-- detail, edit内のplaceコンポ－ネント --}}
<div class="place" data-day="{{$place_day}}">
    <ul class="place__images js_slick">
        {{$images}}
    </ul>
    <h3 class="place__name">{{$place_name}}</h3>
    <p class="place__address">住所：{{$place_address}}</p>
    <p class="place__description">{{$place_description}}</p>
    {{$place_image}}
</div>