@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" style="padding-left: 5vw;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="card-title"> {{ $user->name }}</h5>
                    <p class="card-text"> {{ $user->email }}</p>
                    <p class="card-text"> {{ $user->bg }}</p>
                    <p class="card-text"> {{ $user->address }}</p>
                    <p class="card-text"> {{ $user->phone }}</p>
                    <p class="card-text"> {{ $user->last_donated }}</p>
                    <a href="/edit/{{$user->id}}" class="btn btn-primary">Edit info</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
