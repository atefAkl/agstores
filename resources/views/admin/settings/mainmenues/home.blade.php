@extends('layouts.admin')
@section('title') لوحة التحكم @endsection
@section('homeLink') القوائم الرئيسية @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    
    <button class="btn btn-sm btn-primary"><a href="{{ route('mainmenues.create') }}" 
        data-bs-toggle="tooltip" data-bs-title="إضافة قائمة جديدة">
        <i class="fab fa-elementor text-light"></i></a>
        {{-- <i class="fab fa-elementor"></i> --}}
    </button>

    
@endsection
@section('content')
<style>

</style> 
<div class="container pt-4" style="min-height: 100vh">
    <fieldset class="pt-5">
        <legend> القوائم الرئيسية </legend>
        @error('name')
        
        <div class="error alert alert-warning alert-dismissible fade show text-right">{{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        @enderror
        <table dir="rtl" class="striped" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="min-width: 200px"> اسم القائمة </th>
                    <th> القوائم الفرعية </th>
                    {{-- <th> الحالة </th> --}}
                
                    <th style="min-width: 80px"><i class="fa fa-cogs"></i></th>
                </tr>
            </thead>
            <tbody>
                @if (count($mainMenues)) @php $i=0 @endphp @foreach($mainMenues as $ui => $menu) 
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>
                        <ul class="d-flex flex-wrap gap-1" style="font-size: 12px">
                                                      
                        @foreach ( $menu->subMenues as $sm => $subMenu)
                        <li class="list-group-item my-1 py-0">
                            <span class="fw-normal fs-6">{{ $subMenu->name }}</span>
                            <a data-bs-toggle="tooltip" data-bs-title="عرض القائمة الفرعية" href="{{route('submenues.show', [$subMenu->id])}}"><i class="text-primary fa fa-eye"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-title="حذف القائمة الفرعية" href="{{route('submenues.destroy', [$subMenu->id])}}"><i class="text-danger fa fa-trash"></i></a>
                        </li>
                        @endforeach
                        </ul>
                        
                    
                    </td>
                    {{-- <td >
                        <div class="swatches">
                            <span class="status-off {{ !$menu->status ? 'active' : '' }}"><i class="fa fa-check"></i></span>
                            <span class="status-on {{ $menu->status ? 'active' : '' }}"><i class="fa fa-times"></i></span>
                          </div>
                    </td> --}}
                    <td class="">
                        <button type="button" class="btn px-0 text-primary ediMenuBtn "
                            data-bs-toggle="modal" data-bs-target="#editMenu" 
                            data-bs-id="{{$menu->id}}" 
                            data-bs-name="{{$menu->name}}"
                            data-bs-link="{{$menu->menu_link}}"
                            data-bs-status="{{$menu->status}}"
                        >

                            <i data-bs-toggle="tooltip" data-bs-title="تعديل اسم القائمة" class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn px-0 text-primary addSubMenu"
                            data-bs-toggle="modal" data-bs-target="#addSubMenu" 
                            data-bs-id="{{$menu->id}}" 
                            data-bs-name="{{$menu->name}}"
                        >

                            <i data-bs-toggle="tooltip" data-bs-title="إضافة قائمة فرعية" class="text-success fas fa-caret-square-down"></i>
                        </button>
                        
                        <button type="button" class="btn px-0 text-danger deleteMenu">
                            <a class=" " href="{{route('mainmenues.destroy', [$menu->id])}}" >
                                <i onclick="return confirm('تحذير! \r سوف يؤدى هذا الإجراء إلى حذف هذه القائمة والقوائم الفرعية وكل الاجراءات التابعة لهذه القوائم؛ هل تريد الاستمرار؟.')" 
                                data-bs-toggle="tooltip" data-bs-title="إزالة القائمة" class="text-danger fa fa-trash py-0"></i>
                            </a>
                        </button>
                        
                    </td>
                </tr>
               
                 
                @endforeach
                @else
                <tr>
                    <td colspan="8">لم يتم بعد تسجيل أية قوائم حتى الان <a href="{{ route('mainmenues.create') }}"> قم بإضافة أول القوائم الرئيسية فى هذا التطبيق! </a></td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $mainMenues->links() }}
    </fieldset>

    {{-- Modals --}}
    {{-- Edit Menu Details form--}}
    <div class="modal fade" id="editMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header mx-0 bg-secondary" style="background-color: #777"> 
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> تعديل بيانات القائمة </h1>
                    <button type="button" class="button-close ml-1 my-1 p-1" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                </div>

                <div class="modal-body">
                    <form id="editMenuForm" action="{{ route('mainmenues.update') }}" method="post">
        
                        @csrf
                        <input type="hidden" name="menuId" id="hiddenInputId">
                        
                        <div class="input-group mt-3">
                            <label for="menuName" class="input-group-text required">اسم القائمة:</label>
                            <input type="text" name="name" id="menuName" class="form-control" required value="">
                        </div>
                        
                        <div class="input-group mt-3">
                            <label for="menu_link" class="input-group-text required">رابط القائمة:</label>
                            <input type="text" name="menu_link" id="menu_link" class="form-control" required value="">
                        </div>
                        
                        <div class="input-group mt-3">
                            <label for="menuStatus" class="input-group-text required"> حالة التفعيل: </label>
                            <select name="status" id="menuStatus" class="form-control"  value=""> 
                                <option value="1">مفعلة</option>
                                <option value="0">معطلة</option>
                            </select>
                        </div>
                       
                        <div style="">
                            <br>
                            <button id="editMenuDismissBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal"> إغلاق</button>
                            <button class="btn btn-success" type="submit" id="submitBtn"> تحديث البيانات  </button>
                        </div>

                        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right"> العلامة ( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
                    </form>
                </div>
            </div>
        </div>
    </div> {{-- Edit Menu Details Form --}}

    {{-- Add New submenu form --}}
    <div class="modal fade" id="addSubMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header mx-0 bg-secondary" style="background-color: #777"> 
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> تعديل بيانات القائمة </h1>
                    <button type="button" class="button-close ml-1 my-1 p-1" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('submenues.store') }}" method="post">

                        @csrf
                        
                        <div class="input-group mt-3">
                            <label for="name" class="input-group-text required">اسم القائمة الفرعية:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                        </div>

                        <div class="input-group mt-3">
                            <label for="menu_link" class="input-group-text required"> رابط القائمة الفرعية:</label>
                            <input type="text" name="menu_link" id="menu_link" class="form-control" required value="{{ old('name') }}">
                        </div>
                    
                        <div class="input-group mt-3">
                            <label for="main_menu" class="input-group-text required"> القائمة الرئيسية: </label>
                            <select name="main_menu" id="main_menu_name" class="form-control text-right">>
                                <option value="" selected></option>
                                
                            </select>
                        </div>
                    
                        <div class="input-group mt-3">
                            <label for="menu_status" class="input-group-text required"> حالة التفعيل: </label>
                            <select name="status" id="menu_status" class="form-control"> 
                                <option value="1"> مفعلة </option>
                                <option value="0"> معطلة </option>
                            </select>
                            
                            <button class="btn btn-success input-group-text" type="submit">تسجيل قائمة جديدة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> {{--Add New submenu form--}}
</div>

</div>
@endsection


@section('script')

<script>

    $('.ediMenuBtn').click(function () {
        $('#menuName').attr('value', $(this).attr('data-bs-name'))
        $('#hiddenInputId').attr('value', $(this).attr('data-bs-id'))
        $('#menu_link').attr('value', $(this).attr('data-bs-link'))
        $('#menuStatus option').removeAttr('selected')
        $('#menuStatus option[value='+$(this).attr('data-bs-status')+']').attr('selected', '')
    });

    $('.addSubMenu').click(function () {
        $('select#main_menu_name option').attr('value', $(this).attr('data-bs-id'))
        $('select#main_menu_name option:first-child').text( $(this).attr('data-bs-name')) 
    });

</script>
@endsection
