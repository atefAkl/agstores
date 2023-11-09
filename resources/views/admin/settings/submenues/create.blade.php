@extends('layouts.admin')
@section('title') القوائم الفرعية @endsection
@section('homeLink') الأدوار @endsection
@section('homeLinkActive') إضافة قائمة فرعية جديدة @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('submenues.home') }}">
        <span class="btn-title">العودة إلى القوائم الفرعية</span>
        <i class="fas fa-arrow-left"></i>
    </button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('mainmenues.home') }}">
        <span class="btn-title">العودة إلى القوائم الرئيسية</span>
        <i class="fa fa-home text-light"></i></a>
    </button>
    
@endsection
@section('content')
<style>
    
</style>
<div class="container" style="min-height: 100vh">
    <fieldset>
        <legend>إضافة قائمة فرعية جديدة </legend>
        
        <form action="{{ route('submenues.store') }}" method="post">

            @csrf
            <div class="input-group mt-3">
                <label for="name" class="input-group-text required">اسم القائمة الفرعية:</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
           
                <label for="menuStatus" class="input-group-text required"> حالة التفعيل: </label>
                <select name="status" id="menuStatus" class="form-control"> 
                    <option value="1"> مفعلة </option>
                    <option value="0"> معطلة </option>
                </select>
                
            </div>
           
            <div class="input-group mt-3">
                <label for="main_menu" class="input-group-text required"> القائمة الرئيسية: </label>
                <select name="main_menu" id="main_menu" class="form-control text-right">>
                    <option hidden>اختر القائمة الرئيسية</option>
                    @foreach ($mainmenues as $i => $item)
                    <option {{ $mainMenuId == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <button id="dismiss_btn" class="btn btn-info input-group-text" 
                onclick="window.location='{{route('mainmenues.home')}}'" type="button">إلغاء</button>
                <button class="btn btn-success input-group-text" type="submit">تسجيل قائمة جديدة</button>
            </div>
 
        </form>
        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right">( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
    </fieldset>

</div>
@endsection


@section('script')
@endsection
