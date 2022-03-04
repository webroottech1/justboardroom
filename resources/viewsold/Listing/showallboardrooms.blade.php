@extends('layouts.master')
@section('content')
<style>
    #UsersList {
        margin-top: 9rem;
        margin-left: 6rem;
        margin-right: 6rem;
    }
</style>
<div id="UsersList">
    <select id="SelectUser">
        <option value="0" selected>Select User</option>
        @foreach ($AllUser as $UserEmail)
        <option value="{{$UserEmail}}">{{$UserEmail}}</option>

        @endforeach
    </select>
</div>

<div id="list">

</div>

<script>
    $(document).ready(() => {
        $('#SelectUser').on('change', function() {
            
            var selectedUser = $(this).find(':selected').val();
            
            if (selectedUser != 0) {
                $.ajax({
                    url:'{{url("/")}}/api/getuserbroadrooms',
                    method:'POST',
                    data:{
                        _token:"{{csrf_token()}}",
                        email:selectedUser
                    },
                    success:function(response){
                        $('#list').empty();
                        $('#list').html(response.html);
                    }
                })
            }

        });
    });
</script>
@endsection