@extends('clients.layout')

@section('title', 'Liste des clients')

@section('content')
<h1 class="mb-4">Liste des clients</h1>

<a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un client</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->nom }}</td>
            <td>{{ $client->prenom }}</td>
            <td>{{ $client->email }}</td>
            <td>
               <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">Modifier</a>

                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce client ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
