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
        <input type="text" placeholder="{{__("First Name")}}" class="form-control" name="first_name" oninput="bravoLatinOnlyCheck(this)">
        <div class="latin-warning-msg" style="display:none; background:#fde8e8; color:#000; padding:10px 12px; border-radius:6px; margin-top:8px; font-size:13px;">
            <i class="fa fa-exclamation-circle" style="color:#dc3545; margin-right:6px;"></i>{{__('Xananı latın simvollarından istifadə edərək doldurun')}}
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label >{{__("Last Name")}} <span class="required">*</span></label>
        <input type="text" placeholder="{{__("Last Name")}}" class="form-control" name="last_name" oninput="bravoLatinOnlyCheck(this)">
        <div class="latin-warning-msg" style="display:none; background:#fde8e8; color:#000; padding:10px 12px; border-radius:6px; margin-top:8px; font-size:13px;">
            <i class="fa fa-exclamation-circle" style="color:#dc3545; margin-right:6px;"></i>{{__('Xananı latın simvollarından istifadə edərək doldurun')}}
        </div>
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
        <input type="text" class="form-control" name="address_line_1" style="text-transform:uppercase;" oninput="bravoPassportOnlyCheck(this)">
        <div class="latin-warning-msg" style="display:none; background:#fde8e8; color:#000; padding:10px 12px; border-radius:6px; margin-top:8px; font-size:13px;">
            <i class="fa fa-exclamation-circle" style="color:#dc3545; margin-right:6px;"></i>{{__('Xananı latın simvollarından istifadə edərək doldurun')}}
        </div>
    </div>
</div>
         <div class="col-md-6 field-address-line-2">
    <div class="form-group">
       <label>{{__("Xarici passportun etibarlılıq müddəti")}} <span class="required">*</span></label>
        <input type="date" class="form-control" name="address_line_2" onchange="bravoPassportExpiryCheck(this)">
        <div class="passport-expiry-warning-msg" style="display:none; background:#fde8e8; color:#000; padding:10px 12px; border-radius:6px; margin-top:8px; font-size:13px;">
            <i class="fa fa-exclamation-circle" style="color:#dc3545; margin-right:6px;"></i>{{__('Sənədin bitmə müddəti uyğun deyil')}}
        </div>
    </div>
</div>
            
 <div class="col-md-6 field-zip-code">
    <div class="form-group">
        <label>{{__("Telefon")}} <span class="required">*</span></label>
        <div class="d-flex">
            <select name="phone_code" class="form-control" style="max-width:180px;flex-shrink:0;margin-right:8px;">
    <option value="+994" selected>+994 Azərbaycan</option>
    <option value="+90">+90 Türkiyə</option>
    <option value="+995">+995 Gürcüstan</option>
    <option value="+374">+374 Ermənistan</option>
    <option value="+7">+7 Rusiya</option>
    <option value="+998">+998 Özbəkistan</option>
    <option value="+996">+996 Qırğızıstan</option>
    <option value="+992">+992 Tacikistan</option>
    <option value="+993">+993 Türkmənistan</option>
    <option value="+370">+370 Litva</option>
    <option value="+371">+371 Latviya</option>
    <option value="+372">+372 Estoniya</option>
    <option value="+380">+380 Ukrayna</option>
    <option value="+375">+375 Belarus</option>
    <option value="+44">+44 Böyük Britaniya</option>
    <option value="+49">+49 Almaniya</option>
    <option value="+33">+33 Fransa</option>
    <option value="+39">+39 İtaliya</option>
    <option value="+34">+34 İspaniya</option>
    <option value="+1">+1 ABŞ/Kanada</option>
    <option value="+86">+86 Çin</option>
    <option value="+971">+971 BƏƏ</option>
    <option value="+966">+966 Səudiyyə Ərəbistanı</option>
    <option value="+20">+20 Misir</option>
    <option value="+212">+212 Mərakeş</option>
    <option value="+30">+30 Yunanıstan</option>
    <option value="+31">+31 Niderland</option>
    <option value="+32">+32 Belçika</option>
    <option value="+36">+36 Macarıstan</option>
    <option value="+40">+40 Rumıniya</option>
    <option value="+41">+41 İsveçrə</option>
    <option value="+43">+43 Avstriya</option>
    <option value="+45">+45 Danimarka</option>
    <option value="+46">+46 İsveç</option>
    <option value="+47">+47 Norveç</option>
    <option value="+48">+48 Polşa</option>
    <option value="+351">+351 Portuqaliya</option>
    <option value="+353">+353 İrlandiya</option>
    <option value="+358">+358 Finlandiya</option>
    <option value="+359">+359 Bolqarıstan</option>
    <option value="+420">+420 Çexiya</option>
    <option value="+421">+421 Slovakiya</option>
    <option value="+91">+91 Hindistan</option>
    <option value="+92">+92 Pakistan</option>
    <option value="+93">+93 Əfqanıstan</option>
    <option value="+98">+98 İran</option>
    <option value="+962">+962 İordaniya</option>
    <option value="+963">+963 Suriya</option>
    <option value="+964">+964 İraq</option>
    <option value="+965">+965 Küveyt</option>
    <option value="+968">+968 Oman</option>
    <option value="+970">+970 Fələstin</option>
    <option value="+972">+972 İsrail</option>
    <option value="+973">+973 Bəhreyn</option>
    <option value="+974">+974 Qatar</option>
    <option value="+81">+81 Yaponiya</option>
    <option value="+82">+82 Cənubi Koreya</option>
    <option value="+60">+60 Malayziya</option>
    <option value="+61">+61 Avstraliya</option>
    <option value="+62">+62 İndoneziya</option>
    <option value="+63">+63 Filippin</option>
    <option value="+65">+65 Sinqapur</option>
    <option value="+66">+66 Tailand</option>
    <option value="+84">+84 Vyetnam</option>
