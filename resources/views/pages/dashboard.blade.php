@extends('layouts.app')

@section('page-content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-0 h4 font-weight-bolder text-center">Mairie de Ngoundiane</h3>
                <p class="text-center">Gestion des courriers d'arrivée et de départ.</p>
            </div>@extends('layouts.app')

@section('page-content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Mairie de Ngoundiane</h3>
                <p class="mb-4">
                    Gestion des courriers d'arrivée et de départ.
                </p>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Aujourd'hui, c'est le</p>
                                <h4 class="mb-0">{{ $date }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">weekend</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3">
                        <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">il est {{ $heure }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Nombre de courrier d'arrivée</p>
                                <h4 class="mb-0">{{ $totalCourriers }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">book</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3">
                        <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">Pour l'année 2025</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Nombre de courrier de départ</p>
                                <h4 class="mb-0">{{ $totalCourriersSortie }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">leaderboard</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3">
                        <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">Pour l'année 2025 </span></p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Sales</p>
                                <h4 class="mb-0">$103,430</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">weekend</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3">
                        <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+5% </span>than yesterday</p>
                    </div>
                </div>
            </div> --}}
        </div>
      <hr>
        <div class="row mb-4 mt-2">
            <div class="col-lg-12 col-md-8 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Liste des courriers récents</h6>
                                {{-- <p class="text-sm mb-0">
                                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">30 done</span> this month
                                </p> --}}
                            </div>
                            {{-- <div class="col-lg-6 col-5 my-auto text-end">
                                <div class="dropdown float-lg-end pe-4">
                                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" style="width: 100%; table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left; padding: 10px;">No Ordre</th>
                                        <th style="width: 15%; word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: center; padding: 10px;">Nombre de Pièces</th>
                                        <th style="width: 15%; word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: center; padding: 10px;">Date de Réception</th>
                                        <th style="width: 22%; word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left; padding: 10px;">Expéditeur</th>
                                        <th style="width: 25%; word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left; padding: 10px;">Objet</th>
                                        <th style="width: 13%; word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left; padding: 10px;">Pièces Jointes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($courrierEntrants->count() > 0)
                                        @foreach ($courrierEntrants as $courrierEntrant)
                                            <tr>
                                                <td style="word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left;">{{ $courrierEntrant->id }}</td>
                                                <td style="word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: center;">{{ $courrierEntrant->nombre_piece }}</td>
                                                <td style="word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: center;">{{ \Carbon\Carbon::parse($courrierEntrant->date_reception)->format('d/m/Y') }}</td>
                                                <td style="word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left;">{{ $courrierEntrant->expediteur }}</td>
                                                <td style="word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left;">{{ $courrierEntrant->objet }}</td>
                                                <td style="word-break: break-all; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; text-align: left;">
                                                    @if ($courrierEntrant->pieces_jointes)
                                                        <a href="{{ asset('storage/' . $courrierEntrant->pieces_jointes) }}" target="_blank">
                                                            Voir pièces jointes
                                                        </a>
                                                    @else
                                                        Aucune pièce jointe
                                                    @endif
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">Aucun courrier trouvé.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <p><a href="{{ route('courrier-entrants.index') }}" class="btn btn-success mt-1">Afficher tous les Courriers d'arrivée</a></p>
                        </div>
                    </div>

                </div>
            </div>
          
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-1">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            Réalisé <i class="fa fa-heart"></i> par
                            <a href="https://senpro.infy.uk/" class="font-weight-bold" target="_blank">SEN PRO.</a>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
    </div>
@endsection


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
