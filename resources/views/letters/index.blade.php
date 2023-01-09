@extends('layouts.app')


@section('content')
    <section class="bg-secondary">
        <div class="container py-4">
            <h2 class="text-center">All the letters</h2>
        </div>
    </section>

    <section>
        <div class="container mt-4">
            <div class="text-end mb-4">
                <a href="{{ route('letters.create') }}" class="btn btn-primary">Add a new Letter</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Present</th>
                        <th scope="col">Content</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Delivered</th>
                        <th scope="col">Actions</th>




                    </tr>
                </thead>
                <tbody>
                    @foreach ($letters as $letter)
                        <tr>
                            <td scope="row">{{ $letter->name }}</td>
                            <td>{{ $letter->lastname }}</td>
                            <td>{{ $letter->address }}</td>
                            <td>{{ $letter->city }}</td>
                            <td>{{ $letter->arrival_letter }}</td>
                            <td>{{ $letter->present }}</td>
                            <td>{{ $letter->content_letter }}</td>
                            <td>{{ $letter->rating }} <i class="fa-solid fa-heart"></i></td>
                            {{-- <td>{{letter->delivered === 0 ? 'no' : 'si'}}</td> --}}
                            @if ($letter->delivered === 1)
                                <td>
                                    <i class="fa-solid fa-gift"></i>
                                </td>
                            @else
                                <td>
                                    <i class="fa-solid fa-spinner"></i>
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('letters.show', $letter->id) }}" class="btn btn-success">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{ route('letters.edit', $letter->id) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>


                                <form action="{{ route('letters.destroy', $letter->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"
                                        data-letter-name="{{ $letter->name }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('partials.delete-modal')
    </section>
@endsection
