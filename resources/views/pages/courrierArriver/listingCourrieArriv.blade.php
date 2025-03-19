@extends('layouts.app')

@section('page-content')
    <div class="card-body px-0 pb-0" style="background-color: #fff;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <h2 class="text-center">Liste des Courriers d'Arrivées</h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-flush" id="products-list" style="width: 100%; table-layout: fixed;">
                <thead>
                    <tr>
                        <th colspan="7" style="padding: 10px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('courrier-entrants.create') }}" class="btn btn-primary">Nouveau courrier</a>
                                <form action="{{ route('courrier-entrants.index') }}" method="GET" class="form-control me-1 d-flex" style="margin-right: 23px;">
                                    <input type="text" name="search" class="form-control ms-5 me-1" placeholder="Rechercher un courrier..." value="{{ request('search') }}" style="border: 1px solid #ced4da;">
                                    <button type="submit" class="btn btn-success">Rechercher</button>
                                </form>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 5%; padding: 10px; text-align: center; ">No Ordre</th>
                        <th style="width: 10%; padding: 10px;">Nombre de Pièces</th>
                        <th style="width: 15%; padding: 10px; ">Date de Réception</th>
                        <th style="width: 22%; padding: 10px; ">Expéditeur</th>
                        <th style="width: 25%; padding: 10px; ">Objet</th>
                        <th style="width: 13%; padding: 10px;text-align: center; ">Pièces Jointes</th>
                        <th style="width: 20%; padding: 10px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($courrierEntrants->count() > 0)
                        @foreach ($courrierEntrants as $courrierEntrant)
                            <tr>
                                <td style="word-break: break-all; text-align: center;">{{ $courrierEntrant->id }}</td>
                                <td style="text-align: center;">{{ $courrierEntrant->nombre_piece }}</td>
                                <td style="">{{ \Carbon\Carbon::parse($courrierEntrant->date_reception)->format('d/m/Y') }}</td>
                                <td style="text-align: left; max-width: 50%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    {{ $courrierEntrant->expediteur }}
                                </td>
                                <td style="text-align: left; max-width: 50%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    {{ $courrierEntrant->objet }}
                                </td>
                                <td style="text-align: center;">
                                    @if ($courrierEntrant->pieces_jointes)
                                        <a href="{{ asset('storage/' . $courrierEntrant->pieces_jointes) }}" target="_blank">
                                            <i class="material-icons text-primary">print</i> <!-- Icône d'imprimante -->
                                        </a>
                                        
                                        @else
                                        Aucune pièce jointe
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('courrier-entrants.edit', $courrierEntrant->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Modifier le courrier">
                                        <i class="material-symbols-rounded text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                    </a>
                                    <form action="{{ route('courrier-entrants.destroy', $courrierEntrant->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent" data-bs-toggle="tooltip" data-bs-original-title="Supprimer le courrier">
                                            <i class="material-symbols-rounded text-secondary position-relative text-lg">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Aucun courrier trouvé.</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="d-flex justify-content-center mt-4">
                                {{ $courrierEntrants->links('pagination::bootstrap-5') }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
