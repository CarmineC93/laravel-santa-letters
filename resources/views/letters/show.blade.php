@extends('layouts.app')

@section('name', $letter->name)

@section('content')
    <section>
        <div class="container">
            <div class="d-flex justify-content-around pt-3">
                <h2>Letter {{ $letter->name }}</h2>

                <button class="btn btn-danger">
                    <a style="color:white; text-decoration:none" href="{{ route('letters.index') }}">Torna a tutte le
                        lettere</a>
                </button>
            </div>

            <dl>
                <dt>Name</dt>
                <dd>{{ $letter->name }}</dd>

                <dt>Cognome</dt>
                <p>{{ $letter->lastname }}</p>

                <dt>Indirizzo</dt>
                <dd>{{ $letter->address }}</dd>

                <dt>Città</dt>
                <dd>{{ $letter->city }}</dd>

                <dt>Arrivo della lettera</dt>
                <dd>{{ $letter->arrival_letter }}</dd>

                <dt>Regalo</dt>
                <dd>{{ $letter->present }}</dd>

                <dt>Testo della lettera</dt>
                <dd>{{ $letter->content_letter }}</dd>

                <dt>Punteggio del bambino</dt>
                <dd>{{ $letter->rating }}</dd>

                <dt>Consegnato?</dt>
                <dd>{{ $letter->delivered }}</dd>
            </dl>
        </div>
    </section>
@endsection
