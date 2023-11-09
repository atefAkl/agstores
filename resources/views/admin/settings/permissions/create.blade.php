@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') الصلاحيات @endsection
@section('homeLinkActive') إضافة صلاحية جديدة @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('permissions.home') }}"
        data-bs-toggle="tooltip" data-bs-title="العودة إلى الإجراءات" 
        >
            <i class="fab fa-artstation"></i> 
        </a>   
    </button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('submenues.home') }}"
        data-bs-toggle="tooltip" data-bs-title="العودة إلى القوائم الفرعية">
            <i class="fa fa-arrow-left text-light"></i>
        </a>
    </button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('mainmenues.home') }}"
        data-bs-toggle="tooltip" data-bs-title="العودة إلى القوائم الرئيسية">
            <i class="fa fa-home text-light"></i>
        </a>
    </button>

@endsection
@section('content')

<div class="container" style="min-height: 100vh">
    <fieldset >
        <legend>إضافة صلاحية جديدة </legend>
        
        <form action="{{ route('permissions.store') }}" method="post">

            @csrf
            
             <div class="input-group mt-3">
                 <label for="main_menu" class="input-group-text required"> القائمة الرئيسية: </label>
                 <select name="main_menu" id="main_menu" class="form-control text-right">>
                     <option hidden>اختر القائمة الرئيسية</option>
                     @foreach ($mainmenues as $i => $item)
                     <option {{ $menu_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                     @endforeach
                 </select>
                 <label for="sub" class="input-group-text required"> القائمة الفرعية: </label>
                 <select name="sub_menu" id="sub" class="form-control text-right">>
                     <option hidden>اختر القائمة الفرعية</option>
                     @foreach ($submenues as $ii => $item)
                     <option {{ $submenu_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                     @endforeach
                 </select>
             </div>

            <div class="input-group mt-3">
                <label for="name" class="input-group-text required">اسم الصلاحية:</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
           
                <label for="link" class="input-group-text required"> رابط الصلاحية: </label>
                <input type="text" name="link" id="link" class="form-control" required value="{{ old('link') }}">
                
            </div>

            <div class="input-group mt-3">
                <label for="status" class="input-group-text required"> حالة التفعيل: </label>
                <select name="status" id="status" class="form-control"> 
                    <option value="1"> مفعلة </option>
                    <option value="0"> معطلة </option>
                </select>

                <button id="dismiss_btn" class="btn btn-info input-group-text" 
                onclick="window.location='{{route('mainmenues.home')}}'" type="button">إلغاء</button>
                <button class="btn btn-success input-group-text" type="submit">تسجيل إجراء جديد</button>
            </div>
 
        </form>
        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right">( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
    </fieldset>

</div>
@endsection


@section('script')
<script>

</script>
@endsection
