@extends('layouts.admin')
@section('title') الحركات @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') الحركات @endsection
@section('homeLinkActive') الصفحة الرئيسية @endsection
@section('links')
<button class="btn btn-sm btn-primary"><a href="{{ route('item.create') }}"><span class="btn-title">إضافة صنف خدمى</span><i class="fa fa-tag text-light"></i></a></button>
<button class="btn btn-sm btn-primary"><a href="{{ route('items.cats.create', 0) }}"><span class="btn-title">إضافة تصنيف مبيعات</span><i class="fa fa-tags text-light"></i></a></button>
<button class="btn btn-sm btn-primary"><a href="{{ route('contract.create', 0) }}"><span class="btn-title">إضافة عقد خدمات</span><i class="fa fa-plus text-light"></i></a></button>
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
  <div id="data_show">
    <table dir="rtl" id="data" class="" style="width:100%">
      <thead>
        <tr>
          <th>م</th>
          <th>الرقم المسلسل</th>
          <th>العميل</th>
          <th>نوع العقد</th>
          <th>الحالة</th>
          
        </tr>
      </thead>
      <tbody>
        
      @php $i = 1 @endphp
      @if(count($contracts))
      @if(isset($contracts) &&!empty($contracts)) @foreach ($contracts as $in => $contract)
        <tr>
          <td>{{ $i }}</td>
          
          <td>{{ $contract->s_number }}</td>
          <td>{{ $contract->owner->name }}</td>
          <td>{{ $contract->contract_type }}</td>
          <td>
            <a href="{{route('contract.view', [$contract->id, 1]) }}"><i class="fa fa-eye text-success"></i></a>
            @if(!$contract->status)
            <a href="{{ route('contract.edit', [$contract->id, 1]) }}"><i class="fa fa-edit text-primary"></i></a>
            <a href="{{ route('contract.delete', [$contract->id]) }}"><i class="fa fa-trash text-danger"></i></a>
            <a href="{{ route('contract.approve', [$contract->id]) }}"><i class="fa fa-check text-success"></i></a>
            @else
            <a href="{{ route('contract.park', [$contract->id]) }}"><i class="fa fa-parking text-info" title="إيقاف العقد للتعديل"></i></a>
            <a href="{{ route('movements.receipt.create', [$contract->id]) }}"><i class="fa fa-spinner fa-pulse fa-fw" title="إضافة سندات على العقد"></i></a>
            
            @endif
          </td>
        </tr>
        @php $i++ @endphp
      @endforeach 
      @endif
      @else
      <tr>
        <td colspan="5">No data to display</td>
      </tr>
      @endif
      </tbody>
    </table>
    {{-- {{ $cats->links() }} --}}
  </div>

</div>

@endsection


@section('script')
<script type="text/javascript" src="{{ asset('assets/admin/js/treasury/search.datatables.js') }}"></script>
@endsection 