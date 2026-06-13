<div class="form-select-guests">
    <div class="form-group">
        <i class="field-icon icofont-travelling"></i>
        <div class="form-content dropdown-toggle" data-toggle="dropdown">
            <div class="wrapper-more">
                <label> {{ $field['title'] }} </label>
                @php
                    $adults = request()->query('adults',1);
                    $children = request()->query('children',0);
                @endphp
                <div class="render">
                    <span class="adults" ><span class="one @if($adults >1) d-none @endif">{{__('1 Adult')}}</span> <span class="@if($adults <= 1) d-none @endif multi" data-html="{{__(':count Adults')}}">{{__(':count Adults',['count'=>request()->query('adults',1)])}}</span></span>
                    -
                    <span class="children" >
                            <span class="one @if($children >1) d-none @endif" data-html="{{__(':count Child')}}">{{__(':count Child',['count'=>request()->query('children',0)])}}</span>
                            <span class="multi @if($children <=1) d-none @endif" data-html="{{__(':count Children')}}">{{__(':count Children',['count'=>request()->query('children',0)])}}</span>
                        </span>
                </div>
            </div>
        </div>
        <div class="dropdown-menu select-guests-dropdown" >
            <div class="dropdown-item-row">
                <div class="label">{{__('Rooms')}}</div>
                <div class="val">
                    <span class="btn-minus" data-input="room"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="room" value="{{request()->query('room',1)}}" min="1"></span>
                    <span class="btn-add" data-input="room"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
            <div class="dropdown-item-row">
                <div class="label">{{__('Adults')}}</div>
                <div class="val">
                    <span class="btn-minus" data-input="adults"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="adults" value="{{request()->query('adults',1)}}" min="1"></span>
                    <span class="btn-add" data-input="adults"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
            <div class="dropdown-item-row">
    <div class="label">{{__('Children')}}</div>
    <div class="val">
        <span class="btn-minus" data-input="children"><i class="icon ion-md-remove"></i></span>
        <span class="count-display"><input type="number" id="children-count" name="children" value="{{request()->query('children',0)}}" min="0" max="6"></span>
        <span class="btn-add" data-input="children"><i class="icon ion-ios-add"></i></span>
    </div>
</div>
<div id="child-ages-wrapper">
    @php $children_count = request()->query('children', 0); @endphp
    @for($i = 0; $i < $children_count; $i++)
        <div class="dropdown-item-row">
            <div class="label">{{__('Uşaq')}} {{ $i + 1 }} {{__('yaşı')}}</div>
            <div class="val">
                <select name="child_ages[]" class="form-control" style="border:1px solid #ddd; padding:4px 8px; border-radius:4px;">
                    @for($age = 0; $age <= 12; $age++)
                        <option value="{{$age}}" {{ request()->query('child_ages')[$i] ?? 0 == $age ? 'selected' : '' }}>{{$age}} {{__('yaş')}}</option>
                    @endfor
                </select>
            </div>
        </div>
    @endfor
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var childrenInput = document.getElementById('children-count');
    var wrapper = document.getElementById('child-ages-wrapper');
    
    function updateChildAges(count) {
        wrapper.innerHTML = '';
        for (var i = 0; i < count; i++) {
            var row = document.createElement('div');
            row.className = 'dropdown-item-row';
            var options = '';
            for (var age = 0; age <= 12; age++) {
                options += '<option value="' + age + '">' + age + ' yaş</option>';
            }
            row.innerHTML = '<div class="label">Uşaq ' + (i+1) + ' yaşı</div><div class="val"><select name="child_ages[]" class="form-control" style="border:1px solid #ddd; padding:4px 8px; border-radius:4px;">' + options + '</select></div>';
            wrapper.appendChild(row);
        }
    }
    
    if(childrenInput) {
        childrenInput.addEventListener('change', function() {
            updateChildAges(parseInt(this.value) || 0);
        });
        
        document.querySelectorAll('.btn-minus[data-input="children"], .btn-add[data-input="children"]').forEach(function(btn) {
            btn.addEventListener('click', function() {
                setTimeout(function() {
                    updateChildAges(parseInt(childrenInput.value) || 0);
                }, 100);
            });
        });
    }
});
</script>
        </div>
    </div>
</div>
