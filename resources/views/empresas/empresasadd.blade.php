@extends('adminlte::page')

@section('title', 'Agregar Empresas')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

@section('content_header')
    <h1>Registrar Empresas</h1>
@stop

@section('content')
    <form>
        <div class="mb-3">
            <label class="form-label">Nombre Empresa</label>
            <input type="text" class="form-control" placeholder="Ingrese nombre de empresa">
        </div>
        <div class="d-flex justify-content-between">
            <div class="mb-3 w-25">
                <label class="form-label">Numero Telefono</label>
                <input type="text" class="form-control" placeholder="Ingrese nombre de empresa">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo Telefono</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Seleccione Tipo</option>
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
                    <option selected>Open this select menu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Municipio</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
      
        <div class="mb-3">
            <label class="form-label">Descripcion Direccion</label>
            <textarea class="form-control" placeholder="Ingrese una descripcion de direccion" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <button class="btn btn-primary" id="btnAceptar" >Aceptar</button>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-success">
        <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Likes</span>
        <span class="info-box-number">41,410</span>
        <div class="progress">
        <div class="progress-bar" style="width: 50%"></div>
        </div>
            <span class="progress-description">
            70% Increase in 30 Days
            </span>
        </div>
        </div>
    </div>

@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script>
        const selectPais = document.getElementById('selectPais')
        const selectDepto = document.getElementById('selectDepto')

        // const limpiarSelect = (inputSelect) => {
        //     const tamanio = inputSelect.options.length;
        //     console.log(tamanio)
        // }

        selectPais.addEventListener('change', async (e) =>{
            let idPais = selectPais.value;

            if(idPais !== 'null'){
                fetch(`http://localhost:3000/depto/pais/${idPais}`)
                .then(res => res.json())
                .then(data => {
                    const {result} = data;
                    const fragmento = document.createDocumentFragment()

                    result.forEach(element => {
                        // console.log(element.cod_depto)
                        const option = document.createElement('option');
                        option.setAttribute('value', element.cod_depto);
                        option.textContent = element.nom_depto;

                        fragmento.appendChild(option)
                    });
                    selectDepto.appendChild(fragmento)
                })
            }
            
        })

    </script>
@stop


