<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    <b>{!! Form::label('logo', 'Logo:') !!}</b>
    <div class="custom-file">
        {!! Form::label('logo', 'Elegir archivo', ['class' => 'custom-file-label', 'lang' => 'es']) !!}
        {!! Form::file('logo',['class' => 'form-control custom-file-input','id'=>'logo','accept'=>'image/jpeg, image/jpg, image/png, image/gif']) !!}
    </div>
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empresas.index') !!}" class="btn btn-outline-secondary">Cancelar</a>
</div>
