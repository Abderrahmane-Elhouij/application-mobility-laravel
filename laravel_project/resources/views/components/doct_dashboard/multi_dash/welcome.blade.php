@extends('components.doct_dashboard.dashboard')

@section('dynamic-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card" style="background-image: linear-gradient(50deg, rgba(146, 146, 146, 0.02) 0%, rgba(146, 146, 146, 0.02) 25%,rgba(82, 82, 82, 0.02) 25%, rgba(82, 82, 82, 0.02) 50%,rgba(217, 217, 217, 0.02) 50%, rgba(217, 217, 217, 0.02) 75%,rgba(41, 41, 41, 0.02) 75%, rgba(41, 41, 41, 0.02) 100%),linear-gradient(252deg, rgba(126, 126, 126, 0.01) 0%, rgba(126, 126, 126, 0.01) 25%,rgba(117, 117, 117, 0.01) 25%, rgba(117, 117, 117, 0.01) 50%,rgba(219, 219, 219, 0.01) 50%, rgba(219, 219, 219, 0.01) 75%,rgba(41, 41, 41, 0.01) 75%, rgba(41, 41, 41, 0.01) 100%),linear-gradient(272deg, rgba(166, 166, 166, 0.01) 0%, rgba(166, 166, 166, 0.01) 20%,rgba(187, 187, 187, 0.01) 20%, rgba(187, 187, 187, 0.01) 40%,rgba(238, 238, 238, 0.01) 40%, rgba(238, 238, 238, 0.01) 60%,rgba(204, 204, 204, 0.01) 60%, rgba(204, 204, 204, 0.01) 80%,rgba(5, 5, 5, 0.01) 80%, rgba(5, 5, 5, 0.01) 100%),linear-gradient(86deg, rgba(143, 143, 143, 0.02) 0%, rgba(143, 143, 143, 0.02) 12.5%,rgba(36, 36, 36, 0.02) 12.5%, rgba(36, 36, 36, 0.02) 25%,rgba(23, 23, 23, 0.02) 25%, rgba(23, 23, 23, 0.02) 37.5%,rgba(223, 223, 223, 0.02) 37.5%, rgba(223, 223, 223, 0.02) 50%,rgba(101, 101, 101, 0.02) 50%, rgba(101, 101, 101, 0.02) 62.5%,rgba(94, 94, 94, 0.02) 62.5%, rgba(94, 94, 94, 0.02) 75%,rgba(148, 148, 148, 0.02) 75%, rgba(148, 148, 148, 0.02) 87.5%,rgba(107, 107, 107, 0.02) 87.5%, rgba(107, 107, 107, 0.02) 100%),linear-gradient(25deg, rgba(2, 2, 2, 0.02) 0%, rgba(2, 2, 2, 0.02) 16.667%,rgba(51, 51, 51, 0.02) 16.667%, rgba(51, 51, 51, 0.02) 33.334%,rgba(26, 26, 26, 0.02) 33.334%, rgba(26, 26, 26, 0.02) 50.001000000000005%,rgba(238, 238, 238, 0.02) 50.001%, rgba(238, 238, 238, 0.02) 66.668%,rgba(128, 128, 128, 0.02) 66.668%, rgba(128, 128, 128, 0.02) 83.33500000000001%,rgba(21, 21, 21, 0.02) 83.335%, rgba(21, 21, 21, 0.02) 100.002%),linear-gradient(325deg, rgba(95, 95, 95, 0.03) 0%, rgba(95, 95, 95, 0.03) 14.286%,rgba(68, 68, 68, 0.03) 14.286%, rgba(68, 68, 68, 0.03) 28.572%,rgba(194, 194, 194, 0.03) 28.572%, rgba(194, 194, 194, 0.03) 42.858%,rgba(51, 51, 51, 0.03) 42.858%, rgba(51, 51, 51, 0.03) 57.144%,rgba(110, 110, 110, 0.03) 57.144%, rgba(110, 110, 110, 0.03) 71.42999999999999%,rgba(64, 64, 64, 0.03) 71.43%, rgba(64, 64, 64, 0.03) 85.71600000000001%,rgba(31, 31, 31, 0.03) 85.716%, rgba(31, 31, 31, 0.03) 100.002%),linear-gradient(90deg, rgb(251,251,251),rgb(251,251,251));">
                    @php
                        $condidatCount = \App\Models\Condidat::where('user_id', auth()->id())->count();
                        $mobiliteCount = \App\Models\Mobilite::where('user_id', auth()->id())->count();
                        $publicationCount = \App\Models\PublicationEns::where('user_id', auth()->id())->count();
                        $communicationCount = \App\Models\Communication_manifestation::where(
                            'user_id',
                            auth()->id(),
                        )->count();
                    @endphp
                    <div class="card-header">Bienvenue dans votre espace</div>

                    <div class="card-body">
                        <h6>Bonjour {{ auth()->user()->prenom }} {{ auth()->user()->nom }}</h6><br>
                        <a href="{{ route('mobility') }}" class="btn btn-primary" style="background-color: #8b4513;">Ajouter
                            une condidature</a><br><br><br><br>

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
