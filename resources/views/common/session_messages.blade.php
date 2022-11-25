@if(Session::has('create_success'))
<div class="alert alert-success" style="margin: 20px;"><span class="glyphicon glyphicon-ok"></span><em> {{ session('create_success') }}</em></div>
@endif

@if(Session::has('delete_data'))
<div class="alert alert-success" style="margin: 20px;"><span class="glyphicon glyphicon-ok"></span><em> {{ session('delete_data') }}</em></div>
@endif