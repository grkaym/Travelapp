{{-- detail, edit内のplaceコンポ－ネント --}}
<div class="place" data-day="{{$place_day}}">
    <ul class="place__images js_slick">
        {{$images}}
    </ul>
    <h3 class="place__name">{{$place_name}}</h3>
    <p class="place__address"><i class="fa-solid fa-location-dot place__address--icon"></i>{{$place_address}}</p>
    <p class="place__description">{{$place_description}}</p>
    <div class="place__container">{{$place_image}}</div>
</div>