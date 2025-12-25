@extends('comptes.layout')

@section('title', 'Modifier un compte')

@section('content')
<h1>Modifier un compte</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('comptes.update', $compte->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Type :</label>
        <input type="text" name="type" class="form-control" value="{{ old('type', $compte->type) }}" required>
    </div>

    <div class="mb-3">
        <label>Solde :</label>
        <input type="number" name="solde" class="form-control" step="0.01" value="{{ old('solde', $compte->solde) }}" required>
    </div>

    <div class="mb-3">
        <label>Client :</label>
        <select name="client_id" class="form-select" required>
            <option value="">-- Sélectionner un client --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" 
                    {{ old('client_id', $compte->client_id) == $client->id ? 'selected' : '' }}
                >
                    {{ $client->nom }} {{ $client->prenom }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>RIB :</label>
        <input type="text" name="rib" class="form-control" value="{{ old('rib', $compte->rib) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
