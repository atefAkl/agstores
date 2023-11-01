@extends('layouts.admin')
@section('title') الإعدادات العامة @endsection
@section('homeLink') المستخدمين @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('users.create') }}">
        <span class="btn-title">إضافة مستخدم جديد</span>
        <i class="fa fa-user-plus text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('rules.home') }}">
        <span class="btn-title">إضافة دور جديد</span>
        <i class="fas fa-life-ring text-light"></i></a>
    </button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('contract.create', 0) }}">
        <span class="btn-title">إضافة عقد خدمات</span>
        <i class="fa fa-plus text-light"></i></a></button>
@endsection
@section('content')
<style>
    
</style>
<div class="container" style="min-height: 100vh">
    <fieldset>
        <legend>قائمة المستخدمين</legend>
        <table dir="rtl" class="striped mt-4" style="width: 100%">
            <thead>
                <tr class="text-center">
                    <th>مسلسل</th>
                    <th>الاسم</th>
                    <th>البريد</th>
                    <th>مسجل منذ</th>
                    <th>الوظيفة</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users)) @php $i=0 @endphp @foreach($users as $ui => $user) 
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->role }}</td>
                    
                    <td>
                        <a href="{{route('users.show', [$user->id, 1])}}"><i class="fa fa-eye" title="عرض بيانات العميل"></i></a>
                        <a href="{{route('users.edit',  $user->id)}}"><i class="fa fa-edit" title="تعديل بيانات الغميل"></i></a>
                        
                        <a href="{{route('users.delete', $user->id)}}" onclick="return confirm('هل تريد حذف هذا العميل بالفعل؟، هذه الحركة لا يمكن الرجوع عنها.')"><i class="fa fa-trash" title="حذف العميل"></i></a>
                    </td>
                </tr>
                
                @endforeach
                @else
                <tr>
                    <td colspan="7">لم يتم بعد تسجيل عملاء حتى الان <a href="{{ route('user.create') }}">أدخل عميلك الأول!</a></td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $users->links() }}
    </fieldset>

</div>
@endsection


@section('script')
@endsection
