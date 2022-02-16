
@extends('layout.master')


@section('page_title','Register')

@section('content')

    @if($edit)
        <h3>Edit Student Details: {{$student->fullname}}</h3>
    @else
        <h3>New Registration</h3>
    @endif

    <form action="/students" method="POST" style="margin-top:100px">
        @csrf

        @if($edit)
            <input type="hidden" name="student_id" value="{{$student->student_id}}">
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="fullname" class="form-label">Student Name</label>
            <input type="text" required
            minlength="10" maxlength="100"
            class="form-control @error('fullname') is-invalid @enderror"
            name="fullname"
            value="{{old('fullname') ? old('fullname') : $student->fullname}}" >
            @error('fullname')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" required
            minlength="4" maxlength="15"
            class="form-control @error('dob') is-invalid @enderror"
            name="dob"
            value="{{old('dob') ? old('dob') : $student->dob}}" >
            @error('dob')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>  
          
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" required
            minlength="10" maxlength="40"
            class="form-control @error('student_id') is-invalid @enderror"
            name="student_id"
            value="{{old('student_id') ? old('student_id') : $student->student_id}}" >
            @error('student_id')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" required
            minlength="4" maxlength="15"
            class="form-control @error('gender') is-invalid @enderror"
            name="dob"
            value="{{old('gender') ? old('gender') : $student->gender}}" >
            @error('gender')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" required
            minlength="4" maxlength="15"
            class="form-control @error('contact') is-invalid @enderror"
            name="contact"
            value="{{old('contact') ? old('contact') : $student->contact}}" >
            @error('contact')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">Student Picture</label>
            <input type="file" required
            minlength="10" maxlength="100"
            class="form-control @error('picture') is-invalid @enderror"
            name="picture"
            value="{{old('picture') ? old('picture') : $student->picture}}" >
            @error('picture')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="programme_id" class="form-label">Date of Birth</label>
            <input type="text" required
            minlength="4" maxlength="15"
            class="form-control @error('programme_id') is-invalid @enderror"
            name="programme_id"
            value="{{old('programme_id') ? old('programme_id') : $programmes->programme_id}}" >
            @error('programme_id')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}

        <button type="sumbit" class="btn btn-primary">Submit</button>

    </form>

@endsection