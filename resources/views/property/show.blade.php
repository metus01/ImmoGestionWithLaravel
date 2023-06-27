@extends('base')
@section('title', $property->title)
@section('content')
    <div class="container mt-4">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m2</h2>
        <div class="text-primary fw-bold" style="font-size: 4rem">
            {{ number_format($property->price, thousands_separator: '') }}€
        </div>
    </div>
    <hr>
    <div class=" container mt-4">
        <h4>Interressé par ce Bien</h4>
        <form action="" method="post" class="v-stack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'firstname',
                    'label' => 'Nom',
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'lastname',
                    'label' => 'Prénom',
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'phone',
                    'label' => 'Téléphone',
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'email',
                    'label' => 'Email',
                    'type' => 'email',
                ])
            </div>
            @include('shared.input', [
                'class' => 'col',
                'name' => 'message',
                'label' => 'Votre Message',
                'type' => 'textarea',
            ])
            <div>
                <button class="btn btn-success mt-2">
                    Nous contacter
                </button>
            </div>
        </form>
        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristique</h2>
                    <table class="table table-striped table-responsive">
                        <tr>
                            <td>Surface Habitable</td>
                            <td>{{ $property->surface }}m2</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}m2</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Etages</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>{{ $property->city }},{{ $property->postal_code }},{{ $property->address }}m2</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">
                                {{ $option->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
