@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') الإجراءات @endsection
@section('homeLinkActive') تعديل بيانات إجراء @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('rules.home') }}">
        <span class="btn-title">العودة إلى الأدوار</span>
        <i class="fa fa-home text-light"></i></a>
    </button>

@endsection
@section('content')
<style>
    
</style>
<div class="container" style="min-height: 100vh">
    <fieldset>
        <legend>تحديث بيانات الإجراء</legend>
        
        <form action="{{ route('permissions.update') }}" method="post">

            @csrf
            <input type="hidden" name="id" value="{{$permission->id}}">
            
            
            <div class="input-group mt-3">
                <label for="main_menu" class="input-group-text required"> القائمة الرئيسية: </label>
                <label class="form-control text-right">{{$mainMenu->name}}</label>
                <label for="sub" class="input-group-text required"> القائمة الفرعية: </label>
                <label class="form-control  text-right">{{$subMenu->name}}</label>
            </div>

            <div class="input-group mt-3">
                <label for="name" class="input-group-text required">اسم الصلاحية:</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ $permission->name }}">
        
                <label for="link" class="input-group-text required"> رابط الصلاحية: </label>
                <input type="text" name="link" id="link" class="form-control" required value="{{ $permission->permission_link }}">
                
            </div>

            <div class="input-group mt-3">
                <label for="status" class="input-group-text required"> حالة التفعيل: </label>
                <select name="status" id="status" class="form-control"> 
                    <option {{ $permission->status ? 'selected' : '' }} value="1"> مفعلة </option>
                    <option {{ !$permission->status ? 'selected' : '' }} value="0"> معطلة </option>
                </select>


                <button class="btn btn-success input-group-text" type="submit"> تحديث البيانات </button>
            </div>

        </form>
        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right">( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
    </fieldset>

</div>
@endsection


@section('script')
@endsection
