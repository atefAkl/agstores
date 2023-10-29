@extends('layouts.admin')
@section('title') Items Categories @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') Items Categories @endsection
@section('homeLinkActive') Create New @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('items.cats.home') }}"><span class="btn-title">Go Home</span><i class="fa fa-plus text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('items.setting') }}"><span class="btn-title">Settings</span><i class="fa fa-cogs text-light"></i></a></button>
@endsection
@section('content')
    <div class="container">
        <div class="border p-3 ">
            <fieldset  dir="rtl" onload="initWork()">
                <legend class="">إضافة طبلية جديدة</legend>
                <form class="p-3 m-3 mt-5" id="regForm" action="{{ route('table.update') }}" method="post">
                    @csrf
                    <style>
                        table tr td {border-left: 0 !important; font-weight: bolder;}
                        table tr td input {display: inline-block; width: 80%; background-color: transparent; border: 1px solid transparent; border-bottom-color: #777; margin: 0 16px}
                    </style>
                    <input type="hidden" name="id" value="{{$t->id}}">
                    <table class=" w-100">
                        <tr>
                            <td class="text-left">رقم الطبلية:</td>
                            <td><input type="text" name="name" id="" value="{{$t->name}}"></td>
                            <td class="text-left">الحجم:</td>
                            <td>
                                <select  name="size" id="">
                                    <option {{ $t->size== 1 ? 'selected' : ''}} value="1">صغيرة</option>
                                    <option {{ $t->size== 2 ? 'selected' : ''}} value="2">كبيرة</option>
                                    <option {{ $t->size== 3 ? 'selected' : ''}} value="3">وسط</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">الرقم المسلسل:</td>
                            <td><input type="text" name="serial" id="" value="{{$t->serial}}"></td>
                            <td class="text-left">السعة:</td>
                            <td><input type="text" name="capacity" id="" value="{{$t->capacity}}"></td>
                        </tr>
                    </table>
                    

                    <!-- One "tab" for each step in the form: -->
                    
                    <div style="">
                        <br>
                        <button id="dismiss_btn" class="btn btn-info" 
                        onclick="window.location='{{route('tables.home')}}'" type="button" id="submitBtn">العودة</button>
                        <button class="btn btn-success" type="submit" id="submitBtn">تحديث البيانات</button>
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
    <script type="text/javascript" src="{{ asset('assets/admin/js/treasury/search.datatables.js') }}"></script>
@endsection
