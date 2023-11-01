@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') الأدوار @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    
    <button class="btn btn-sm btn-primary"><a href="{{ route('mainmenues.create') }}">
        <span class="btn-title"> إضافة قائمة جديدة </span>
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
        <legend> قائمة الأدوار </legend>
        <table dir="rtl" class="striped mt-4" style="width: 100%">
            <thead>
                <tr class="text-center"  style="display: grid; grid-template-columns: 8% 56% 14% 22%">
                    <th>مسلسل</th>
                    <th colspan="5"> اسم الدور </th>
                    <th > الحالة </th>
                
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @if (count($rules)) @php $i=0 @endphp @foreach($rules as $ui => $rule) 
                <tr  style="display: grid; grid-template-columns: 8% 56% 14% 22%">
                    <td>{{ ++$i }}</td>
                    <td colspan="5">{{ $rule->name }}</td>
                    <td >{{ $rule->status ? 'مفعل' : 'معطل' }}</td>
                   
                    
                    <td>
                        <a href="{{route('users.show', [$rule->id, 1])}}"><i class="fa fa-eye" title="عرض بيانات العميل"></i></a>
                        <a href="{{route('mainmenues.edit',  $rule->id)}}"><i class="fa fa-edit" title="تعديل بيانات الغميل"></i></a>
                        <a href="{{route('mainmenues.destroy', $rule->id)}}" onclick="return confirm('هل تريد حذف هذا العميل بالفعل؟، هذه الحركة لا يمكن الرجوع عنها.')"><i class="fa fa-trash" title="حذف العميل"></i></a>
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
        {{ $rules->links() }}
    </fieldset>

</div>
@endsection


@section('script')
@endsection
