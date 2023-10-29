@if(Session::has('error'))
<div dir="rtl" class="alert alert-danger text-right">
    {{Session::get('error')}}
</div>
@endif