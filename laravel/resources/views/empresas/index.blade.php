@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <h1 class="pull-left">Empresas</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" style="margin-bottom: 5px" href="{!! route('empresas.create') !!}">Agregar nueva</a>
            </h1>
        </section>
        <div class="card-body">

            @include('empresas.table')

            <div class="text-center">
                {!! $empresas->links() !!}
            </div>
        </div>
    </div>
@endsection
