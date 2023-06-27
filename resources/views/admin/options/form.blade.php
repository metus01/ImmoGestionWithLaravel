@extends('admin.admin')
@section('title', $option->exists ? 'Editer un bien' : 'Création d\'une nouvelle  option')
@section('content')
    @yield('title')
    <form class="vstack gap-2"
        action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', [
            'option' => $option,
        ]) }}"
        method="post">
        @csrf
        @method($option->exists ? 'PUT' : 'POST')
        @include('shared.input',[
            'name' => 'name',
            'label' => 'Nom',
            'value' => $option->name
        ])
        <div class="">
            <button class="btn btn-primary">
                @if ($option->exists)
                    Modifier
                @else
                    Créer
                @endif 
            </button>
        </div>
    </form>
@endsection
