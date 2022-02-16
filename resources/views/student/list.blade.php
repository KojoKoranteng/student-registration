@extends('layout.master')

@section('page_title', 'List of Students')

@section('content')
<div style="margin-top:100px">
    <a href="/students/add" class="btn btn-primary">Students Registration</a>
</div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Serial #</th>
      <th scope="col">Student Name</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Student ID</th>
      <th scope="col">Gender</th>
      <th scope="col">Contact</th>
      <th scope="col">Programme ID</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($students as $students)
      <tr>
        <th scope="row">{{$students->id}}</th>
        <td>{{$students->fullname}}</td>
        <td>{{$students->dob}}</td>
        <td>{{$students->student_id}}</td>
        <td>{{$students->gender}}</td>
        <td>{{$students->contact}}</td>
        <td>{{$students->programme_id}}</td>
        <td>
            <a type="button"
            href="{{route('updateStudents', ['id' => $students->student_id])}}"
            class="btn btn-primary">Edit</a>

            <button type="button"

            onclick="openModal('{{$students->fullname}}', '{{$students->student_id}}')"
            class="btn btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteStudentModal">Delete</button>
        </td>
      </tr>

      @endforeach
  </tbody>
</table>

 <form action="/students" name="delete_form" method="POST">
    @method('DELETE')
    @csrf
    <input type="hidden" id="student_id_in_form" name="id">
</form>

{{-- confirmation modal --}}
<div class="modal fade" tabindex="-1" id="deleteStudentModal"
data-bs-backdrop="static"
data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            Are you sure you want to delete course :
            <strong><em><span id="student_name_in_modal"></span></em></strong> ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="deleteStudent()" class="btn btn-danger">Yes, delete record</button>
      </div>
    </div>
  </div>
</div>

<script>
    function openModal(courseName, courseId){
       const modalCourseName = document.getElementById('student_name_in_modal');
       const formCourseId = document.getElementById('student_id_in_form');
       modalCourseName.textContent = courseName;
       formCourseId.value = courseId;
    }

    function deleteStudent(){
        const deleteForm = document.forms['delete_form'];
        deleteForm.submit();
    }
</script>
@endsection
