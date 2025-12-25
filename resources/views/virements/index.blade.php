@extends('virements.layout')

@section('title', 'Liste des virements')

@section('content')
<h2 class="mb-4">Liste des Virements</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('virements.create') }}" class="btn btn-primary mb-3">Nouveau Virement</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Compte Source</th>
            <th>Compte Destination</th>
            <th>Montant</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($virements as $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->compte_source_id }}</td>
            <td>{{ $v->compte_destination_id }}</td>
            <td>{{ $v->montant }} DH</td>
            <td>{{ $v->date_virement }}</td>
            <td>
                <a href="{{ route('virements.show', $v->id) }}" class="btn btn-info btn-sm">Voir</a>
                <form action="{{ route('virements.destroy', $v->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
