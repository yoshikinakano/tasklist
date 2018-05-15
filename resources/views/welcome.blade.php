@extends('layouts.app')

@section('content')
    @if (\Auth::check())
        @if ((\Auth::user()->id) == $user->id)
            <div class="row">
                <aside class="col-md-4">
                </aside>
                <div class="col-xs-8">
                    
                    @include('users.show', ['tasks' => $tasks, 'user' => $user])
                  
                </div>
            </div>
        @else
           <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
            </div>
        </div>
        @endif
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                @unless (Auth::check())
                    {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
                @endif
            </div>
        </div>
    @endif
@endsection