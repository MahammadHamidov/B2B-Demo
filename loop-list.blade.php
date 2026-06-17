@php
    $translation = $row->translate();
@endphp
<div class="item-loop-list {{$wrap_class ?? ''}}">
    @if($row->is_featured == "1")
        <div class="featured">{{__("Featured")}}</div>
    @endif
    
    {{-- Şəkil Bölməsi --}}
    <div class="thumb-image">
        <a href="{{$row->getDetailUrl()}}">
            @if($row->image_url)
                {!! get_image_tag($row->image_id, 'medium', ['class' => 'img-responsive', 'alt' => $translation->title]) !!}
            @endif
        </a>
    </div>

    {{-- Məlumat Bölməsi --}}
    <div class="g-info">
        <div class="item-title">
            <a href="{{$row->getDetailUrl()}}">{{$translation->title}}</a>
        </div>

        {{-- Atributlar Bölməsi --}}
        @if(!empty($row->termsByAttributeInListingPage))
            <div class="terms">
                @foreach($row->termsByAttributeInListingPage as $term)
                    @php $translate_term = $term->translate() @endphp
                    <span class="item">{{$translate_term->name}}</span>
                @endforeach
            </div>
        @endif

        {{-- Lokasiya --}}
        @if(!empty($row->location->name))
            <div class="location">
                @php $location = $row->location->translate() @endphp
                <i class="icofont-paper-plane"></i> {{$location->name ?? ''}}
            </div>
        @endif
    </div>

    {{-- Qiymət Bölməsi --}}
    <div class="g-rate-price">
        <div class="g-price">
            <span class="text-price" style="display: block !important;">
                @if(!empty($row->display_price))
                    {!! $row->display_price !!}
                @else
                    {{ __("Qiymət sorğulayın") }}
                @endif
                <span class="unit">{{__("/night")}}</span>
            </span>
        </div>
    </div>
</div>