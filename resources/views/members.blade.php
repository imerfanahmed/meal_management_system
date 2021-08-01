@extends('layouts.master')

@section('body')

        <!-- Button trigger modal -->
        <div class="app-content content ">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMmember">
    Add Member
  </button>

  <!-- Modal -->
  <div class="modal fade" id="addMmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
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
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button onclick="addMember()" type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>

  <div class="card text-left">
    <div class="card-body">
      <h4 class="card-title">Member List</h4>
      @include('members_list')
    </div>
  </div>

        </div>
  @endsection

@section('scripts')

@endsection
