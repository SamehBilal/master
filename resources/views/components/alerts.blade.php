@if (session('status'))
    <div class="alert alert-success animated jellyIn in" role="alert">
        {{ session('status') }}
    </div>
@endif

@if($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-soft-success d-flex" role="alert">
        <i class="material-icons mr-3">check_circle</i>
        <div class="text-body">{{ $message }}</div>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-soft-danger d-flex" role="alert">
        <i class="material-icons mr-3">cancel</i>
        <div class="text-body">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
