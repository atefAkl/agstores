@extends('layouts.admin')

@section('title') Clients - Create @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') Accounts / Clients @endsection
@section('homeLinkActive') View Client @endsection
@section('links')
<button class="btn btn-sm btn-primary"><a href="{{ route('clients.delete', $client->id) }}"><span class="btn-title">إزالة عميل</span><i class="fa fa-trash text-light"></i></a></button>
<button class="btn btn-sm btn-primary"><a href="{{ route('contract.create', $client->id) }}"><span class="btn-title">إضافة عقد جديد</span><i class="fa fa-file text-light"></i></a></button>
<button class="btn btn-sm btn-primary"><a href="{{ route('clients.edit', $client->id) }}"><span class="btn-title">تعديل بيانات العميل</span><i class="fa fa-edit text-light"></i></a></button>
<button class="btn btn-sm btn-primary"><a href="{{ route('clients.home') }}"><span class="btn-title">العودة إلى الرئيسية</span><i class="fa fa-home text-light"></i></a></button>
@endsection

@section('content')
<style>
    table tr td {
        padding: 3px 5px;
    }

</style>
<div class="container">

    <h4 class="text-right">{{$client->name}}</h4>
    <table class="w-100" dir="rtl">
        <tr>
            <td class="text-left">السجل التجارى:</td>
            <td class="text-right">{{ $client->cr }}</td>
            <td class="text-left">الرقم الضريبى:</td>
            <td class="text-right">{{ $client->vat }}</td>
            <td class="text-left">المجال:</td>
            <td class="text-right">{{ $scopes[$client->scope] }}</td>
        </tr>
        <tr>
            <td class="text-left">الهاتف:</td>
            <td class="text-right">{{ $client->phone }}</td>
            <td class="text-left">البريد الالكترونى:</td>
            <td class="text-right">{{ $client->email }}</td>
            <td class="text-left">الموقع الالكترونى:</td>
            <td class="text-right">{{ $client->website }}</td>
        </tr>
        <tr>
            <td class="text-left">العنوان:</td>
            <td class="text-right" colspan="3">{{ $client->state }} - {{ $client->city }} - {{ $client->street }}</td>
            <td class="text-left">عميل منذ:</td>
            <td class="text-right">{{ $client->created_at }}</td>
        </tr>
    </table>

    <h4 class="text-right">العقود</h4>
    <table class="w-100" dir="rtl">
        <tr>
            <td>#</td>
            <td>المسلسل</td>
            <td>الكود</td>
            <td>تاريخ البداية</td>
            <td>تاريخ الانتهاء</td>
            <td>الحالة</td>
            <td>إدارة العقود</td>
        </tr>
        @if ($contracts)  @php $ser=0 @endphp
        @foreach ($contracts as $ii => $item)
        <tr>
            <td> {{ ++$ser }} </td>
            <td> {{ $item->s_number }} </td>
            <td> {{ $item->code }} </td>
            <td> {{ $item->starts_in_greg }} - {{ $item->starts_in_hij }} </td>
            <td> {{ $item->ends_in_greg }} - {{ $item->ends_in_hij }} </td>
            <td> {{ $item->status }} </td>
            <td> 
                <a href="{{ route('contract.view', [$item->id, 1]) }}" title="عرض العقد" ><i class="fa fa-eye text-primary"></i></a>
                <a href="{{ route('contract.edit', [$item->id, 1]) }}" title="تعديل بيانات" ><i class="fa fa-edit text-info"></i></a>
                <a href="{{ route('receipt.create', [$item->id,1]) }}" title=" إضافة سند دخول" ><i class="fa fa-sign-in-alt text-primary"></i></a>
                <a href="{{ route('receipt.create', [$item->id, 0]) }}" title=" إضافة سند خروج" ><i class="fa fa-sign-out-alt text-primary"></i></a>
                <a href="{{ route('contract.extend', $item->id) }}" title="تمديد العقد" ><i class="fa fa-link text-danger"></i></a>
                <a href="{{ route('contract.delete', $item->id) }}" title="إزالة العقد" ><i class="fa fa-trash text-danger"></i></a>
                
            </td>
        </tr>
        @endforeach
        @endif
        
    </table>
</div>

@endsection
@section('script')
{{-- <script type="text/javascript" src="{{ asset('assets/admin/js/accounts/countries.js') }}"></script> --}}
@endsection
