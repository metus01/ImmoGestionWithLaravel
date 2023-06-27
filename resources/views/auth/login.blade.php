@extends('base')
@section('title' , 'Login')
@section('content')
<div class="container mt-4">
    <h1>@yield('title')</h1>
    @error(session('success'))
    <div class="alert alert-success">
        cc
    </div>
    @enderror
    <form action="{{ route('login') }}" method="post" class="v-stack gap-2">
        @csrf
        @include('shared.input',
        [  
            'class' => 'col',
            'label' => 'Email',
            'type' => 'email',
            'name' => 'email'
        ])
         @include('shared.input',
         [
             'class' => 'col',
             'label' => 'Mot de Passe',
             'type' => 'password',
             'name' => 'password'
         ])
         <div>
            <button class="btn btn-success">Se Connecter</button>
         </div>
    </form>
</div>
@endsection
