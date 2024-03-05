<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12 d-md-none">
                {{ Form::hidden('personal_id', $personal->id) }}
                <div class="form-group">
                    {{ Form::label('tipo_documento') }}
                    {{ Form::select('tipo_documento', $tiposDocumentos, optional($personal->tipoDocumento)->id, ['class' => 'form-control' . ($errors->has('tipo_documento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Tipo de Documento']) }}
                    {!! $errors->first('tipo_documento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('numero_documento') }}
                    {{ Form::text('numero_documento', $personal->numero_documento, ['class' => 'form-control' . ($errors->has('numero_documento') ? ' is-invalid' : ''), 'placeholder' => 'Numero Documento']) }}
                    {!! $errors->first('numero_documento', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('nombres') }}
                    {{ Form::text('nombres', $personal->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('apellidos') }}
                    {{ Form::text('apellidos', $personal->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                    {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('direccion') }}
                    {{ Form::text('direccion', $personal->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('correo') }}
                    {{ Form::text('correo', $personal->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                    {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('fecha_nacimiento') }}
                    {{ Form::date('fech_nacimiento', $personal->fech_nacimiento, ['class' => 'form-control datetimepicker-input' . ($errors->has('fech_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Nacimiento', 'id' => 'fech_nacimiento']) }}
                    {!! $errors->first('fech_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('telefono') }}
                    {{ Form::text('telefono', $personal->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('cursos', 'Curso') }}
                    {{ Form::select('cursos', $curso , optional($personal->curso)->id, ['class' => 'form-control' . ($errors->has('cursos') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione su curso']) }}
                    {!! $errors->first('cursos', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                  <div class="form-group">
                    {{ Form::label('genero') }}
                    {{ Form::select('genero', $generos, optional($personal->generos)->id, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Genero']) }}
                    {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
             <!-- Columnas para web -->
             <div class="col-md-6 d-none d-md-block">
                <div class="form-group">
                    {{ Form::label('tipo_documento') }}
                    {{ Form::select('tipo_documento', $tiposDocumentos, optional($personal->tipoDocumento)->id, ['class' => 'form-control' . ($errors->has('tipo_documento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Tipo de Documento']) }}
                    {!! $errors->first('tipo_documento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('numero_documento') }}
                    {{ Form::text('numero_documento', $personal->numero_documento, ['class' => 'form-control' . ($errors->has('numero_documento') ? ' is-invalid' : ''), 'placeholder' => 'Numero Documento']) }}
                    {!! $errors->first('numero_documento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('nombres') }}
                    {{ Form::text('nombres', $personal->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('apellidos') }}
                    {{ Form::text('apellidos', $personal->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                    {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('cursos', 'Cursos') }}
                    {{ Form::select('cursos', $curso , optional($personal->curso)->id, ['class' => 'form-control' . ($errors->has('cursos') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione su curso']) }}
                    {!! $errors->first('cursos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-6 d-none d-md-block">
                <div class="form-group">
                    {{ Form::label('direccion') }}
                    {{ Form::text('direccion', $personal->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('correo') }}
                    {{ Form::text('correo', $personal->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                    {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('fecha_nacimiento') }}
                    {{ Form::date('fech_nacimiento', $personal->fech_nacimiento, ['class' => 'form-control datetimepicker-input' . ($errors->has('fech_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Nacimiento', 'id' => 'fech_nacimiento']) }}
                    {!! $errors->first('fech_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('telefono') }}
                    {{ Form::text('telefono', $personal->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('genero') }}
                    {{ Form::select('genero', $generos, optional($personal->generos)->id, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Genero']) }}
                    {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
    </div>
</div>

