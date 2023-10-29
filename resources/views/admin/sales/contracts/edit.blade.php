@extends('layouts.admin')
@section('headerLinks')
@parent
@endsection
@section('title') تعديل بيانات عقد @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') العقود @endsection
@section('homeLinkActive') تعديل بيانات عقد @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('contracts.home') }}"><span class="btn-title">العودة للرئيسية</span><i class="fa fa-home text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('contract.view', [$contract->id, 1]) }}"><span class="btn-title">صفحة العقد</span><i class="fa fa-eye text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('items.setting') }}"><span class="btn-title">إعدادات العقود</span><i class="fa fa-cogs text-light"></i></a></button>
@endsection
@section('content')
<style>
    b {
        color: rgb(0, 81, 255)
    }

    nav .nav-tabs {
        padding: 0 40px;
    }

    nav .nav-tabs button.nav-link {
        margin: 0 3px 0;
        border: 1px solid #6c757d;
        color: #999
    }
    nav .nav-tabs button.nav-link.active {
        color: rgb(0, 81, 255);
        border: 1px solid #6c757d;
        border-bottom: 5px solid #ffffff;
    }

    .nav-link a {
        color: #999;
        font: bold 14px/1.4 Cairo;
    }
    .nav-link.active a {
        color: inherit
    }

    .tab-content {
        border: 1px solid #345678;
        margin-top: -4px;
        text-align: right;
        padding: .5em;
    }
    .tab-pane h4 {
        font: bold 14px/1.4 Cairo;
        color:rgb(0, 81, 255);
        border: 2px solid transparent;
        display: inline-block ;
        border-bottom-color: #345678;
        padding: 6px 1em;
    }
    ol {
        list-style-type:none; 
        padding: 0;
    }
    ol li {
        margin-bottom: 8px;
        background-color: #e4e3e3;
        padding: 5px;
    }
    div.create-form.total {
        padding: 0.25em;
        background-color: #e4e3e3;
    }

    div.create-form.total > div {
        padding: 0.25em 1em
    }

    div.create-form.total > div:first-child { 
        text-align: left;
        font: bolder 16px/1 Cairo;
    }

    div.create-form.total > div.number { 
        border: 1px solid #345678;
        background-color: #efefef;
    }

    div.create-form .col button,
    div.create-form .col label {
        font: bold 10px/1 'Cairo';
        padding: 3px 12px !important;
    }

    div.create-form .col button{
        height: 33px !important;
    }
    div.create-form .col select, 
    div.create-form div.col input[type=text],
    div.create-form div.col input[type=number] {
        font: normal 12px/1 'Cairo' !important;
        height: 33px !important;
        text-align: center;
        width: 100%;
    }

    .teb_footer {
        justify-content: end; 
        background-color:rgb(031, 117, 254); 
        width: auto; 
        margin: 0; 
        height: 40px; 
        position: absolute; 
        bottom: -8px; 
        left: -8px; 
        right: -8px;
    }
    
    .teb_footer > div {
        margin: 5px 0; 
        height: 30px; 
        line-height: 30px;
        color: white;
    }
    
    .teb_footer > div.number {
        border: 1px solid #345678;
        margin: 5px 16px;
        background-color: #fff;
        color: #345678
    }
    
    .teb_footer > div.text {
        font: bolder 16px/1.8 'Cairo';
        text-align: left;
    }
    div.hide {
        display: none;
    }

