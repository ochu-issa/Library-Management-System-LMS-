@extends('layout/app')
@section('content')
    <livewire:manage-user>
@endsection

    @section('script-user')
        <script>
            window.addEventListener('close-modal', event => {
                $('#adduser').modal('hide');
                $('#edituser').modal('hide');
                $('#deleteuser').modal('hide');
            })
        </script>
    @endsection
