@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <h1>
                Empleados
            </h1>
        </section>
        <div class="card-body">
            <div class="container">
                <div class="row" style="padding-left: 20px">
                    @include('empleados.show_fields')
                    <div class="col-6">
                        <a href="{!! route('empleados.index') !!}" class="btn btn-outline-secondary">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
