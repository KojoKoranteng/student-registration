@extends('layout.master')


@section('page_title','Add a Programme')

@section('content')

    @if($edit)
        <h3>Edit Course: {{$programmes->prog_name}}</h3>
    @else
        <h3>Add New Course</h3>
    @endif
    
    <form action="/programmes" method="POST" style="margin-top:100px">
        @csrf

        @if($edit)
            <input type="hidden" name="id" value="{{$programmes->id}}">
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="prog_name" class="form-label">Programme Name</label>
            <input type="text" required
            minlength="10" maxlength="100"
            class="form-control @error('prog_name') is-invalid @enderror"
            name="prog_name"
            value="{{old('prog_name') ? old('prog_name') : $programmes->prog_name}}" >
            @error('prog_name')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="prog_id" class="form-label">Programme ID</label>
            <input type="text" required
            minlength="10" maxlength="100"
            class="form-control @error('prog_id') is-invalid @enderror"
            name="prog_id"
            value="{{old('prog_id') ? old('prog_id') : $programmes->prog_name}}" >
            @error('prog_id')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" required
            minlength="10" maxlength="100"
            class="form-control @error('duration') is-invalid @enderror"
            name="duration"
            value="{{old('duration') ? old('duration') : $programmes->duration}}" >
            @error('duration')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="sumbit" class="btn btn-outline-success">Submit</button>

    </form>

@endsection