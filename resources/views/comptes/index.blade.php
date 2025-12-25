@extends('comptes.layout')

@section('title', 'Liste des comptes')

@section('content')
<h1>Liste des comptes</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('comptes.create') }}" class="btn btn-primary mb-3">Ajouter un compte</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Solde</th>
            <th>RIB</th>
            <th>Client</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comptes as $compte)
        <tr>
            <td>{{ $compte->id }}</td>
            <td>{{ $compte->type }}</td>
            <td>{{ $compte->solde }}</td>
            <td>{{ $compte->rib }}</td>
            <td>{{ $compte->client->nom }} {{ $compte->client->prenom }}</td>
            <td>
                <a href="{{ route('comptes.edit', $compte->id) }}" class="btn btn-info btn-sm">Modifier</a>

                <form action="{{ route('comptes.destroy', $compte->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce compte ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
