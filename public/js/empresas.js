// Inputs de Insertar
const selectPais = document.getElementById('selectPais')
const selectDepto = document.getElementById('selectDepto')
const selectMunicipio = document.getElementById('selectMunicipio')
const formEmpresa = document.getElementById('formEmpresa')

// Inputs de Actualizar
const btnActualizar = document.getElementsByClassName('btnActualizar')
const selectPaisUpt = document.getElementById('selectPaisUpt')
const selectDeptoUpt = document.getElementById('selectDeptoUpt')
const selectMunicipioUpt = document.getElementById('selectMunicipioUpt')
const formEmpresaUpt = document.getElementById('formEmpresaUpt')



// FUNCIONES DE VALIDACION
const contains_data = (element) => {
    const arr = Object.values(element)
    const res = arr.every(item => item.trim().length > 0 && item !== "null")

    return res;
}

const actualizar_empresa = (idEmpresa) => {
    if (!Number(idEmpresa)) {
        return alert('El dato enviado esta incorrecto.')
    }
    fetch(`empresas-show/${idEmpresa}`)
        .then(res => res.json())
        .then(data => {
            console.log(data)

            let prueba = `{{ route('empresas-upt/${data[0].cod_empresa}') }}`
            let prueba2 = `empresa-upt/${data[0].cod_empresa}`
            formEmpresaUpt.nom_empresa_upt.value = data[0].nom_empresa;
            formEmpresaUpt.tip_empresa_upt.value = data[0].tip_empresa;
            formEmpresaUpt.num_telefono_upt.value = data[0].num_telefono;
            formEmpresaUpt.tip_telefono_upt.value = data[0].tip_telefono;
            formEmpresaUpt.desc_direccion_upt.value = data[0].desc_direccion;
            formEmpresaUpt.action = prueba2;
            // formEmpresaUpt.action = `Hola mundo`
            // formEmpresaUpt.action = ' prueba'
        })
}

const limpiarSelect = (selectDepto) => {
    // console.log(selectDepto.children.length);
    for (let index = selectDepto.children.length; index >= 1; index--) {
        selectDepto.remove(index)
            // console.log(index)
    }
}

const selectDepto_xPais_orMunicipio_xDepto = (elementoSelect, elementoAEnviarDatos, url, opcion, limpiarMunicipio, limpiarDepto) => {
    if (elementoSelect.selectedIndex !== 0) {
        // console.log('jols')
        const idPaisOrDepto = elementoSelect.value;
        let urlCompleta = url + idPaisOrDepto;
        // console.log(urlCompleta)

        fetch(urlCompleta)
            .then(res => res.json())
            .then(data => {
                // console.log(data)
                const arrData = data['result']
                limpiarSelect(limpiarMunicipio)
                if (opcion) { // Si es true (cosa que solo lo enviara el SelectPais para eliminar los Deptos y Municipios)
                    limpiarSelect(limpiarDepto)
                }

                const fragment = document.createDocumentFragment()
                arrData.forEach(element => {
                    const option = document.createElement('option')
                    if (opcion) {
                        option.setAttribute('value', element.cod_depto)
                        option.textContent = element.nom_depto;
                    } else {
                        option.setAttribute('value', element.cod_municipio)
                        option.textContent = element.nom_municipio;
                    }
                    fragment.append(option)
                        // console.log(element)
                });
                elementoAEnviarDatos.append(fragment)
            })
    }
}


// Eventos de Insertar
selectPais.addEventListener('change', (e) => {
    selectDepto_xPais_orMunicipio_xDepto(selectPais, selectDepto, 'empresas-getdeptoxpais/', true, selectMunicipio, selectDepto)
})

selectDepto.addEventListener('change', (e) => {
    selectDepto_xPais_orMunicipio_xDepto(selectDepto, selectMunicipio, 'empresas-getmunicipioxdepto/', false, selectMunicipio, selectDepto)
})

formEmpresa.addEventListener('submit', e => {
    e.preventDefault()
    const data = Object.fromEntries(
        new FormData(e.target)
    )

    if (!contains_data(data)) {
        return toastr.error('Alguno de los campos esta incorrecto.')
    }

    toastr.success('Empresa registrada con exito!')
    formEmpresa.submit()
})


// Eventos de Actualizar
selectPaisUpt.addEventListener('change', (e) => {
    selectDepto_xPais_orMunicipio_xDepto(selectPaisUpt, selectDeptoUpt, 'empresas-getdeptoxpais/', true, selectMunicipioUpt, selectDeptoUpt)
})

selectDeptoUpt.addEventListener('change', (e) => {
    selectDepto_xPais_orMunicipio_xDepto(selectDeptoUpt, selectMunicipioUpt, 'empresas-getmunicipioxdepto/', false, selectMunicipioUpt, selectDeptoUpt)
})


formEmpresaUpt.addEventListener('submit', e => {
    e.preventDefault()
    const data = Object.fromEntries(
        new FormData(e.target)
    )

    // if (!contains_data(data)) {
    //     return toastr.error('Alguno de los campos esta incorrecto.')
    // }

    toastr.success('Empresa actualizada con exito!')
    formEmpresaUpt.submit()
})




// qwe