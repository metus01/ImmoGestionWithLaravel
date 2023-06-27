@extends('admin.admin')
@section('title', $property->exists ? 'Editer un bien' : 'Création d\'un noveau bien')
@section('content')
    @yield('title')
    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', [
            'property' => $property,
        ]) }}"
        method="post">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')
        <div class="row">
            <div class="col row">
                @include('shared.input', [
                    'name' => 'title',
                    'class' => 'col',
                    'value' => $property->title,
                ])
            </div>
            <div class="col row">
                @include('shared.input', [
                    'name' => 'surface',
                    'class' => 'col',
                    'value' => $property->surface,
                ])
            </div>
            <div class="col row">
                @include('shared.input', [
                    'name' => 'price',
                    'class' => 'col',
                    'label' => 'Prix',
                    'value' => $property->price,
                ])
            </div>
        </div>
        @include('shared.input', [
            'name' => 'description',
            'class' => 'col row',
            'type' => 'textarea',
            'value' => $property->description,
        ])
        <div class="row">
            @include('shared.input', [
                'name' => 'rooms',
                'class' => 'col',
                'label' => 'Pièces',
                'value' => $property->rooms,
            ])
            @include('shared.input', [
                'name' => 'bedrooms',
                'class' => 'col',
                'label' => 'Chambre',
                'value' => $property->bedrooms,
            ])
            @include('shared.input', [
                'name' => 'floor',
                'class' => 'col',
                'label' => 'Etage',
                'value' => $property->floor,
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                'name' => 'address',
                'class' => 'col',
                'label' => 'Adresse',
                'value' => $property->address,
            ])
            @include('shared.input', [
                'name' => 'city',
                'class' => 'col',
                'label' => 'Ville',
                'value' => $property->city,
            ])
            @include('shared.input', [
                'name' => 'postal_code',
                'class' => 'col',
                'label' => 'Code Postal',
                'value' => $property->postal_code,
            ])
        </div>
        @include('shared.checkbox' , [
            'name' => 'sold',
            'label' => 'Vendu',
            'value' => $property->sold
        ])
        @include('shared.select', [
            'name' => 'options',
            'label' => 'Spécificité',
            'value' => $property->options()->pluck('id'),
            'multiple' => true,
            'options' => $options,
        ])
        <div class="">
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer
                @endif 
            </button>
        </div>
    </form>
@endsection
