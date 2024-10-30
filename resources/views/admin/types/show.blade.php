@extends('layouts.app')

@section('page-title', 'Il mio type')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1>Il mio type</h1>

            <ul>

                <li>
                    ID:{{ $type->id }}</th>
                </li>

                <li>
                    Titolo: {{ $type->name }}
                </li>

                <li>
                    Slug: {{ $type->slug }}
                </li>

            </ul>


        </div>
    </div>
@endsection
