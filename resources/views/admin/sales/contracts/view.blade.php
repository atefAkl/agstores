@extends('layouts.admin')
@section('title') العقود @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') العقود @endsection
@section('homeLinkActive') عرض تفاصيل العقد @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('contracts.home') }}"><span class="btn-title">Go Home</span><i class="fa fa-home text-light"></i></a></button>
    @if ($contract->status)
    <button class="btn btn-sm btn-primary">
        <a>
            <form id="park" action="{{ route('contract.park') }}" method="post"> @csrf
                <input type="hidden" name="id" value="{{$contract->id}}">
                <span class="btn-title">إيقاف العقد للتعديل</span>
                <i class="fa fa-box-open text-light" onclick=""></i>
            </form>
        </a>
    </button>
    @else
    <button class="btn btn-sm btn-primary">
        <a>
            <form id="approve" action="{{ route('contract.approve') }}" method="post"> @csrf
                <input type="hidden" name="id" value="{{$contract->id}}">
                <span class="btn-title">اعتماد العقد</span>
                <i class="fa fa-check text-light" onclick="$('#approve').submit()"></i>
            </form>
        </a>
    </button>
    @endif
    <button class="btn btn-sm btn-primary"><a href="{{ route('contracts.setting') }}"><span class="btn-title">Settings</span><i class="fa fa-cogs text-light"></i></a></button>
@endsection
@section('content')


<style>
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
            <legend style="right: 20px; left: auto"> بيانات العقد </legend>
            <br> 
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border: 0">
                    <button class="nav-link {{$tab == 1 ? 'active':''}}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> العقد </button>
                    <button class="nav-link {{$tab == 2 ? 'active':''}}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> 
                        <a href="{{route('contract.view', [$contract->id, 2])}}">السندات</a> 
                    </button>
                    <button class="nav-link {{$tab == 3 ? 'active':''}}" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                        <a href="{{route('contract.view', [$contract->id, 3])}}">تقارير الأصناف</a> 
                    </button>
                    <button class="nav-link {{$tab == 4 ? 'active':''}}" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">
                        <a href="{{route('contract.view', [$contract->id, 4])}}">تقارير الطبليات</a> 
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent" style="">
                <div class="tab-pane fade {{$tab == 1 ? 'show active':''}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="text-right">
                        <h4 class=""> عقد تأجير طبالى </h4>
                        بعون الله وتوفيقه، فى يوم 
                        <b>{{ $contract->in_day_greg }}</b>
                         م، الموافق 
                         <b>{{ $contract->in_day_hij}}</b>
                         ، قد اجتمع كل من:-<br>
                         <ol>
                            <li>
                                شركة <b>{{ $company->company }}</b> سجل تجاري <b>{{ $company->cr }}</b> ، ويمثلها المدير العام <b>{{$contractor->name}}</b>
                                 وعنوانه الوطنى: <b>{{ $company->state}} - {{$company->city}} - {{$company->street}}.</b>، هاتف جوال: <b>{{$company->phone}}</b>
                                 ، بريد الكتروني: <b>{{$company->email}}</b>  <span class="party float-left">طرف أول.</span>
                            </li>
                            <li>
                                <b>{{ $client->name }}</b>
                                ويمثلها: 
                                <b class="clientName">{{ $client->person }}</b>، سجل تجاري: <b class="clientCR">{{$client->cr}}</b>
                            </li>
                            <b></b>
                            
                            
                            <li> أصناف العقد </li>
                            <table class="w-100">
                                <tr><td>المادة</td><td>وحدة القياس</td><td>الكمية</td><td>سعر الوحدة</td><td>الخصم </td><td>الضريبة</td><td>الاجمالى</td><td></td></tr>
                                @if (count($receipts)) @php $num = 0 @endphp
                                @foreach ($receipts as $ii =>$doc)
                                <tr>
                                    <td>{{++$num}}</td>
                                    <td>{{$doc->serial}}</td>
                                    <td>{{$doc->day_in_hijri}}</td>
                                    <td>{{$doc->tax}}</td>
                                    <td>{{$doc->total_price}}</td>
                                    <td>
                                        <a ><i class="fa fa-edit"></i></a>
                                        <a href="{{route('contract.delete.item', $doc->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                               @endif
                            </table>
                            
                        </ol>
                    </div>
                </div>
                <div class="tab-pane fade {{$tab == 2 ? 'show active':''}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="1">
                    <h4 class=""> حركات الإدخال والاخراج التابعة للعقد </h4>
                    <form action="{{route('contract.additems')}}">
                        @csrf
                        <input type="hidden" name="contract" value="{{$contract->id}}">
                        
                       {{$receipts}}
                        <table class="w-100">
                            <tr><td>#</td>
                                <td> الرقم </td>
                                <td> تاريخ الادخال </td>
                                <td> السائق </td>
                                <td> ملاحظات </td>
                            </tr>
                            @if (count($receipts)) @php $docNum = 0 @endphp  
                            @foreach ($receipts as $ii =>$item)
                            <tr>
                                <td>{{++$docNum}}</td>
                                <td>{{str_pad($doc->serial, 6, '0', STR_PAD_LEFT)}}</td>
                                <td>{{$doc->day_in_hijri}}</td>
                                <td>{{$doc->driver}}</td>
                                <td>{{$doc->notes}}</td>
                                <td>
                                    <a ><i class="fa fa-edit"></i></a>
                                    <a href="{{route('contract.delete.item', [$doc->id,2])}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </form>
                </div>
                <div class="tab-pane fade {{$tab == 3 ? 'show active':''}}" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="1">
                    <h4 class="">  تفاصيل الأصناف وأحجام الكرتون </h4>
                </div>
                <div class="tab-pane fade {{$tab == 4 ? 'show active':''}}" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="1">
                    <h4 class="">
                        تفاصيل الطبليات أعداد وحمولة </h4>
                </div>
              </div>

        </fieldset>
    </div>
</div>
    <div class="container">
        <div class="border">
            
        </div>

    </div>

@endsection


@section('script')


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
