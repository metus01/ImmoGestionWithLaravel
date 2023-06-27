@extends('base')
@section('title', 'Tous nos Biens')
@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" name="price" id="" placeholder="Budget Max" class="form-control"
                value="{{ $input['price'] ?? '' }}">
            <input type="number" name="surface" id="" placeholder="Surface Minimum" class="form-control"
                value="{{ $input['surface'] ?? '' }}">
            <input type="number" name="rooms" id="" placeholder="Nombre de pièces minimum" class="form-control"
                value="{{ $input['rooms'] ?? '' }}">
            <input type="text" name="title" id="" placeholder="Mot Clé" class="form-control"
                value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-success flex-group-0">
                Rechercher
            </button>
        </form>
    </div>
    <div class="container mt-2">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
                @empty
                <div class="col-3 mb-4">
                    Aucun Bien
                </div>
            @endforelse
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
