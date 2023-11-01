@extends('layouts.admin')
@section('title') القوائم الفرعية @endsection
@section('homeLink') الأدوار @endsection
@section('homeLinkActive') إضافة قائمة فرعية جديدة @endsection
@section('links')
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
           
                <label class="input-group-text required">الحالة:</label>
                
                <label class="input-group-text px-3 text-center">
                    <input type="radio" name="status" id="status_ok" class="" {{ old('status') ? 'checked':'' }} value="1">
                </label>
                
                <label for="status_ok" class="form-control text-right">مفعلة:</label>
                
                <label class="input-group-text px-3 text-center">
                    <input type="radio" name="status" id="status_stop" class="" {{ !old('status') ? 'checked':'' }} value="0">
                </label>
                
                <label for="status_stop" class="form-control text-right">معطلة:</label>
                
            </div>
           
            <div class="input-group mt-3">
                <label for="name" class="input-group-text required"> القائمة الرئيسية: </label>
                <select name="main_menu" id="main_menu" class="form-control text-right">>
                    <option hidden>اختر القائمة الرئيسية</option>
                    @foreach ($mainmenues as $i => $item)
                    <option {{ old('main_maenu') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            
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
