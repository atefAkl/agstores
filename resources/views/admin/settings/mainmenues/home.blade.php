@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') الأدوار @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    
    <button class="btn btn-sm btn-primary"><a href="{{ route('mainmenues.create') }}">
        <span class="btn-title"> إضافة قائمة رئيسية جديدة </span>
        <i class="fab fa-elementor text-light"></i></a>
        {{-- <i class="fab fa-elementor"></i> --}}
    </button>

    <button class="btn btn-sm btn-primary"><a href="{{ route('users.home') }}">
        <span class="btn-title">العودة للمستخدمين</span>
        <i class="fa fa-users text-light"></i></a></button>
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
                    <th> اسم القائمة </th>
                    <th> القوائم الفرعية </th>
                    {{-- <th> الحالة </th> --}}
                
                    <th><i class="fa fa-cogs"></i></th>
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
                    <td class="d-grid gap-1">
                        <button type="button" class="btn text-primary ediMenuBtn "
                            data-bs-toggle="modal" data-bs-target="#editMenu" 
                            data-bs-id="{{$menu->id}}" 
                            data-bs-name="{{$menu->name}}"
                            data-bs-status="{{$menu->status}}"
                        >

                            <i data-bs-toggle="tooltip" data-bs-title="تعديل اسم القائمة" class="fa fa-edit"></i>
                        </button>
                        <a class="  " href="{{route('submenues.create', [$menu->id])}}" >
                            <i data-bs-toggle="tooltip" data-bs-title="إضافة قائمة فرعية" class="text-success fas fa-caret-square-down py-0"></i>
                            
                        </a>
                        <a class=" " href="{{route('mainmenues.destroy', [$menu->id])}}" >
                            <i data-bs-toggle="tooltip" data-bs-title="إزالة القائمة" class="text-danger fa fa-trash py-0"></i>
                        </a>
                        
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
                            <label for="menuStatus" class="input-group-text required"> حالة التفعيل: </label>
                            <select name="status" id="menuStatus" class="form-control"  value=""> 
                                <option value="1">مفعلة</option>
                                <option value="0">معطلة</option>
                            </select>
                        </div>
                       
                        <div style="">
                            <br>
                            <button id="editMenuDismissBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            <button class="btn btn-success" type="submit" id="submitBtn"> تحديث البيانات  </button>
                        </div>
                        <div class="alert alert-sm px-3 py-1 alert-secondary float-right d-inline-block text-info mt-3 text-right">( <span style="color: red">*</span> ) تشير إلى حقول مطلوبة.</div>
                    </form>
                </div>
                <div class="modal-footer">
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection


@section('script')

<script>

    $('.ediMenuBtn').click(function () {
        $('#menuName').attr('value', $(this).attr('data-bs-name'))
        $('#hiddenInputId').attr('value', $(this).attr('data-bs-id'))
        $('#menuStatus option').removeAttr('selected')
        $('#menuStatus option[value='+$(this).attr('data-bs-status')+']').attr('selected', '')
    });

</script>
@endsection