</select>
            <input type="text" placeholder="{{__('Telefon')}}" class="form-control" name="phone_number" oninput="bravoPhoneOnlyCheck(this)" maxlength="15">
        </div>
        <input type="hidden" name="zip_code" id="combined_phone_input" value="{{$user->zip_code ?? ''}}">
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
<script>
function bravoPhoneOnlyCheck(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
    updateCombinedPhone();
}

function updateCombinedPhone() {
    var code = document.querySelector('select[name="phone_code"]');
    var number = document.querySelector('input[name="phone_number"]');
    var hidden = document.getElementById('combined_phone_input');
    if (code && number && hidden) {
        hidden.value = code.value + number.value;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var codeSelect = document.querySelector('select[name="phone_code"]');
    if (codeSelect) {
        codeSelect.addEventListener('change', updateCombinedPhone);
    }
});
function bravoLatinOnlyCheck(input) {
    var warningBox = input.parentElement.querySelector('.latin-warning-msg');
    var latinPattern = /^[A-Za-z\s]*$/;
    if (!latinPattern.test(input.value)) {
        input.value = input.value.replace(/[^A-Za-z\s]/g, '');
        if (warningBox) warningBox.style.display = 'block';
    } else {
        if (warningBox) warningBox.style.display = 'none';
    }
}

function bravoPassportOnlyCheck(input) {
    var warningBox = input.parentElement.querySelector('.latin-warning-msg');
    var passportPattern = /^[A-Za-z0-9\s]*$/;
    var cursorPos = input.selectionStart;
    var oldLength = input.value.length;
    if (!passportPattern.test(input.value)) {
        input.value = input.value.replace(/[^A-Za-z0-9\s]/g, '');
        if (warningBox) warningBox.style.display = 'block';
    } else {
        if (warningBox) warningBox.style.display = 'none';
    }
    input.value = input.value.toUpperCase();
    var newLength = input.value.length;
    cursorPos = cursorPos - (oldLength - newLength);
    input.setSelectionRange(cursorPos, cursorPos);
}
function bravoPassportExpiryCheck(input) {
    var warningBox = input.parentElement.querySelector('.passport-expiry-warning-msg');
    if (!input.value) {
        if (warningBox) warningBox.style.display = 'none';
        return;
    }
    var selectedDate = new Date(input.value);
    var minDate = new Date();
    minDate.setMonth(minDate.getMonth() + 6);
    if (selectedDate < minDate) {
        if (warningBox) warningBox.style.display = 'block';
        input.value = '';
    } else {
        if (warningBox) warningBox.style.display = 'none';
    }
}
</script>
