@extends('layouts.admin')
@section('title') تصنيفات المبيعات @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') تصنيفات المبيعات @endsection
@section('homeLinkActive') إضافة تصنيف جديد @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('tables.home') }}"><span class="btn-title">العودة للرئيسية</span><i class="fa fa-home text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('items.setting') }}"><span class="btn-title">الاعدادات</span><i class="fa fa-cogs text-light"></i></a></button>
@endsection
@section('content')
    <div class="container">
        <div class="border p-3 ">
            <fieldset  dir="rtl" onload="initWork()">
                <legend class="">إضافة طبلية جديدة</legend>
                <form class="p-3 m-3 mt-5" id="regForm" action="{{ route('table.store') }}" method="post">
                    @csrf
                    <style>
                        table tr td {border-left: 0 !important; font-weight: bolder;}
                        table tr td input {display: inline-block; width: 80%; background-color: transparent; border: 1px solid transparent; border-bottom-color: #777; margin: 0 16px}
                    </style>
                    <table class=" w-100">
                        <tr>
                            <td class="text-left">رقم الطبلية:</td>
                            <td><input type="text" name="name" id="tableNumber" value="{{old('name')}}" required></td>
                            <td class="text-left">الحجم:</td>
                            <td>
                                <select  name="size" id="tableSize">
                                    <option {{ old('size')== 1 ? 'selected' : ''}} value="1">صغيرة</option>
                                    <option {{ old('size')== 2 ? 'selected' : ''}} value="2">كبيرة</option>
                                    <option {{ old('size')== 3 ? 'selected' : ''}} value="3">وسط</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">الرقم المسلسل:</td>
                            <td><input type="text" name="serial" id="serial_number" value="{{old('serial')}}"></td>
                            <td class="text-left">السعة:</td>
                            <td><input type="text" name="capacity" id="capacity" value="{{old('capacity')}}"></td>
                        </tr>
                    </table>
                    <!-- One "tab" for each step in the form: -->
                    <div style="">
                        <br>
                        <button id="dismiss_btn" class="btn btn-info" 
                        onclick="window.location='{{route('tables.home')}}'" type="button" id="submitBtn">إلغاء</button>
                        <button class="btn btn-success" type="submit" id="submitBtn">إدراج</button>
                    </div>
                    @error('name')
                        <div class="alert alert-sm text-danger">{{$message}}</div>
                    @enderror

                    @error('serial')
                        <div class="alert alert-sm text-danger">{{$message}}</div>
                    @enderror
                </form>
            </fieldset>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let tableNumber = document.getElementById('tableNumber');
        window.onload = tableNumber.focus();
        const serialNumber = document.getElementById('serial_number');
        const capacity = document.getElementById('capacity');
        tableNumber.addEventListener('keyup', function () {
            if(parseInt(this.value)>=3000) {
                tableSize.value=2; capacity.value=286
            } else {
                tableSize.value=1; capacity.value=221
            }
            serialNumber.value = '45000'+this.value

        })
    </script>
@endsection
