<div class="form-checkout" id="form-checkout" >
    <input type="hidden" name="code" value="{{$booking->code}}">
    <div class="form-section">
        <div class="row">

            @if(is_enable_guest_checkout() && is_enable_registration())
                <div class="col-12">
                    <div class="form-group">
                        <label for="confirmRegister">
                            <input type="checkbox" name="confirmRegister" id="confirmRegister" value="1">
                            {{__('Create a new account?')}}
                        </label>
                    </div>
                </div>
            @endif
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{__("First Name")}} <span class="required">*</span></label>
                    <input type="text" placeholder="{{__("First Name")}}" class="form-control" value="{{$user->first_name ?? ''}}" name="first_name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{__("Last Name")}} <span class="required">*</span></label>
                    <input type="text" placeholder="{{__("Last Name")}}" class="form-control" value="{{$user->last_name ?? ''}}" name="last_name">
                </div>
            </div>
            <div class="col-md-6 field-email">
    <div class="form-group">
        <label>{{__("Cinsiyyət")}} <span class="required">*</span></label>
        <select name="email" class="form-control">
            <option value="">{{__('-- Select --')}}</option>
            <option value="male">{{__('Kişi')}}</option>
            <option value="female">{{__('Qadın')}}</option>
        </select>
    </div>
</div>
            <div class="col-md-6">
    <div class="form-group">
        <label>{{__("Doğum tarixi")}} <span class="required">*</span></label>
        <input type="date" class="form-control" value="{{$user->phone ?? ''}}" name="phone">
    </div>
</div>

            @if(is_enable_guest_checkout())
            <div class="col-12 d-none" id="confirmRegisterContent">
                <div class="row">
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label >{{__("Password")}} <span class="required">*</span></label>
                            <input type="password" class="form-control" name="password" autocomplete="off" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{__('Password confirmation')}} <span class="required">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            @endif
           <div class="col-md-6 field-address-line-1">
    <div class="form-group">
       <label>{{__("Xarici passportun nömrəsi")}} <span class="required">*</span></label>
        <input type="text" class="form-control" value="{{$user->address ?? ''}}" name="address_line_1">
    </div>
</div>
            <div class="col-md-6 field-address-line-2">
    <div class="form-group">
       <label>{{__("Xarici passportun etibarlılıq müddəti")}} <span class="required">*</span></label>
        <input type="date" class="form-control" value="{{$user->address2 ?? ''}}" name="address_line_2">
    </div>
</div>
            
            <div class="col-md-6 field-zip-code">
    <div class="form-group">
        <label>{{__("Telefon")}} <span class="required">*</span></label>
        <input type="text" class="form-control" value="{{$user->zip_code ?? ''}}" name="zip_code" placeholder="{{__('Telefon')}}">
    </div>
</div>
            <div class="col-md-6 field-country">
                <div class="form-group">
                    <label >{{__("Vətəndaşlıq")}} <span class="required">*</span> </label>
                    <select name="country" class="form-control">
                        <option value="">{{__('-- Select --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if(($user->country ?? '') == $id) selected @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <label >{{__("Qeydlər")}} </label>
                <textarea name="customer_notes" cols="30" rows="6" class="form-control" placeholder="{{__('Qeydlər')}}"></textarea>
            </div>
        </div>
    </div>

    @include ('Booking::frontend/booking/checkout-passengers')
    @include ('Booking::frontend/booking/checkout-deposit')
    @include ($service->checkout_form_payment_file ?? 'Booking::frontend/booking/checkout-payment')

    @php
    $term_conditions = setting_item('booking_term_conditions');
    @endphp

    <div class="form-group">
        <label class="term-conditions-checkbox">
            <input type="checkbox" name="term_conditions"> {{__('I have read and accept the')}}  <a target="_blank" href="{{get_page_url($term_conditions)}}">{{__('terms and conditions')}}</a>
        </label>
    </div>
    @if(setting_item("booking_enable_recaptcha"))
        <div class="form-group">
            {{recaptcha_field('booking')}}
        </div>
    @endif
    <div class="html_before_actions"></div>

    <p class="alert-text mt10" v-show=" message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></p>

    <div class="form-actions">
        <button class="btn btn-danger" @click="doCheckout">{{__('Submit')}}
            <i class="fa fa-spin fa-spinner" v-show="onSubmit"></i>
        </button>
    </div>
</div>
