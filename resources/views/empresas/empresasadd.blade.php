@extends('adminlte::page')

@section('title', 'Agregar Empresas')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

@section('content_header')
    <h1>Registrar Empresas</h1>
@stop

@section('content')
    <form id="formEmpresa" action="{{ route('controlpanel_empresas_ins') }}" method="get">
        <div class="d-flex justify-content-between">
            <div class="mb-3 w-75 me-5">
                <label class="form-label">Nombre Empresa</label>
                <input type="text" name="nom_empresa" class="form-control" placeholder="Ingrese nombre de empresa">
            </div>
            <div class="mb-3 w-25">
                <label class="form-label">Tipo Empresa</label>
                <input type="text" name="tip_empresa" class="form-control" placeholder="Ingrese tipo de empresa">
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="mb-3 w-25">
                <label class="form-label">Numero Telefono</label>
                <input type="text" name="num_telefono" class="form-control" pattern="^[0-9]{8}$" placeholder="Ingrese tel. de empresa">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo Telefono</label>
                <select class="form-select" name="tip_telefono" aria-label="Default select example">
                    <option value="null" selected>Seleccione Tipo</option>
                    <option value="F">Fijo</option>
                    <option value="C">Celular (movil)</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Pais</label>
                <select class="form-select" id="selectPais" aria-label="Default select example">
                    <option value="null" selected>Seleccione Pais</option>
                    @foreach ($paises as $miPais)
                        <option value="{{$miPais['cod_pais']}}">{{ $miPais["nom_pais"] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Departamento</label>
                <select class="form-select" id="selectDepto" aria-label="Default select example">
                    <option value="null" selected>Seleccione Depto</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Municipio</label>
                <select class="form-select" name="cod_municipio" id="selectMunicipio" aria-label="Default select example">
                    <option value="null" selected>Seleccione Municipio</option>
                </select>
            </div>
        </div>
      
        <div class="mb-3">
            <label class="form-label">Descripcion Direccion</label>
            <textarea class="form-control" name="desc_direccion" placeholder="Ingrese una descripcion de direccion" cols="30" rows="8" style="resize:none;"></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-25">Registrar</button>
        </div>
    </form>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
   
    <script src="/js/empresas.js"></script>

@stop


