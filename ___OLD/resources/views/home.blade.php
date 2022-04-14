@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif                
            <div id="app2"></div>
            
        </div>
    </div>
</div>
@endsection
