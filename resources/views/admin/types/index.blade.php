@extends('layouts.app')

@section('page-title', 'Tutti i tipi')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1>tutti i tipi</h1>
            <a href="{{ route('admin.types.create') }}" class="btn btn-success w-100 mb-3">crea</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Numero di progetti connessi</th>
                        <th scope="col">Vai</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td> {{ $type->name }} </td>
                            <td> {{ $type->slug }} </td>
                            <td>
                                {{ $type->projects()->count() }}
                            </td>
                            <td>
                                <a href="{{ route('admin.types.show', ['type' => $type->id]) }}"
                                    class="btn btn-success">Visualizza</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}"
                                    class="btn btn-warning">Aggiorna</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Delete</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
