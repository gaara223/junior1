@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <h1 class="pull-left">Empleados</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" style="margin-bottom: 5px" href="{!! route('empleados.create') !!}">Agregar nuevo</a>
            </h1>
        </section>
        <h1>Reinaldo</h1>
        <div class="card-body">

            @include('empleados.table')

            <div class="text-center">
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
@endsection
