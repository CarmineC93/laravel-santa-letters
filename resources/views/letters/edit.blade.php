@extends('layouts.app')

@section('title', 'Modifica la lettera')

@section('content')
    <section>
        <div class="container">
            <h2 class="text-center">Modifica Lettera: {{ $letter->name }}</h2>
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
                    <form action="{{ route('letters.update', $letter->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-2">
                            <label for="name">Nome</label>
                            {{-- nel secondo parametro di old() in value, passiamo il valore originale, se il nuovo valore non è
                            conforme viene preso il preesistente valore --}}
                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                value="{{ old('name', $letter->name) }}" id="name" name="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="lastname">Lastname</label>
                            <input class="form-control @error('lastname') is-invalid @enderror"
                                value="{{ old('lastname', $letter->lastname) }}" id="lastname" name="lastname"
                                rows="5">
                            @error('lastname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="address">Address</label>
                            <input type="text" class="form-control  @error('address') is-invalid @enderror"
                                value="{{ old('address', $letter->address) }}" id="address" name="address">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="city">City</label>
                            <input type="city" class="form-control @error('city') is-invalid @enderror"
                                value="{{ old('price', $letter->city) }}" id="city" name="city">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="arrival_letter">Arrival letter</label>
                            <input type="text" class="form-control @error('arrival_letter') is-invalid @enderror"
                                value="{{ old('arrival_letter', $letter->arrival_letter) }}" id="arrival_letter"
                                name="arrival_letter">
                            @error('arrival_letter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label for="present">Present</label>
                            <input type="text" class="form-control @error('present') is-invalid @enderror"
                                value="{{ old('present', $letter->present) }}" id="present" name="present">
                            @error('present')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="content_letter">Content letter</label>
                            <textarea type="text" class="form-control @error('content_letter') is-invalid @enderror" id="content_letter"
                                name="content_letter">
                            {{ old('content_letter', $letter->content_letter) }}
                            </textarea>
                            @error('content_letter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="rating">Rating</label>
                            <input type="text" class="form-control @error('rating') is-invalid @enderror"
                                value="{{ old('rating', $letter->rating) }}" id="rating" name="rating">
                            @error('rating')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="delivered">Delivered</label>
                            <input type="text" class="form-control @error('delivered') is-invalid @enderror"
                                value="{{ old('delivered', $letter->delivered) }}" id="delivered" name="delivered">
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
