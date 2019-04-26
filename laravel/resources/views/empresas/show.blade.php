@extends('layouts.app')

@section('styles')
    <style>
        img{
            max-width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <section class="card-header">
            <h1>
                Empresas
            </h1>
        </section>
        <div class="card-body">
            <div class="container">
                <div class="row" style="padding-left: 20px">
                    @include('empresas.show_fields')
                    <div class="col-6">
                        <a href="{!! route('empresas.index') !!}" class="btn btn-outline-secondary">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
