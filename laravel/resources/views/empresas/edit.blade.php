@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <h1>
                Empresas
            </h1>
        </section>
        <div class="card-body">
            
            {!! Form::model($empresas, ['id' => 'myform', 'route' => ['empresas.update', $empresas->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
                <div class="container">
                    <div class="row">

                            @include('empresas.fields')

                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
