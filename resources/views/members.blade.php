@extends('layouts.base')

@section('content')

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" required  class="form-control" id="name" placeholder="Erfan Ahmed Siam">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input type="phone" required  class="form-control" id="phone" placeholder="01420420420">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Address</label>
                  <input type="email" class="form-control" id="email" placeholder="erfan@example.com">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button onclick="addMember()" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
