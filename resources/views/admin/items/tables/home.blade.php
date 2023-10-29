@extends('layouts.admin')
@section('title') المبيعات @endsection
@section('homePage') {{ auth()->user()->company_name }} @endsection
@section('homeLink') الطبالي @endsection
@section('homeLinkActive') الرئيسية @endsection
@section('links')
    <button class="btn btn-sm btn-primary"><a href="{{ route('table.create', 1) }}"><span class="btn-title">Go Home</span><i class="fa fa-plus text-light"></i></a></button>
    <button class="btn btn-sm btn-primary"><a href="{{ route('store.settings') }}"><span class="btn-title">Settings</span><i class="fa fa-cogs text-light"></i></a></button>
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
            <div class="row">
                <div class="col col-4 border">
                    
                </div>
            </div>
            <table dir="rtl" id="data" style="width:100%">
                <thead>
                <tr>
                    <th>مسلسل</th>
                    <th>رقم الطبلية</th>
                    <th>حجم الطبلية</th>
                    <th>السعة القصوى</th>
                    <th>التحكم</th>
                </tr>
                </thead>
                <tbody>

                @php $i = 1 @endphp
                @if(count($tables))
                    @if(isset($tables) &&!empty($tables)) @foreach ($tables as $table)
                        <tr>
                            <td>{{ $table->serial}}</td>
                            <td>{{ $table->name }}</td>
                            <td>{{ $tableSizes[$table->size] }}</td>
                            <td>{{ $table->capacity }}</td>
                            <td>
                                <button class="btn p-0" ><a href="{{ route('table.view', $table->id) }}"><span class="btn-title"> عرض محتويات الطبلية {{ $table->name }}</span><i class="fa fa-eye text-primary"></i></a></button>
                                <button class="btn p-0" ><a href="{{ route('table.edit', $table->id) }}"><span class="btn-title"> تعديل بيانات الطبلية {{ $table->name }}</span><i class="fa fa-edit text-info"></i></a></button>
                                <button class="btn p-0"><a href="{{ route('table.delete', $table->id) }}"><span class="btn-title"> حذف الطبلية بشكل نهائى {{ $table->name }}</span><i class="fa fa-trash text-danger"></i></a></button>
                            
                            </td>
                        </tr>
                        
                    @endforeach
                    @endif
                @else
                    <tr>
                        <td colspan="5">No data to display</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <br>
            {{ $tables->links() }}
            <br>
        </div>

    </div>

@endsection



@section('script')
    <script type="text/javascript" src="{{ asset('assets/admin/js/treasury/search.datatables.js') }}"></script>
    <script>
        $('.accordion-button i').click(function () {
            $(this).toggleClass('fa-folder-open fa-folder')
        })
        const cm = $('.alterContext');
        const ci = $('.catItem');
        ci.on('contextmenu', (e) => {
            e.preventDefault();
            showContextMenu();
            let c_id = e.target.getAttribute('data-id'), c_lvl = e.target.getAttribute('data-level')
            let cm_top = e.clientY + cm.offsetHeight > window.innerHeight ? window.innerHeight - cm.offsetHeight : e.clientY+'px';
            let cm_left = e.clientX + cm.offsetWidth > window.innerWidth ? window.innerWidth - cm.offsetWidth : e.clientX +'px';
            let al = $('#addLink'), el = $('#editLink'), dl = $('#deleteLink');
            cm.css({
                top: cm_top,
                left: cm_left
            })

            if (c_lvl == 3) {
                al.text('Add New Item');
                al.attr('href', al.attr('data-add-item').replace(/1/g, c_id));
            } else {
                al.text('Add New Category');
                al.attr('href', al.attr('data-url').replace(/0/g, c_id));
            }
            el.attr('href', el.attr('data-url').replace(/0/g, c_id));
            dl.attr('href', dl.attr('data-url').replace(/0/g, c_id));

        })
        $(window).on('click', () => {
            showContextMenu(false);
        })

        function showContextMenu(show = true) {
            cm.css({
                height: show ? 'auto': 0,
            })
        }
    </script>
@endsection
