
@extends('layout.master')


@section('page_title','List of Programmes')


@section('content')


  <div style="margin-top:100px">
    <a href="/programmes/add" class="btn btn-outline-success">Add Programme</a>
  </div>

  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Type programme name or ID to search" aria-label="Search">
    <button class="btn btn-outline-primary" type="submit">Search</button>
  </form>

  <table class="table">
    <thead>
      <tr  align="center">
        <th scope="col">Programme Name</th>
        <th scope="col">Programme ID</th>
        <th scope="col">Programme Duration</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($programmes as $programme)
            <tr  align="center">
                <th scope="row">{{$programme->prog_name}}</th>
                <td align="center">{{$programme->prog_id}}</td>
                <td align="center">{{$programme->duration}} day(s)</td>
                <td>
                  <a type="button"
                  href="{{route('updateProgramme', ['id' => $programme->id])}}"
                  class="btn btn-primary">Edit</a>
      
                  <button type="button"
                  onclick="openModal('{{$programme->prog_name}}', '{{$programme->id}}')"
                  class="btn btn-danger"
                  data-bs-toggle="modal"
                  data-bs-target="#deleteCourseModal">Delete</button>
              </td>
            </tr>

        @endforeach

    </tbody>
  </table>
  {{$programmes->links()}}

  <form action="/programmes" name="delete_form" method="POST">
    @method('DELETE')
    @csrf
    <input type="hidden" id="prog_id_in_form" name="id">
</form>

{{-- confirmation modal --}}
<div class="modal fade" tabindex="-1" id="deleteProgModal"
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
            <strong><em><span id="prog_name_in_modal"></span></em></strong> ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="deleteCourse()" class="btn btn-danger">Yes, delete record</button>
      </div>
    </div>
  </div>
</div>

<script>
    function openModal(prog_name, prog_id){
       const modalProgName = document.getElementById('prog_name_in_modal');
       const formProgId = document.getElementById('prog_id_in_form');
       modalProgName.textContent = prog_name;
       formProgId.value = prog_id;
    }

    function deleteProgramme(){
        const deleteForm = document.forms['delete_form'];
        deleteForm.submit();
    }
</script>

@endsection

