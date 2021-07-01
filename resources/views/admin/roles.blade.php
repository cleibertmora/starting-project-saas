@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrar Roles y Permisos <button type="button" id="btn_test" class="btn btn-primary float-end">Test</button></div>

                <div class="card-body">
                    @foreach ($permission_per_rol as $rol)
                        <b>{{ $rol->name }}:</b> <br>

                        <ul>
                            @foreach ($rol->permisos as $p)
                            <li>
                                <div class="form-check">
                                    <input {{ $p->puede ? 'checked' : '' }} data-permiso="{{ $p->permiso }}" data-role="{{ $rol->name }}" class="form-check-input assign_or_revome_permission" type="checkbox" value="" id="{{ $p->id }}">
                                    <label class="form-check-label" for="{{ $p->permiso }}">
                                        {{ $p->permiso }}
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
