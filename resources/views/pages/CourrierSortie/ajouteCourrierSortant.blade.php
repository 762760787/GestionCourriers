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
                            <h4 class="text-white font-weight-bolder text-center mt-2">Ajouter un Courrier de Sortie</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form" class="form" action="{{ route('courrier-sortants.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nombre de Pièces</label>
                                <input id="nombre_piece" type="number" name="nombre_piece" class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Date d'Envoi</label>
                                <input id="date_envoi" type="date" name="date_envoi" class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Destinataire</label>
                                <input id="destinataire" type="text" name="destinataire" class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Objet</label>
                                <input id="objet" type="text" name="objet" class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Pièces Jointes</label>
                                <input id="pieces_jointes" type="file" name="pieces_jointes" class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Numéro d'Archive</label>
                                <input id="no_archive" type="text" name="no_archive" class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
