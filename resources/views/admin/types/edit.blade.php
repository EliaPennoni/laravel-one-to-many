@extends('layouts.app')

@section('page-title', 'modifica il type')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1>modifica il type</h1>
            <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="64"
                        placeholder="inserisci il nome">
                </div>

                <button type="submit" class="btn btn-success w-100"> invia</button>
            </form>


        </div>
    </div>
@endsection
