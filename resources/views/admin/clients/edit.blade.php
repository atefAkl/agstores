@extends('layouts.admin')
@section('title') العملاء @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') العملاء @endsection
@section('homeLinkActive') تعديل بيانات عميل @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('items.cats.home') }}"><span class="btn-title">Go Home</span><i class="fa fa-home text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('items.setting') }}"><span class="btn-title">Settings</span><i class="fa fa-cogs text-light"></i></a></button>
@endsection
@section('content')
    <div class="container">
        <div class="border">
            <fieldset  dir="rtl" onload="initWork()">
                <legend class=""> تعديل بيانات عميل </legend>
                <form class="p-3" id="regForm" action="{{ route('clients.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$client->id}}">
                    <style>
                        table tr td {border-left: 0 !important; font-weight: bolder;}
                        table tr td input {display: inline-block; width: 80%; background-color: transparent; border: 1px solid transparent; border-bottom-color: #777; margin: 0 16px}
                    </style>
                    <table class=" w-100">
                        <tr>
                            <td class="text-left">اسم العميل:</td>
                            <td><input type="text" name="name" id="" value="{{$client->name}}"></td>
                            <td class="text-left">نوع العميل:</td>
                            <td>
                                <select name="scope" id="" style="width: 80%">
                                    <option hidden>حدد نوع العميل</option>
                                    @foreach ($scope as $index => $value)
                                    <option {{ $client->scope == $index ? 'selected' : '' }} value="{{ $index }}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">الرقم المسلسل:</td>
                            <td><input type="text" name="s_number" id="" value="{{$client->s_number}}"></td>
                            <td class="text-left">الموقع الالكترونى:</td>
                            <td><input type="text" name="website" id="" value="{{$client->website}}"></td>
                        </tr>
                        <tr>
                            <td class="text-left">البريد الالكترونى:</td>
                            <td><input type="text" name="email" id="" value="{{$client->email}}"></td>
                            <td class="text-left">الهاتف:</td>
                            <td><input type="text" name="phone" id="" value="{{$client->phone}}"></td>
                        </tr>
                        <tr>
                            <td class="text-left">السجل التجارى:</td>
                            <td><input type="text" name="cr" id="" value="{{$client->cr}}"></td>
                            <td class="text-left">الرقم الضريبى:</td>
                            <td><input type="text" name="vat" id="" value="{{$client->vat}}"></td>
                        </tr>
                        <tr>
                            <td class="text-left">الممثل:</td>
                            <td><input type="text" name="person" id="" value="{{$client->person}}"></td>
                            <td class="text-left">الإقامة:</td>
                            <td><input type="text" name="iqama" id="" value="{{$client->iqama}}"></td>
                        </tr>
                        <tr>
                            <td class="text-left">العنوان:</td>
                            <td>
                                <input type="text" name="state" id="" value="{{$client->state}}" placeholder="المنطقة">
                            </td>
                            <td>
                                <input type="text" name="city" id="" value="{{$client->city}}" placeholder="المدينة">
                            </td>
                            <td>
                                <input type="text" name="street" id="" value="{{$client->street}}" placeholder="العنوان المفصل">
                            </td>
                            
                        </tr>
                    </table>
                    

                    <!-- One "tab" for each step in the form: -->
                    
                    <div style="">
                        <br>
                        <button id="dismiss_btn" class="btn btn-success" 
                        onclick="window.location='{{route('clients.home')}}'" type="button" id="submitBtn">إلغاء</button>
                        <button class="btn btn-secondary" type="submit" id="submitBtn">تحديث</button>
                    </div>
                    

                </form>
            </fieldset>
        </div>

        <div class="alterContext">
            <ul class="menu-items">
                <li class="context-menu-item">
                    Vew Category Items
                </li>
                <li class="context-menu-item">
                    Add New Category
                </li>
                <li class="context-menu-item">
                    Edit Category
                </li>
                <li class="context-menu-item">
                    Delete Category
                </li>
            </ul>
        </div>

    </div>

@endsection


@section('script')


    <script>
        $('.accordion-button i').click(function () {
            $(this).toggleClass('fa-folder-open fa-folder')
        })

        $('#Type').change(function(){
            if ($(this).val() == 1) {

            } else if ($(this).val() == 1) {

            }
        });

    </script>
@endsection
