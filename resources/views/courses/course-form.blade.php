
@extends('layout.master')


@section('page_title','Add a Course')

@section('content')

    @if($edit)
        <h3>Edit Course: {{$course->name}}</h3>
    @else
        <h3>Add New Course</h3>
    @endif

    <form action="/courses" method="POST" style="margin-top:100px">
        @csrf

        @if($edit)
            <input type="hidden" name="id" value="{{$course->id}}">
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" required
            minlength="10" maxlength="100"
            class="form-control @error('course_name') is-invalid @enderror"
            name="course_name"
            value="{{old('course_name') ? old('course_name') : $course->course_name}}" >
            @error('course_name')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Course ID</label>
            <input type="text" required
            minlength="4" maxlength="15"
            class="form-control @error('course_id') is-invalid @enderror"
            name="course_id"
            value="{{old('course_id') ? old('course_id') : $course->course_id}}" >
            @error('course_id')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>  
          
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" required
            minlength="10" maxlength="40"
            class="form-control @error('duration') is-invalid @enderror"
            name="duration"
            value="{{old('duration') ? old('duration') : $course->duration}}" >
            @error('duration')
             <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="sumbit" class="btn btn-primary">Submit</button>

    </form>

@endsection