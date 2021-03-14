@extends('layouts.app')

@section('content')
    @if(count($users) > 0)
        <div class="d-flex align-items justify-content-center">
            @foreach ($users as $user)
                <div class="card">
                    <div class="card-header"> {{ $user->bg }}</div>

                    <div class="card-body" style="padding-left: 5vw;">
                        <p class="card-text"> {{ $user->name }}</p>
                        <p class="card-text"> {{ $user->email }}</p>
                        <p class="card-text"> {{ $user->address }}</p>
                        <p class="card-text"> {{ $user->phone }}</p>
                        @if($user->last_donated != null)
                            <p class="card-text"> {{ \Carbon\Carbon::parse($user->last_donated)->diffForHumans() }}</p>
                        @else
                            <p class="card-text"> Available </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="d-flex align-items justify-content-center">
            <h1>No donation list found...</h1>
        </div>
    @endif
@endsection