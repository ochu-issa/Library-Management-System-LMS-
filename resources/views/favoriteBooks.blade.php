@extends('layout/app')
@section('content')
    <livewire:popula-book>
@endsection

    @section('script-book')
        <script>
            window.addEventListener('close-modal', event => {
                $('#addbook').modal('hide');
                $('#editbook').modal('hide');
                $('#deletebook').modal('hide');
            })
        </script>
    @endsection
