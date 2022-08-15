@extends('adminlte::page')

@section('title', 'Reportes')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content_header')
    <div class="mb-2 d-flex">
        <h1>Agregar Reportes</h1>
        <button type="button" class="btn btn-primary ms-auto w-25" data-bs-toggle="modal" data-bs-target="#modalReportes">Agregar Reporte</button>
    </div>
@stop

@section('content')
    <table id="tablaReportes" class="table table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Producir</th>
                <th>Enviar a</th>
                <th>Hora</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Formato</th>
                <th>Accion</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($reportesDB as $reporte)
                <tr>
                    <td>{{ $reporte["titulo_reporte"] }}</td>
                    <td>{{ $reporte["desc_reporte"] }}</td>
                    <td>{{ $reporte["tiempo_generar_reporte"] }}</td>
                    <td>{{ $reporte["correo_electronico"] }}</td>
                    <td>{{ $reporte["hora_generar_reporte"] }}</td>
                    <td>{{ $reporte["tipo_reporte"] }}</td>
                    <td>
                        <?php
                            $date = $reporte["fecha_historial_reporte"];
                            $newDate = str_split($date, 10);
                            echo $newDate[0];
                        ?>
                    </td>
                    <td>.{{ $reporte["formato_reporte"] }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="" data-bs-toggle="modal" data-bs-target="#modalEmpresasUpdate"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEmpresasUpdate"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal  INSERTAR-->
    <div class="modal fade" id="modalReportes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Reporte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formReportes" accept="{{ route('controlpanel_ins_reportes') }}" method="POST">
                        <div class="d-flex justify-content-between">
                            <div class="mb-1 me-4">
                                <label class="form-label">Titulo Reporte</label>
                                <input type="text" name="titulo_reporte" class="form-control" placeholder="Ingrese titulo">
                            </div>
                            <div class="mb-1 w-50">
                                <label class="form-label">Correo Electronico</label>
                                <input type="email" name="correo_electronico" class="form-control" placeholder="Ingrese correo">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-1 w-100">
                                <label class="form-label">Descripcion</label>
                                <input type="text" name="desc_reporte" class="form-control" placeholder="Ingrese descripcion">
                            </div>
                        </div>
                       
                        <div>
                            <div class="mb-1">
                                <label class="form-label">Hora</label>
                                <input type="time" min="00:00" max="12:00" name="hora_generar_reporte" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Tipo Reporte</label>
                                <select class="form-select" name="tipo_reporte" aria-label="Default select example">
                                    <option value="null" selected>Seleccione Tipo</option>
                                    <option value="Generado">Generado</option>
                                    <option value="Guardado">Guardado</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="mb-1 w-50">
                                    <label class="form-label">Producir</label>
                                    <select class="form-select" name="tiempo_generar_reporte" aria-label="Default select example">
                                        <option value="null" selected>Seleccione Tipo</option>
                                        <option value="Diariamente">Diariamente</option>
                                        <option value="Semanalmente">Semanalmente</option>
                                        <option value="Mensualmente">Mensualmente</option>
                                        <option value="Anualmente">Anualmente</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Indice</label>
                                    <select class="form-select" name="ind_reporte" aria-label="Default select example">
                                        <option value="null" selected>Seleccione Tipo</option>
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    
                        <div>
                            <div class="mb-1 w-50">
                                <label class="form-label">Seleccione Archivo</label>
                                <input type="file" name="mi_archivo">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-25 me-2">Registrar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                    <button id="btnPrueba" class="btn btn-danger">Prueba</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN INSERTAR -->


@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script src="/js/reportes.js"></script>
    <script>
        $(document).ready( function () {
            $('#tablaReportes').DataTable();
        } );
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@stop

