@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3 text-center">Welcome, {{ Auth::user()->name ?? _('Guest') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At et alias, voluptas vel ipsam dolores, ratione, dolore dolorum voluptates eligendi sequi. Quibusdam dignissimos a et totam repudiandae nam, quidem ad.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
