@extends('layouts/admin')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Aggiungi un nuovo Progetto</h1>
   <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="title">Titolo</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Descrizione</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{old('description')}}">
            @error('description')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year">Anno</label>
            <input class="form-control @error('year') is-invalid @enderror" type="number" name="year" id="year" value="{{old('year')}}">
            @error('year')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- colore --}}
        <div class="mb-3">
            <label for="layout_color">Colore</label>
            <input type="color" class=" rounded @error('layout_color') is-invalid @enderror" name="layout_color" id="layout_color" class="form-control" value="{{old('layout_color') ?? ''}}">
            @error('layout_color')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>


        {{-- is_important --}}
        <div class="mb-3">
            <label for="is_important">Preferiti</label>
            <select name="is_important" id="is_important" class="w-100">
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>

        {{-- Immagine --}}
        <div class="mb-3">
            <label for="cover_image">Immagine</label>
            <input class="form-control @error('cover_image') is-invalid @enderror" type="file" name="cover_image" id="cover_image" value="{{old('cover_image')}}">
            @error('cover_image')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- Tipologia --}}
        <div class="mb-3">
            <label for="type_id">Tipologia</label>
            <select name="type_id" id="type_id" class="w-100">
                <option value=""></option>

                @foreach ($types as $type)
                    <option value="{{$type->id}}"{{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>

        {{-- Tecnologia --}}
        <div class="mb-3 form-group">
            @foreach ($technologies as $technology)
            <div class="form-check">
                <input type="checkbox" name="technology[]" id="technology{{$technology->id}}" value="{{$technology->id}}">
                <label for="{{$technology->id}}">{{$technology->name}}</label>
            </div>
            @endforeach
        </div>

        <input type="submit" class="btn btn-primary" value="Crea">
    </form>
</div>
@endsection