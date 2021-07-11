@extends('layouts')
@section('content')
    <main role="main" class="container">
        <h1 class="mt-5">Sales Team <button type="button" class="btn btn-secondary float-right"><a href="/add">Add New</a></button></h1>
        <div class="form-group">
        
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Current Routes</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @php
         $serail = 1;
         @endphp
         @foreach ($data as $value)
                <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->emailAddress}}</td>
                    <td>{{$value->telephoneNumbers}}</td>
                    <td>{{$value->currentRoutes}}</td>
                    <td><a id="{{$value->id}}" data-toggle="modal" class="view" data-target="#myModal" href="#">View</a> | <a  href="/edit/{{$value->id}}">Edit</a> | <a id="{{$value->id}}" class="delete" href="#">Delete</a></td>
                </tr>
                @php
         $serail++;
         @endphp
         @endforeach
            </tbody>
        </table>
    </main>
    @endsection


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View User</h4>
      </div>
      <div class="modal-body" id="output">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="{{ url('/') }}/js/jquery.min.js"></script>
<script src="{{ url('/') }}/js/jquery-ui.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
 $(document).on('click', '.delete', function() {
    var id = this.id;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/sales_user/'+id,
            type: "delete",
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your form has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(function(){
                window.location.reload(1);
                }, 1000);
            },
            error: function(response) {
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.responseJSON.message
                    });
            },
        });

    });
    

 $(document).on('click', '.view', function() {
    var id = this.id;

    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/sales_user/'+id,
            type: "get",
            dataType: 'json',
            success: function(response) {
                var name  = response.name;
                var emailAddress = response.emailAddress;
                var telephoneNumbers = response.telephoneNumbers;
                var joinedDates = response.joinedDates;
                var currentRoutes = response.currentRoutes;
                var comments = response.comments;

                $('#output').html("<b>Name: </b>"+name+"<br/><b> Email: </b>"+emailAddress+"<br/><b> Telephone: </b>"+telephoneNumbers+"<br/><b> Joined Dates: </b>"+joinedDates+"<br/><b> Current Routes: </b>"+currentRoutes+"<br/><b> Comments: </b>"+comments);
            },
            error: function(response) {
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.responseJSON.message
                    });
            },
        });
 });
     
    </script>