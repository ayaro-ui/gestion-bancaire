@extends('virements.layout')

@section('title', 'Nouveau Virement')

@section('content')
<h2>Ajouter un Virement</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('virements.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Compte Source</label>
        <input type="number" name="compte_source_id" class="form-control" value="{{ old('compte_source_id') }}">
    </div>
    <div class="mb-3">
        <label>Compte Destination</label>
        <input type="number" name="compte_destination_id" class="form-control" value="{{ old('compte_destination_id') }}">
    </div>
    <div class="mb-3">
        <label>Montant</label>
        <input type="number" step="0.01" name="montant" class="form-control" value="{{ old('montant') }}">
    </div>
    <div class="mb-3">
        <label>Date du Virement</label>
        <input type="date" name="date_virement" class="form-control" value="{{ old('date_virement') }}">
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
@endsection
