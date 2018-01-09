@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('message')}}</div>
@endif
