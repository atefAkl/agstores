@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') الأدوار @endsection
@section('homeLinkActive') إضافة دور جديد @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('mainmenues.home') }}">
        <span class="btn-title">العودة إلى الرئيسية</span>
        <i class="fa fa-home text-light"></i></a>
    </button>

@endsection
@section('content')
<style>
    
</style>
<div class="container" style="min-height: 100vh">
    <fieldset>
        <legend>قائمة رئيسية جديدة </legend>
        
        <form action="{{ route('mainmenues.store') }}" method="post">

            @csrf
            <div class="input-group mt-3">
                <label for="name" class="input-group-text required">اسم القائمة الرئيسية:</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            
            </div>
            <div class="input-group mt-3">
                <label class="input-group-text required">الحالة:</label>
                
                <label class="input-group-text px-3 text-center">
                    <input type="radio" name="status" id="status_ok" class="" {{ old('status') ? 'checked':'' }} value="true">
                </label>

                <label for="status_ok" class="form-control text-right">مفعلة:</label>

                <label class="input-group-text px-3 text-center">
                    <input type="radio" name="status" id="status_stop" class="" {{ !old('status') ? 'checked':'' }} value="false">
                </label>
                
                <label for="status_stop" class="form-control text-right">معطلة:</label>
            
            </div>
              
        

            <div style="">
                <br>
                <button id="dismiss_btn" class="btn btn-info" 
                onclick="window.location='{{route('mainmenues.home')}}'" type="button" id="submitBtn">إلغاء</button>
                <button class="btn btn-success" type="submit" id="submitBtn">تسجيل دور جديد</button>
            </div>
            
        </form>
        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right">( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
    </fieldset>

</div>
@endsection


@section('script')
@endsection