@extends('adminlte::page')

@section('title', 'Agregar Reportes')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content_header')
    <div class="mb-2 d-flex">
        <h1>Agregar Reportes</h1>
        <button type="button" class="btn btn-primary ms-auto w-25" data-bs-toggle="modal" data-bs-target="#modalEmpresas">Agregar Reporte</button>
    </div>

@stop

@section('content')
    <table id="example" class="table table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Enviar a</th>
                <th>Hora</th>
                <th>Tiempo</th>
                <th>Formato</th>
                <th>Fecha</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($empresasDB as $empresa)
                <tr>
                    <td>{{ $empresa["nom_empresa"] }}</td>
                    <td>{{ $empresa["tip_empresa"] }}</td>
                    <td>{{ $empresa["num_telefono"] }}</td>
                    <td>{{ $empresa["nom_pais"] }}</td>
                    <td>{{ $empresa["nom_depto"] }}</td>
                    <td>{{ $empresa["nom_municipio"] }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="actualizar_empresa({{ $empresa['cod_empresa'] }})" data-bs-toggle="modal" data-bs-target="#modalEmpresasUpdate"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEmpresasUpdate"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal  INSERTAR-->
    <div class="modal fade" id="modalEmpresas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEmpresa" action="{{ route('controlpanel_empresas_ins') }}" method="get">
                        <div class="d-flex justify-content-between">
                            <div class="mb-1 me-4">
                                <label class="form-label">Nombre Empresa</label>
                                <input type="text" name="nom_empresa" class="form-control" placeholder="Ingrese nombre de empresa">
                            </div>
                            <div class="mb-1 w-50">
                                <label class="form-label">Tipo Empresa</label>
                                <input type="text" name="tip_empresa" class="form-control" placeholder="Ingrese tipo de empresa">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-1">
                                <label class="form-label">Numero Telefono</label>
                                <input type="text" name="num_telefono" class="form-control" pattern="^[0-9]{8}$" placeholder="Ingrese tel. de empresa">
                            </div>
                            <div class="mb-1 w-50">
                                <label class="form-label">Tipo Telefono</label>
                                <select class="form-select" name="tip_telefono" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Tipo</option>
                                    <option value="F">Fijo</option>
                                    <option value="C">Celular (movil)</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="mb-1">
                                <label class="form-label">Pais</label>
                                <select class="form-select" id="selectPais" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Pais</option>
                                    @foreach ($paises as $miPais)
                                        <option value="{{$miPais['cod_pais']}}">{{ $miPais["nom_pais"] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Departamento</label>
                                <select class="form-select" id="selectDepto" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Depto</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Municipio</label>
                                <select class="form-select" name="cod_municipio" id="selectMunicipio" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Municipio</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Descripcion Direccion</label>
                            <textarea class="form-control" name="desc_direccion" placeholder="Ingrese una descripcion de direccion" cols="30" rows="5" style="resize:none;"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-25 me-2">Registrar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN INSERTAR -->


    
    <!-- Modal  ACTUALIZAR-->
    <div class="modal fade" id="modalEmpresasUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEmpresaUpt" action="prueba" method="get">
                        <div class="d-flex justify-content-between">
                            <div class="mb-1 me-4">
                                <label class="form-label">Nombre Empresa</label>
                                <input type="text" name="nom_empresa_upt" class="form-control" placeholder="Ingrese nombre de empresa">
                            </div>
                            <div class="mb-1 w-50">
                                <label class="form-label">Tipo Empresa</label>
                                <input type="text" name="tip_empresa_upt" class="form-control" placeholder="Ingrese tipo de empresa">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-1">
                                <label class="form-label">Numero Telefono</label>
                                <input type="text" name="num_telefono_upt" class="form-control" pattern="^[0-9]{8}$" placeholder="Ingrese tel. de empresa">
                            </div>
                            <div class="mb-1 w-50">
                                <label class="form-label">Tipo Telefono</label>
                                <select class="form-select" name="tip_telefono_upt" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Tipo</option>
                                    <option value="F">Fijo</option>
                                    <option value="C">Celular (movil)</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="mb-1">
                                <label class="form-label">Pais</label>
                                <select class="form-select" id="selectPaisUpt" aria-label="Default select example">
                                    <option value="null" name="selectNamePais" selected>Seleccione Pais</option>
                                    @foreach ($paises as $miPais)
                                        <option value="{{$miPais['cod_pais']}}">{{ $miPais["nom_pais"] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Departamento</label>
                                <select class="form-select" id="selectDeptoUpt" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Depto</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Municipio</label>
                                <select class="form-select" name="cod_municipio_upt" id="selectMunicipioUpt" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Municipio</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Descripcion Direccion</label>
                            <textarea class="form-control" name="desc_direccion_upt" placeholder="Ingrese una descripcion de direccion" cols="30" rows="5" style="resize:none;"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-25 me-2">Registrar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN ACTUALIZAR -->



@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
   
    <script src="/js/empresas.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@stop


