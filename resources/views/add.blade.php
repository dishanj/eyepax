@extends('layouts')
@section('content')
    <main role="main" class="container">
        <h1 class="mt-5">Create Sales User <a type="button" href="/" class="btn btn-secondary float-right">Back to List</a></h1>

        <form>
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Enter name">

            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="emailAddress" class="form-control" name="emailAddress" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Telephone</label>
                <input type="number" id="telephoneNumbers" class="form-control" name="telephoneNumbers" placeholder="Enter telephone">
            </div>
            <div class="form-group">
                <label>Joined Dates</label>
                <input type="date" id="joinedDates" class="form-control" name="joinedDates" placeholder="Enter joined dates">
            </div>
            <div class="form-group">
                <label>Current Routes</label>
                <input type="text" id="currentRoutes" class="form-control" name="currentRoutes" placeholder="Enter current routes">
            </div>
            <div class="form-group">
                <label>Comments</label>
                <textarea class="form-control" id="comments" name="id="comments"" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary submit">Submit</button>
            </div>

        </form>

    </main>
@endsection
<script src="{{ url('/') }}/js/jquery.min.js"></script>
<script src="{{ url('/') }}/js/jquery-ui.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.submit', function() {
        var name = $("#name").val();
        var emailAddress = $("#emailAddress").val();
        var telephoneNumbers = $("#telephoneNumbers").val();
        var joinedDates = $("#joinedDates").val();
        var currentRoutes = $("#currentRoutes").val();
        var comments = $("#comments").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: './sales_user',
            type: "post",
            data: {
                'name': name,
                'emailAddress': emailAddress,
                'telephoneNumbers': telephoneNumbers,
                'joinedDates': joinedDates,
                'currentRoutes': currentRoutes,
                'comments': comments,
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your form has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
              document.location.href = '/';
            },
            error: function(response) {
                var name = response.responseJSON.errors.name?response.responseJSON.errors.name :"";
                var comments = response.responseJSON.errors.comments?response.responseJSON.errors.comments :"";
                var currentRoutes = response.responseJSON.errors.currentRoutes?response.responseJSON.errors.currentRoutes :"";
                var emailAddress = response.responseJSON.errors.emailAddress?response.responseJSON.errors.emailAddress :"";
                var joinedDates = response.responseJSON.errors.joinedDates?response.responseJSON.errors.joinedDates :"";
                var telephoneNumbers = response.responseJSON.errors.telephoneNumbers?response.responseJSON.errors.telephoneNumbers :"";
                if (response.status == 422) {
                    Swal.fire({
                        icon: 'error',
                        title: response.responseJSON.message,
                        text: name+' '+comments+' '+currentRoutes+' '+emailAddress+' '+joinedDates+' '+telephoneNumbers
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.responseJSON.message
                    });

                }

            },
        });
    });
</script>