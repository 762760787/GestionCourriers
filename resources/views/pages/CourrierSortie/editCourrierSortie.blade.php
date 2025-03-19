@extends('layouts.app')

@section('page-content')
    <div class="container-fluid py-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-8 mx-auto my-5">
                <div class="card mb-9">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2">Modifier un Courrier D'arrivée</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form" class="form" action="{{ route('courrier-entrants.update', $courrierEntrant->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nombre de Pièces</label>
                                <input id="nombre_piece" type="number" name="nombre_piece" class="form-control" value="{{ $courrierEntrant->nombre_piece }}" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Date de Réception</label>
                                <input id="date_reception" type="date" name="date_reception" class="form-control" value="{{ $courrierEntrant->date_reception }}" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Expéditeur</label>
                                <input id="expediteur" type="text" name="expediteur" class="form-control" value="{{ $courrierEntrant->expediteur }}" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Objet</label>
                                <input id="objet" type="text" name="objet" class="form-control" value="{{ $courrierEntrant->objet }}" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Pièces Jointes</label>
                                <input id="pieces_jointes" type="file" name="pieces_jointes" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                                @if ($courrierEntrant->pieces_jointes)
                                    <p>Fichier actuel : {{ basename($courrierEntrant->pieces_jointes) }}</p>
                                @endif
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Numéro d'Archive</label>
                                <input id="no_archive" type="text" name="no_archive" class="form-control" value="{{ $courrierEntrant->no_archive }}">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">{{ $courrierEntrant->description }}</textarea>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection