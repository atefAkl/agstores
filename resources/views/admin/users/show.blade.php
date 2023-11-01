@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') المستخدمين @endsection
@section('homeLinkActive') بيانات المستخدم @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('users.home') }}">
        <span class="btn-title">العودة إلى الرئيسية</span>
        <i class="fa fa-home text-light"></i></a>
    </button>

@endsection
@section('content')
<style>
    
</style>
<div class="container" style="min-height: 100vh">
    <fieldset  dir="rtl" class="m-3 mt-5" >
        <legend style="right: 20px; left: auto">تعديل بيانات عقد </legend>
        <br> 
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border: 0">
                <button class="nav-link {{$tab == 1 ? 'active':''}}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                    <a href="{{route('users.show', [$user->id, 1])}}"> البيانات الأساسية </a>
                </button>
                <button class="nav-link {{$tab == 2 ? 'active':''}}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> 
                    <a href="{{route('users.show', [$user->id, 2])}}"> البيانات الإضافية</a> 
                </button>
                <button class="nav-link {{$tab == 3 ? 'active':''}}" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                    <a href="{{route('users.show', [$user->id, 3])}}"> الصلاحيات </a> 
                </button>
                <button class="nav-link {{$tab == 4 ? 'active':''}}" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">
                    <a href="{{route('users.show', [$user->id, 4])}}"> أيام العمل </a> 
                </button>
            </div>
        </nav>
       
        <div class="tab-content" id="nav-tabContent" style="">
            @if ($tab == 1)
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <h4>البيانات الأساسية </h4>

                <form action="{{ route('users.update') }}" method="post">

                    @csrf
                    <div class="input-group mt-3">
                        <label for="firstName" class="input-group-text required">الاسم الأول</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" required value="{{ old('firstName') }}">
                        <label for="lastName" class="input-group-text required">اسم العائلة</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" required value="{{ old('lastName') }}">
                        <label for="title" class="input-group-text"> اللقب </label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="input-group mt-3">
                        
                        <label for="profession" class="input-group-text required">الوظيفة</label>
                        <select name="profession" id="profession" class="form-control" required value="{{ old('profession') }}">
                            <option hidden>حدد الوظيفة</option>
                            @foreach ($professions as $p => $profession)
                            <option value="{{$p}}">{{$profession[1]}}</option>
                            @endforeach
                        </select>
                        <label for="gender" class="input-group-text">النوع</label>
                        <select name="gender" id="gender" class="form-control" value="{{ old('gender') }}">
                            <option hidden>اختر الجنس</option>
                            <option value="1">ذكر</option>
                            <option value="0">أنثى</option>
                        </select>
                        <label for="dob" class="input-group-text required">تاريخ الميلاد</label>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="اسم المستخدم" required value="{{ old('dob') }}">
                    </div>
        
                    <div class="input-group mt-3">
                        <label for="phone" class="input-group-text">رقم الهاتف</label>
                        <input type="text" name="phone" id="dob" class="form-control" value="{{ old('phone') }}">
                        <label for="natId" class="input-group-text required">رقم الهوية</label>
                        <input type="text" name="natId" id="natId" class="form-control" required value="{{ old('natId') }}">
                    </div>
        
                    <br>
                    <div style="display: flex; flex-direction: row-reverse">
                        <button class="btn btn-success" type="submit" id="submitBtn">تحديث بياناتى</button>
                    </div>
                    
                </form>
                    
               
            </div>
            @elseif ($tab == 2)
            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="1" style="position: relative">
                <h4>
                   بيانات الحساب
                </h4>

                <form action="{{ route('users.update') }}" method="PUT">
                    <div class="input-group mt-3">
                        <label for="userName" class="input-group-text required">اسم المستخدم</label>
                        <input type="text" name="userName" id="userName" class="form-control" required value="{{ old('userName') }}">
                        <label for="email" class="input-group-text required required">البريد الالكترونى</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" required>
                        <label for="password" class="input-group-text required">كلمة المرور</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="اتركها فارغة اذا كنت لا تريد التغيير" required>
                    </div>
                    <br>
                    <div style="display: flex; flex-direction: row-reverse">
                        <button class="btn btn-success" type="submit" id="submitBtn">تحديث بياناتى</button>
                    </div>
                </form>
                
               
            </div>


            @elseif ($tab == 3)
            <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="1">
                <h4> الصلاحيات</h4>
            </div>
        
            @elseif ($tab == 4)
            <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="1">
                <h4> أيام العمل </h4>
            </div>
            @endif
            
        </div>
        
    </fieldset>

</div>
@endsection


@section('script')
@endsection
