@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h2 class="text-center">Inserisci una nuova letterina</h2>
            <div class="row justify-content-center">
                {{-- in caso di non corrispondenza con la validazione, mostrare errore --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-7 mb-5">
                    <form action="{{ route('letters.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="name">Nome</label>
                            {{-- per ogni input assegno un messaggio di errore tramite classe e tag blade error --}}
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            {{-- ad ogni errore oltre alla classe si attiva anche un messaggio che specifica il requisito necessario alla validazione --}}
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="lastname">Cognome</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                value="{{ old('lastname') }}" id="lastname" name="lastname">
                            @error('lastname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="address">Indirizzo</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}" id="address" name="address">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="city">Città</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                value="{{ old('city') }}" id="city" name="city">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="arrival_letter">Data di arrivo</label>
                            <input type="text" class="form-control @error('arrival_letter') is-invalid @enderror"
                                value="{{ old('arrival_letter') }}" id="arrival_letter" name="arrival_letter">
                            @error('arrival_letter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label for="present">Regalo</label>
                            <input type="text" class="form-control  @error('present') is-invalid @enderror"
                                value="{{ old('present') }}" id="present" name="present">
                            @error('present')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="content_letter">Testo della letterina</label>
                            <input type="text" class="form-control @error('content_letter') is-invalid @enderror"
                                value="{{ old('content_letter') }}" id="content_letter" name="content_letter">
                            @error('content_letter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="rating">Punteggio del bambino</label>
                            <input type="text" class="form-control @error('rating') is-invalid @enderror"
                                value="{{ old('rating') }}" id="rating" name="rating">
                            @error('rating')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="delivered">Spedito? </label>
                            <input type="text" class="form-control @error('delivered') is-invalid @enderror"
                                value="{{ old('delivered') }}" id="delivered" name="delivered">
                            @error('delivered')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button class="btn btn-success" type="submit">Salva</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
