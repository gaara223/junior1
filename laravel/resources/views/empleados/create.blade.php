@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <h1>
                Empleados
            </h1>
        </section>
        <div class="card-body">
            
            {!! Form::open(['route' => 'empleados.store']) !!}
                <div class="container">
                    <div class="row">

                            @include('empleados.fields')

                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