</style>
    <div class="container">
        <div class="border">
            
            <fieldset  dir="rtl" class="m-3 mt-5" >
                <legend style="right: 20px; left: auto">تعديل بيانات عقد </legend>
                <br> 
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border: 0">
                        <button class="nav-link {{$tab == 1 ? 'active':''}}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                            <a href="{{route('contract.edit', [$contract->id, 1])}}"> البيانات الأساسية </a>
                        </button>
                        <button class="nav-link {{$tab == 2 ? 'active':''}}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> 
                            <a href="{{route('contract.edit', [$contract->id, 2])}}"> أصناف العقد </a> 
                        </button>
                        <button class="nav-link {{$tab == 3 ? 'active':''}}" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                            <a href="{{route('contract.edit', [$contract->id, 3])}}"> الدفعات المالية </a> 
                        </button>
                        <button class="nav-link {{$tab == 4 ? 'active':''}}" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">
                            <a href="{{route('contract.edit', [$contract->id, 4])}}"> الشروط الإضافية </a> 
                        </button>
                    </div>
                </nav>
               
                <div class="tab-content" id="nav-tabContent" style="">
                    @if ($tab == 1)
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        <form class="p-3" id="regForm" action="{{ route('contract.update') }}" method="post">
                            @csrf
                            <style>
                                
                            </style>
                            <div class="row" dir="rtl">
                                <b> اسم العميل:</b> &nbsp;
                                <span>{{$client->name}}</span>، &nbsp;
                                <b> اسم المدير:</b> &nbsp;
                                <span>{{$client->person}}</span>، &nbsp;
                                <b> هاتف:</b> &nbsp;
                                <span>{{$client->phone}}</span>، &nbsp;
                                <b> سجل تجاري:</b> &nbsp;
                                <span>{{$client->cr}}</span>.
                                <b> إقامة :</b> &nbsp;
                                <span>{{$client->iqama}}</span>.
                            </div>
                            <input type="hidden" name="id" value="{{ $contract->id}}">

                            <h4 >الترقيم</h4>

                            <table class=" w-100">
                                <tr>
                                    <td class="text-left">نوع العقد:</td>
                                    <td class="">
                                        <select name="type" id="type">
                                            <option hidden>حدد نوع العقد</option>
                                            <option {{ $contract->type == 1 ? 'selected' : '' }} value="1">عقد تأجير أساسى</option>
                                            <option {{ $contract->type == 2 ? 'selected' : '' }} value="2">زيادة عدد طبالى</option>
                                            <option {{ $contract->type == 3 ? 'selected' : '' }} value="3">تمديد مدة عقد</option>
                                        </select>
                                    </td>
                                    <td class="text-left">الكود:</td>
                                    <td class="" >
                                        <input type="text" name="code" id="s_number" value="{{ $contract->code}}">                              
                                    </td>
                                    <td class="text-left">الرقم المسلسل:</td>
                                    <td class="" >
                                        <input type="text" name="s_number" id="s_number" value="{{$contract->s_number}}">                              
                                    </td>
                                </tr>

                                <tr>
                                    <td> الوصف </td>
                                    <td colspan="5"> <input style="width: 96%" type="text" name="brief" value="{{$contract->brief}}"> </td>
                                </tr>
                            </table>

                            <h4 > تاريخ الانشاء </h4>
                            
                            <table class=" w-100">
                                <tr>
                                    <td class="text-left">في يوم:</td>
                                    <td class="cal-1">
                                        <input type="date" class="dateGrabber" data-target="in_day" style="width: 30px" id="in_day">
                                        <span style="padding: 0 1em;" id="in_day_greg_display">{{$contract->in_day_greg}}</span>
                                        <input type="hidden" name="in_day_greg_input" id="in_day_greg_input" value="{{$contract->in_day_greg}}">
                                    </td>
                                    <td class="text-left">الموافق:</td>
                                    <td class="cal-2" >
                                        <span style="padding: 0 1em;" id="in_day_hijri_display">{{$contract->in_day_hij}}</span>
                                        <input type="hidden" name="in_day_hijri_input" id="in_day_hijri_input" value="{{$contract->in_day_hij}}">                              
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <h4> التوقيت والمدد </h4>


                            <table class="w-100">  
                                <tr>
                                    <td>
                                        <label>الفترة المبدئية</label>
                                    </td>
                                    <td colspan="2">
                                        <input style="max-width: 40%" type="number" name="start_period" id="start_period" value="{{$contract->start_period}}">
                                        <label>شهر/أشهر، بعدها يتم التجديد لمدة:</label>
                                    </td>
                                    <td><input style="max-width: 40%" type="number" name="renew_period" id="start_period" value="{{$contract->renew_period}}">
                                        شهر/أشهر
                                    </td>
                                </tr>   
                                <tr>
                                    <td class="text-left">بداية العقد:</td>
                                    <td class="cal-1">
                                        <input type="date" class="dateGrabber" data-target="starts_in" style="width: 30px" id="starts_in">
                                        <span style="padding: 0 1em;" id="starts_in_greg_display">{{$contract->starts_in_greg}}</span>
                                        <input type="hidden" name="starts_in_greg_input" id="starts_in_greg_input" value="{{$contract->starts_in_greg}}">
                                    </td>
                                    <td class="text-left">الموافق:</td>
                                    <td class="cal-2" >
                                        <span style="padding: 0 1em;" id="starts_in_hijri_display">{{$contract->starts_in_hij}}</span>
                                        <input type="hidden" name="starts_in_hijri_input" id="starts_in_hijri_input" value="{{$contract->starts_in_hij}}">                              
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">نهاية العقد:</td>
                                    <td class="cal-1">
                                        <input type="date" class="dateGrabber" data-target="ends_in" style="width: 30px" id="ends_in">
                                        <span style="padding: 0 1em;" id="ends_in_greg_display">{{$contract->ends_in_greg}}</span>
                                        <input type="hidden" name="ends_in_greg_input" id="ends_in_greg_input" value="{{$contract->ends_in_greg}}">
                                    </td>
                                    <td class="text-left">الموافق:</td>
                                    <td class="cal-2" >
                                        <span style="padding: 0 1em;" id="ends_in_hijri_display">{{$contract->ends_in_hij}}</span>
                                        <input type="hidden" name="ends_in_hijri_input" id="ends_in_hijri_input" value="{{$contract->ends_in_hij}}">  
                                    </td>
                                </tr>
                            </table>
                            <!-- One "tab" for each step in the form: -->
                            <div style="">
                                <br>
                                <button id="dismiss_btn" class="btn btn-success" 
                                onclick="window.location='{{ route('clients.home') }}'">إلغاء</button>
                                <button class="btn btn-secondary" type="submit" id="submitBtn">إدراج</button>
                            </div>
                        </form>

                        <script>
                            let dateInputs = ['in_day', 'starts_in', 'ends_in'];
                            window.onload = function () {
                                dateInputs.forEach( (id) => {
                                    const dateInput = document.getElementById(id)
                                    //updateOnload (id)
                                    
                                    dateInput.onchange = function (e) {
                                        updateOnchange (e.target.id)
                                    }
                                })
                            }
                        
                            function updateOnload (id) {
                                let today = new Date ();
                                    document.getElementById(id+'_greg_display').innerHTML = today.toLocaleDateString('en-eg')
                                    document.getElementById(id+'_greg_input').value = dateFormatNumeral (today)
                                    document.getElementById(id+'_hijri_display').innerHTML = today.toLocaleDateString('ar-sa')
                                    document.getElementById(id+'_hijri_input').value = today.toLocaleDateString('ar-sa')
                            }
                        
                            function updateOnchange (id) {
                                let today = new Date (document.getElementById(id).value);
                                    document.getElementById(id+'_greg_display').innerHTML = today.toLocaleDateString('en-eg')
                                    document.getElementById(id+'_greg_input').value = dateFormatNumeral (today)
                                    document.getElementById(id+'_hijri_display').innerHTML = today.toLocaleDateString('ar-sa')
                                    document.getElementById(id+'_hijri_input').value = today.toLocaleDateString('ar-sa')
                            }
                        
                            function dateFormatNumeral (date) {
                                return date.getFullYear()+ '-' +[date.getMonth()+1]+ '-' +date.getDate();
                            }
                        
                           
                        </script>

                    </div>
                    @elseif ($tab == 2)
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="1" style="position: relative">
                        <h4>
                            إضافة أصناف على العقد 
                        </h4>
                        <form class="create-form" action="{{route('contract.items.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="contract" value="{{$contract->id}}">
                            <div class="row w-100 create-form m-auto pb-3">
                                <div class="col col-2">
                                    <label for="item">الصنف</label>
                                    <select name="item" id="item" class="form-control"> 
                                        @foreach($items as $i => $ci)
                                        <option value="{{$ci->id}}">{{ $ci->a_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-2">
                                    <label class="form-label" for="qty">العدد</label>
                                    <input type="number" id="qty" class="form-control w-100" name="qty" placeholder="0.00" onchange="calculatePrices('total', '#start_period', this.value, document.querySelector('#price').value)"> 
                                </div>
                                <div class="col col-2">
                                    <label class="form-label" for="">مدة العقد بالشهور</label>
                                    <input type="number" name="start_period" class="form-control w-100" id="start_period" placeholder="0.00" value="{{ $contract->start_period}}">
                                </div>
                                <div class="col col-2">
                                    <label class="form-label" for="unit_price">سعر الوحدة / شهر</label>
                                    <input type="number" id="price" class="form-control w-100" name="price" placeholder="0.00" onchange="calculatePrices('total', '#start_period', document.querySelector('#qty').value, this.value)">
                                </div>
                                <div class="col col-3">
                                    <label class="form-label" for="">الاجمالى</label>
                                    <input type="number" id="total" class="form-control w-100" name="total" placeholder="00.00">
                                </div>
                                <div class="col col-1">
                                    <label class="form-label text-light">الحدث</label>
                                    <button class="btn btn-primary form-control" title="تحديث البيانات" type="submit">حفظ</i></button>
                                </div>
                            </div>
                        </form>
                        
                        <ol class="mt-4">
                        @php $total=0 @endphp
                        @if (count($cis)) 
                        @foreach ($cis as $o => $ci)
                            <li>
                                <form class="w-100" action="{{route('contract.items.update')}}" method="POST" class="mb-1">
                                    @csrf
                                    <div class="create-form m-auto">
                                        <div class="row">
                                            <div class="col col-2">
                                                <input type="text"  disabled value="{{ $ci->name }}">
                                            </div>
                                            <div class="col col-2">
                                                <input type="number" class="form-control" step="0.01" value="{{ $ci->qty }}" id="qty_{{$ci->id}}" name="qty" placeholder="عدد" onchange="calculatePrices('vat_{{$ci->id}}', 'total_{{$ci->id}}', this.value, document.querySelector('#price_{{$ci->id}}').value)">
                                            </div>
                                            <div class="col col-2">
                                                <input type="number" class="form-control" step="0.01" value="{{ $contract->start_period }}" id="start_period_{{$ci->id}}" name="start_period" placeholder="سعر الوحدة" onchange="calculatePrices('vat_{{$ci->id}}', 'total_{{$ci->id}}', document.querySelector('#qty_{{$ci->id}}').value, this.value)">
                                            </div>
                                            <div class="col col-2">
                                                <input type="number" class="form-control" step="0.01" value="{{ $ci->unit_price }}" id="price_{{$ci->id}}" name="price" placeholder="سعر الوحدة" onchange="calculatePrices('vat_{{$ci->id}}', 'total_{{$ci->id}}', document.querySelector('#qty_{{$ci->id}}').value, this.value)">
                                            </div>
                                            <div class="col col-2">
                                                <input type="number" class="form-control" step="0.01" id="total_{{$ci->id}}" name="total" placeholder="اجمالى السعر" value="{{$ci->unit_price*$ci->qty*$contract->start_period}}">
                                            </div>
                                            <div class="col col-2">
                                                <button class="btn btn-primary p-0" title="تحديث البيانات" type="submit">
                                                    تحديث</i>
                                                </button>
                                                <button class="btn btn-danger p-0" title="حذف الصنف" type="button">
                                                    <a style="color: inherit" href="{{ route('contract.item.delete', $ci->id) }}">حذف</a>
                                                </button>
                                                <input type="hidden" name="itemId" value="{{$ci->id}}">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            @php $total+=$ci->unit_price*$ci->qty*$contract->start_period @endphp
                           
                            @endforeach
                            @endif
                            <div class="row create-form total m-auto">
                                <div class="col col-8">
                                    الاجمـــــــــــــــــــــــالى
                                </div>
                                <div class="col col-2 number">
                                    {{$total}}
                                </div>
                            </div>
                        </ol>

                        <br><br>
                        <div class="row teb_footer" style="">
                            <div class="col col-auto text">الاجمالى</div>
                            <div class="col col-auto number">
                                {{$total}}
                            </div>
                            <div class="col col-auto text">الضريبة</div>
                            <div class="col col-auto number">{{$total * 0.15}}</div>
                            <div class="col col-auto text">الاجمالى مع الضريبة</div>
                            <div class="col col-auto number"> {{$total * 1.15}}</div>
                        </div>
        

                    
                        
                        <script>
                            function calculatePrices (el2, csp, qty, price) {
                                document.getElementById(el2).value = (qty*price*document.querySelector(csp).value).toFixed(2);
                            }
                        </script>

                    </div>


                    @elseif ($tab == 3)
                    <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="1">
                        <h4> سداد الدفعات المالية </h4>
                        
                        <div class="{{$ct-$payments == 0 ? 'hide': '' }}">
                            <form action="{{route('contract.payment.entry.store')}}" method="POST" style="background-color: #9f9f9f; padding: 5px 0.5em; height: 45px">
                            @csrf
                            <input type="hidden" name="contract" value="{{$contract->id}}">
                            <div class="order" style="display: inline-block; vertical-align: middle">
                                <input style="width: 40px; height: 33px; text-align: center" type="text" name="ordering" value="{{ count($pses) + 1 }}">
                            </div>
                            <div class="create-form"  style="display: inline-block; width: calc(100% - 50px);" >
                                <div class="row mb-2">
                                    <div class="col col-4 font-weight-bold text-light">
                                        <input style="padding: .2em 1em; width: 45%" type="number" name="amount" onchange="calculateRatio(this)" id="amount" min="1" step="0.01" data-ctp="{{$ct}}" value="{{$ct-$payments}}">
                                        <input style="padding: .2em 1em; width: 45%" type="number" name="ratio" onchange="calculateAmount(this)" id="ratio" min="1" max="100" step="1" value="{{$ct?($ct-$payments)/$ct*100:0}}" data-ctp="{{$ct}}"> &nbsp;%
                                    </div>
                                
                                    <div class="col col-7">
                                        <input style="padding: .2em 1em; width: 100%" type="taxt" name="brief" placeholder=" وقت أو سبب الاستحقاق ">
                                    </div>
                                    <div class="col col-1">
                                        <button class="btn btn-primary" type="submit"> حفظ </button>
                                    </div>
                                    
                                </div>
                            </div>
                                        

                            </form>
                        </div>

                        <ol class="mt-3">
                            @foreach ($pses as $p => $pe)
                            
                            <li style="padding: 5px 0.5em; height: 45px">
                                <form action="{{route('contract.payment.entry.update')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="id" value="{{$pe->id}}">
                                    <div class="order" style="display: inline-block; vertical-align: middle">
                                        <input style="width: 40px; height: 33px; text-align: center; background: #e4e3e3; border: 0" type="text" name="ordering" value="{{$pe->ordering}}">
                                    </div>
                                    <div class="create-form"  style="display: inline-block; width: calc(100% - 50px);" >
                                        <div class="row mb-2">
                                            <div class="col col-4">
                                                <span style="display: inline-block; width: 25%; " >{{$pe->ratio}} %</span>
                                                <span style="display: inline-block; width: 45%; " > [ {{$pe->amount}} ] ريال </span>
                                            </div>
                                           
                                            <div class="col col-6">
                                                <input style="padding: .2em 1em; width: 100%; background: #e4e3e3; border: 0" type="taxt" name="brief" placeholder=" وقت أو سبب الاستحقاق " value="{{$pe->brief}}"> 
                                            </div>
                                            <div class="col col-2">
                                                <button class="btn btn-primary" type="submit">تحديث</button>
                                                <button class="btn btn-danger" type="button"><a style="color: inherit" href="{{ route('contract.payment.entry.delete', $pe->id) }}">حذف</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>

                            @endforeach
                        </ol>
                        <script>
                            let entryType = document.getElementById('type'), 
                            ratio = document.getElementById('ratio'),
                            amount = document.getElementById('amount');
                            function calculateRatio (el) {
                                ratio.value = (el.value/el.getAttribute('data-ctp')*100).toFixed(2);
                            }

                            function calculateAmount (el) {
                                // console.log(el.value);
                                console.log(el.getAttribute('data-ctp'));
                                amount.value = (el.value*el.getAttribute('data-ctp')/100).toFixed(2);
                            }
                            

                            
                        </script>
                    </div>
                    @elseif ($tab == 4)
                    <div class="tab-pane fade show active" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="1">
                        <h4>
                            الشروط الإضافية</h4>
                    </div>
                    @endif
                
                    
                </div>
                
            </fieldset>
        </div>
    </div>
  

    </div>
@endsection
@section('script')
    <script type="text/javascript">

    

</script>

<script>
    let buttons=document.querySelectorAll('nav div button');
    buttons.forEach(element => {
        element.addEventListener('click', function () {
            document.querySelector('nav button.active').classList.remove('active');
            this.classList.add('active')
            document.querySelector('.tab-pane.active').classList.remove('show')
            document.querySelector('.tab-pane.active').classList.remove('active')
            document.querySelector(this.getAttribute('data-bs-target')).classList.add('active');
            document.querySelector(this.getAttribute('data-bs-target')).classList.add('show');
        })
    });


</script>

@endsection
