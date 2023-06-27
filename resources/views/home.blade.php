@extends('base')
@section('content')


<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h2>Agence Immobilière</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi repudiandae odit, eum iusto animi accusamus ex perferendis fuga. Fugiat animi quisquam impedit ipsa harum, ab error. Aut laborum fugit delectus!</p>
    </div>
</div>
<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach ($properties as $property)
            <div class="col">
                @include('property.card')
            </div>
        @endforeach
    </div>
</div>
@endsection