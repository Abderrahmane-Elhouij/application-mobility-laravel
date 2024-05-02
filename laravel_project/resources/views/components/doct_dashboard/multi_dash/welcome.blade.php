@extends('components.doct_dashboard.dashboard')

@section('dynamic-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    @php
                        $condidatCount = \App\Models\Condidat::where('user_id', auth()->id())->count();
                        $mobiliteCount = \App\Models\Mobilite::where('user_id', auth()->id())->count();
                        $publicationCount = \App\Models\Publication_revue::where('user_id', auth()->id())->count();
                        $communicationCount = \App\Models\Communication_manifestation::where(
                            'user_id',
                            auth()->id(),
                        )->count();
                    @endphp
                    <div class="card-header">Bienvenue dans votre espace</div>

                    <div class="card-body">
                        <h6>Bonjour {{ auth()->user()->prenom }} {{ auth()->user()->nom }}</h6><br>
                        <a href="{{ route('mobility') }}" class="btn btn-primary" style="background-color: #8b4513;">Ajouter
                            une
                            condidature</a><br><br><br><br>

                        <h4 class="card-title">Vos enregistrements:</h4>
                        <div class="d-flex mt-3">
                            <div class="card bg-light mr-3" style="width: 200px;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-user mr-2"></i>
                                        <h5 class="card-title font-weight-bold mb-0" style="font-size: 16px;">Condidats</h5>
                                    </div>
                                    <p class="card-text text-primary">{{ $condidatCount }}</p>
                                </div>
                            </div>
                            <div class="card bg-light mr-3" style="width: 200px;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-briefcase mr-2"></i>
                                        <h5 class="card-title font-weight-bold mb-0" style="font-size: 16px;">Mobilités</h5>
                                    </div>
                                    <p class="card-text text-primary">{{ $mobiliteCount }}</p>
                                </div>
                            </div>
                            <div class="card bg-light mr-3" style="width: 200px;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-file-alt mr-2"></i>
                                        <h5 class="card-title font-weight-bold mb-0" style="font-size: 16px;">Publications
                                        </h5>
                                    </div>
                                    <p class="card-text text-primary">{{ $publicationCount }}</p>
                                </div>
                            </div>
                            <div class="card bg-light" style="width: 200px;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-comments mr-2"></i>
                                        <h5 class="card-title font-weight-bold mb-0" style="font-size: 16px;">Communications
                                        </h5>
                                    </div>
                                    <p class="card-text text-primary">{{ $communicationCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
