@extends('adminlte::page')

@section('title', 'Congreso')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1>Agregar usuarios</h1>
        <button onclick="goBack()" class="btn btn-info"><i class="fas fa-arrow-left"></i> Volver</button>
    </div>
@stop

@section('content')

    @livewire('admin.users.form-create')

@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
        var Toast = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        $(document).ready(function() {
            bsCustomFileInput.init()
        })
    </script>
@stop
