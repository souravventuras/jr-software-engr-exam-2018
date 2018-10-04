@if(session()->has('success'))
    <br>
    <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <br>
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $error }}
        </div>
    @endforeach
@endif
