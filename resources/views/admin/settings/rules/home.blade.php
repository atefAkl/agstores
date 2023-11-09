@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') الأدوار @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    
    <button class="btn btn-sm btn-primary"><a href="{{ route('rules.create') }}">
        <span class="btn-title">إضافة دور جديد</span>
        <i class="fas fa-plus-circle text-light"></i></a>
    </button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('users.home') }}">
        <span class="btn-title">العودة للمستخدمين</span>
        <i class="fa fa-users text-light"></i></a></button>
@endsection
@section('content')
 
<div class="main text-right" style="min-height: 100vh">
    <div style="width: 90%; margin: 0 auto; padding-top: 1rem">
        
        <fieldset>
            <legend class="" style="padding: 1px 16px 1px 1px"> قائمة الأدوار 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="input-group-text d-inline-block" style="position: relative; left: -0px"  data-bs-toggle="modal" data-bs-target="#addNewMenu"><i class="fa fa-plus"></i></button>
            </legend>
            
            {{-- Generating Rules in accordion layout --}}
            <div class="accordion mt-5" id="rulesAccordion">
                @foreach ($rules as $r => $rule)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading_{{$r}}">
                        <button class="accordion-button {{$r>0?'collapsed':''}}" style="position: relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$r}}" aria-expanded="true" aria-controls="collapse_{{$r}}">
                        {{$rule->name}}
                        </button>
                    </h2>
                    <div id="collapse_{{$r}}" class="accordion-collapse  collapse {{$r==0?'show':''}}" aria-labelledby="heading_{{$r}}" data-bs-parent="#rulesAccordion">
                        <div class="accordion-body">
                            <div class="accordion" id="menues_accordion">
                                @if(!count($rule->menues)) 
                            <div class="alert alert-info alert-sm">
                                لا يوجد قوائم مضافة لهذا الدور
                            </div>
                            @else
                                @foreach ($rule->menues as $m => $menu)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="menu_heading_{{$m}}">
                                        <button class="accordion-button {{$m>0?'collapsed':''}}" 
                                            style="position: relative; background-color: #d4d4d4; padding: 0.5em 1em" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#menu_collapse_{{$m}}" aria-expanded="true" aria-controls="collapse_{{$r}}">
                                        {{$menu->menuName}}
                                        </button>
                                    </h2>
                                    <div id="menu_collapse_{{$m}}" class="accordion-collapse  collapse {{$m==0?'show':''}}" aria-labelledby="menu_heading_{{$m}}" data-bs-parent="#menues_accordion">
                                        <div class="accordion-body py-1 px-3">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet ratione id perferendis velit? Nobis, sint odio maxime dolorem ducimus in.
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            </div>
                            

                            <div class="text-left">
                                <button id="addNewMenutoRuleButton" type="button" 
                                    class="input-group-text d-inline-block addNewMenutoRuleButton mt-3" style="" 
                                    data-bs-toggle="modal" data-rule-id="{{$rule->id}}" 
                                    data-bs-target="#addNewMenutoRule">
                                    إضافة قائمة للدور&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                                
                        </div>
                    </div>
                </div>
                @endforeach
                
              </div>
            {{-- Generating Rules in accordion layout --}}

            {{ $rules->links() }}
        </fieldset>
        
    </div>
    
{{-- Modals --}}
   
      
    <!-- Adding new rule Modal -->
    <div class="modal fade" id="addNewMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header mx-0 bg-secondary" style="background-color: #777"> 
                    <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة أدوار</h1>
                    <button type="button" class="button-close ml-1 my-1 p-1" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rules.store') }}" method="post">
        
                        @csrf
                        <div class="input-group mt-3">
                            <label for="name" class="input-group-text required">اسم الدور:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                            
                        </div>
                       
                        <div style="">
                            <br>
                            <button id="dismiss_btn" class="btn btn-info" 
                            onclick="window.location='{{route('rules.home')}}'" type="button" id="submitBtn">إلغاء</button>
                            <button class="btn btn-success" type="submit" id="submitBtn">تسجيل دور جديد</button>
                        </div>
                        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right">( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Adding new menu to the rule Modal -->
    <div class="modal fade" id="addNewMenutoRule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header mx-0 bg-secondary" style="background-color: #777"> 
                    <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة قائمة رئيسية للدور</h1>
                    <button type="button" class="button-close ml-1 my-1 p-1" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rules.add.menu') }}" method="post">
        
                        @csrf

                        
                        <div class="input-group mt-3">
                            <label for="rule" class="input-group-text required"> اسم الدور: </label>
                            <select name="rule_id" id="rule_id_select" class="form-control" required>
                                @foreach ($rules as $r => $rule)
                                <option value="{{$rule->id}}">{{ $rule->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>

                        <div class="input-group mt-3">
                            <label for="name" class="input-group-text required">اسم القائمة الرئيسية:</label>
                            <select name="menu_id" id="menu_id_select" class="form-control" required>
                                @foreach ($menues as $m => $menu)
                                <option value="{{$menu->id}}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                       
                        <div style="">
                            <br>
                            <button id="dismiss_btn" class="btn btn-info" 
                            onclick="window.location='{{route('rules.home')}}'" type="button" id="submitBtn">إلغاء</button>
                            <button class="btn btn-success" type="submit" id="submitBtn">تسجيل دور جديد</button>
                        </div>
                        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right">( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection


@section('script')

    <script>
        $('.addNewMenutoRuleButton').click(function () {
           console.log($(this).attr('data-rule-id'))
            $('#addNewMenutoRule form select#rule_id_select').val( $(this).attr('data-rule-id'))
        });
    </script>

@endsection
