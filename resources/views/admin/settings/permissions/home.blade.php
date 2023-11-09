@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') الإجراءات @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    
    <button class="btn btn-sm btn-primary"><a href="{{ route('permissions.create', [0,0]) }}">
        <span class="btn-title"> إضافة إجراء جديدة </span>
        <i class="fas fa-plus-circle text-light"></i></a>
    </button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('users.home') }}">
        <span class="btn-title">العودة للمستخدمين</span>
        <i class="fa fa-users text-light"></i></a></button>
@endsection
@section('content')
<style>
    
</style> 
<div class="container" style="min-height: 100vh">
    <fieldset>
        <legend> قائمة الإجراءات </legend>
        <table dir="rtl" class="striped mt-4" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th> اسم الإجراء </th>
                    <th> القائمة الرئيسية </th>
                    <th> القائمة الفرعية </th>
                    <th> رابط الإجراء </th>
                    <th> الحالة </th>
                
                    <th><i class="fa fa-cogs"></i></th>
                </tr>
            </thead>
            <tbody>
                @if (count($permissions)) @php $i=0 @endphp @foreach($permissions as $pi => $permission) 
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->main_menu_name }}</td>
                    <td>{{ $permission->sub_menu_name }}</td>
                    <td>{{ $permission->permission_link }}</td>
                    <td>{{ $permission->status }}</td>
                    
                   
                    
                    <td>
                        <a href="{{route('permissions.edit',  $permission->id)}}"><i class="text-primary fa fa-edit" title="تعديل بيانات الغميل"></i></a>
                        <a href="{{route('permissions.destroy', $permission->id)}}" ><i onclick="return confirm('هل تريد حذف هذا العميل بالفعل؟، هذه الحركة لا يمكن الرجوع عنها.')" 
                            class="text-danger fa fa-trash" title="حذف العميل"></i></a>
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
        {{ $permissions->links() }}
    </fieldset>

</div>
@endsection


@section('script')
@endsection
