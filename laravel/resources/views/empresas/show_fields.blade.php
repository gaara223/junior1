

<!-- Name Field -->
<div class="form-group col-6">
    <b>{!! Form::label('name', 'Name:') !!}</b>
    <p>{!! $empresas->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-6">
    <b>{!! Form::label('email', 'Email:') !!}</b>
    <p>{!! $empresas->email !!}</p>
</div>

<!-- Logo Field -->
<div class="form-group col-6">
    <b>{!! Form::label('logo', 'Logo:') !!}</b>
    <p><img src="{!! $empresas->logo_url !!}" alt="{!! $empresas->logo !!}"></p>
</div>

<!-- Website Field -->
<div class="form-group col-6">
    <b>{!! Form::label('website', 'Website:') !!}</b>
    <p>{!! $empresas->website !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-6">
    <b>{!! Form::label('created_at', 'Created At:') !!}</b>
    <p>{!! $empresas->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-6">
    <b>{!! Form::label('updated_at', 'Updated At:') !!}</b>
    <p>{!! $empresas->updated_at !!}</p>
</div>

