@extends('layouts.admin')
@section('title') العملاء @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') العملاء @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('clients.create') }}"><span class="btn-title">add item</span><i class="fa fa-plus text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('items.setting') }}"><span class="btn-title">Settings</span><i class="fa fa-cogs text-light"></i></a></button>
@endsection
@section('content')

    <div class="container">
        <div class="search">
            <form method="POST">
                <div class="row mb-3">
                    <div class="col col-5">
                        <div class="input-group">
                            <label for="aj_search" class="input-group-text"><i class="fa fa-search"></i></label>
                            <input type="text" data-search-token="{{ csrf_token() }}" data-search-url="{{ route('treasuries.aj') }}" class="form-control" name="search" id="aj_search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="border">
                <table dir="rtl" class="striped" style="width: 100%">
                    <thead>
                    <tr class="text-center">
                        <th>رقم مسلسل</th>
                        <th >اسم العميل</th>
                        <th >المندوب</th>
                        <th >الهاتف</th>
                        <th>مجال العمل</th>
                        <th>أدوات التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($clients)) @php $i=0 @endphp @foreach($clients as $cl => $client) 
                        <tr>
                            <td>{{ $client->s_number }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->person }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $scope[$client->scope] }}</td>
                            <td>
                                <a href="{{route('clients.view', [$client->id, 1])}}"><i class="fa fa-eye" title="عرض بيانات العميل"></i></a>
                                <a href="{{route('clients.edit', $client->id)}}"><i class="fa fa-edit" title="تعديل بيانات الغميل"></i></a>
                                <a href="{{route('contract.create', $client->id)}}"><i class="fa fa-plus" title="إضافة عقد  جديد"></i></a>
                                
                                <a href="{{route('clients.delete', $client->id)}}" onclick="return confirm('هل تريد حذف هذا العميل بالفعل؟، هذه الحركة لا يمكن الرجوع عنها.')"><i class="fa fa-trash" title="حذف العميل"></i></a>
                            </td>
                        </tr>

                    @endforeach
                    @else
                        <tr>
                            <td colspan="7">لم يتم بعد تسجيل عملاء حتى الان <a href="{{ route('clients.create') }}">أدخل عميلك الأول!</a></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            {{ $clients->links() }}


            </div>


    </div>

@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('assets/admin/js/treasury/search.datatables.js') }}"></script>
    <script>

    </script>
@endsection
