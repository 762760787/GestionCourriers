@extends('layouts.app')

@section('page-content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-0 h4 font-weight-bolder text-center">Mairie de Ngoundiane</h3>
                <p class="text-center">Gestion des courriers d'arrivée et de départ.</p>
            </div>

            {{-- Cartes récapitulatives --}}
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0">Aujourd'hui, c'est le</p>
                                    <h4 class="mb-0">{{ $date }}</h4>
                                </div>
                                <div class="icon bg-gradient-dark shadow-dark text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">calendar_today</i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <p class="mb-0 text-sm">Il est {{ $heure }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0">Courriers d'arrivée</p>
                                    <h4 class="mb-0">{{ $totalCourriers }}</h4>
                                </div>
                                <div class="icon bg-gradient-dark shadow-dark text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">mail</i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <p class="mb-0 text-sm">Pour l'année 2025</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0">Courriers de départ</p>
                                    <h4 class="mb-0">{{ $totalCourriersSortie }}</h4>
                                </div>
                                <div class="icon bg-gradient-dark shadow-dark text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">send</i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                            <p class="mb-0 text-sm">Pour l'année 2025</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            {{-- Tableau responsive --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Liste des courriers récents</h6>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center">No Ordre</th>
                                            <th class="text-center">Nombre de Pièces</th>
                                            <th class="text-center">Date de Réception</th>
                                            <th class="text-start">Expéditeur</th>
                                            <th class="text-start">Objet</th>
                                            <th class="text-center">Pièces Jointes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($courrierEntrants->count() > 0)
                                            @foreach ($courrierEntrants as $courrierEntrant)
                                                <tr>
                                                    <td class="text-center">{{ $courrierEntrant->id }}</td>
                                                    <td class="text-center">{{ $courrierEntrant->nombre_piece }}</td>
                                                    <td class="text-center">{{ \Carbon\Carbon::parse($courrierEntrant->date_reception)->format('d/m/Y') }}</td>
                                                    <td class="text-start text-wrap" style="max-width: 200px;">{{ $courrierEntrant->expediteur }}</td>
                                                    <td class="text-start text-wrap" style="max-width: 200px;">{{ $courrierEntrant->objet }}</td>
                                                    <td class="text-center">
                                                        @if ($courrierEntrant->pieces_jointes)
                                                            <a href="{{ Storage::url($courrierEntrant->pieces_jointes) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                                Voir
                                                            </a>
                                                        @else
                                                            <span class="text-muted">Aucune</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">Aucun courrier trouvé.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('courrier-entrants.index') }}" class="btn btn-success">Voir tous les courriers</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer py-4">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 text-center text-lg-start">
                            <p class="text-sm text-muted">
                                © <script>document.write(new Date().getFullYear())</script>,
                                Réalisé avec ❤️ par
                                <a href="https://senpro.infy.uk/" class="font-weight-bold" target="_blank">SEN PRO</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
