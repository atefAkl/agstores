@extends('layouts.admin')
@section('title') المخازن @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') المخازن @endsection
@section('homeLinkActive') اسماء الأصناف وأحجام الكرتون @endsection
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
                <input type="text" data-search-token="{{ csrf_token() }}" data-search-url="{{ route('treasuries.aj') }}" class="form-control" name="search" id="aj_search">
                <label for="aj_search" class="input-group-text"><i class="fa fa-search"></i></label>
            </div>
            </div>
        </div>
        </form>
    </div>

    <style>

    </style>

    <fieldset>
        <legend>اسماء الأصناف</legend>
        <br>
        <div class="row p-3">
            
            @if (count($items)) @php $s = 0 @endphp
            @foreach ($items as $in => $item)
            <div class="col col-lg-3 col-sm-6" style="position: relative; height: 32px; border: 1px solid #cde">
                <div style="display: inline-block; width: 40px; height: 30px; text-align:center; position: absolute; right: 0">{{++$s}}</div>
                <div class="pr-3" style="display: inline-block; width: calc(100%-100px); height: 30px; text-align: right; position: absolute; right: 35px; left: 35px">{{$item->name}}</div>
                <div style="display: inline-block; width: 40px; height: 30px; text-align:center; position: absolute; left: 0"><a href="{{route('store.items.remove', $item->id)}}"><i class="fa fa-trash text-danger"></i></a></div>
            </div>
            @endforeach
            @else 
            <div class="col col-12 text-right">لم تتم إضافة أصناف بعد، استخدم النموذج بالأسفل لإضافة أصناف.</div>
            @endif
        </div>

        {{$items->links()}}
        <br>
        <form action="{{route('store.items.add')}}" method="POST">
            @csrf
            <div class="input-group">
                <label class="input-group-text" for="name">اسم الصنف</label>
                <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                <label class="input-group-text" for="short">اسم الصنف</label>
                <input class="form-control" type="text" name="short" id="short" value="{{old('name')}}">
                <button class="input-group-text" type="submit">الحفظ</button>
            </div>
        </form>
    </fieldset>
    <br>

    <fieldset>
        <legend>احجام الكرتون والصناديق</legend>
        <br>
        <div class="row p-3">
            
            @if (count($boxes)) @php $b = 0 @endphp
            @foreach ($boxes as $ib => $box)
            <div class="col col-lg-3 col-sm-6" style="position: relative; height: 32px; border: 1px solid #cde">
                <div style="display: inline-block; width: 40px; height: 30px; text-align:center; position: absolute; right: 0">{{++$b}}</div>
                <div class="pr-3" style="display: inline-block; width: calc(100%-100px); height: 30px; text-align: right; position: absolute; right: 35px; left: 35px">{{$box->name}}</div>
                <div style="display: inline-block; width: 40px; height: 30px; text-align:center; position: absolute; left: 0"><a href="{{route('store.items.remove', $box->id)}}"><i class="fa fa-trash text-danger"></i></a></div>
            </div>
            @endforeach
            @else 
            <div class="col col-12 text-right">لم تتم إضافة أصناف بعد، استخدم النموذج بالأسفل لإضافة أصناف.</div>
            @endif
        </div>

        {{$boxes->links()}}
        <br>
        <form action="{{route('store.box.size.add')}}" method="POST">
            @csrf
            <div class="input-group">
                <label class="input-group-text" for="name">اسم الصنف</label>
                <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                <label class="input-group-text" for="short">اسم الصنف</label>
                <input class="form-control" type="text" name="short" id="short" value="{{old('name')}}">
                <button class="input-group-text" type="submit">الحفظ</button>
            </div>
        </form>
    </fieldset>
</div>


@endsection


@section('script')
<script type="text/javascript" src="{{ asset('assets/admin/js/treasury/search.datatables.js') }}"></script>
@endsection 