@extends('layouts.admin')
@section('title') الطبالي @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') الطبالي @endsection
@section('homeLinkActive') عرض بيانات طبلية @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('tables.home') }}"><span class="btn-title">Gp Home</span><i class="fa fa-home text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('tables.setting') }}"><span class="btn-title">Settings</span><i class="fa fa-cogs text-light"></i></a></button>
@endsection
@section('content')
    <style type="text/css">
        .h3 {
            font: Bold 1.1em/1.3 "Cairo SemiBold";
            color: #2e6da4;
        }
        table tr td:nth-child(2) {
            border-left: 1px solid #777 !important;
        }
        table tr td:last-child {
            border-left: 0;
        }
    </style>

    <div class="container">
        <fieldset>
            <legend> بيانات الطبلية </legend>
            <br>
            <table class="w-100">
                <tr>
                    <th>رقم الطبلية:</th>
                    <td>{{ $table->name }}</td>
                    <td rowspan="12"><img src="{{ asset('assets\admin\uploads\images\transactions.webp') }}" alt="" width="400"></td>
                </tr>
                <tr>
                    <th>الرقم المسلسل:</th>
                    <td>{{ $table->serial }}</td>
                </tr>
                <tr>
                    <th>الحالة</th>
                    <td>{{ $table->status == 0 ? 'فارغة' : 'مرتبطة بعقد'}}</td>
                </tr>
                @if ($table->status) 
                <tr>
                    <td>العميل:</td>
                    <td>{{ $table->client->name }}</td>
                </tr>
                <tr>
                    <td>العقد:</td>
                    <td>{{$table->contract->s_number}}</td>
                </tr>
                <tr>
                    <td>الحمولة:</td>
                    <td>{{ $table->the_load }}</td>
                </tr>
                @endif

            </table>
        </fieldset>
    </div>

@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('assets/admin/js/treasury/search.datatables.js') }}"></script>
@endsection
