const selectPais = document.getElementById('selectPais')
const selectDepto = document.getElementById('selectDepto')
const selectMunicipio = document.getElementById('selectMunicipio')
const formEmpresa = document.getElementById('formEmpresa')


// FUNCIONES DE VALIDACION
const contains_data = (element) => {
    const arr = Object.values(element)
    const res = arr.every(item => item.length > 0 && item !== "null")
        
    return res;
}

const limpiarSelect = (selectDepto) => {
    // console.log(selectDepto.children.length);
    for (let index = selectDepto.children.length; index >= 1; index--) {
        selectDepto.remove(index)
            // console.log(index)
    }
}

selectPais.addEventListener('change', (e) => {
    if (selectPais.selectedIndex !== 0) {
        // console.log('jols')
        const id_pais = selectPais.value;
        fetch(`empresas-getdeptoxpais/${id_pais}`)
            .then(res => res.json())
            .then(data => {
                const arrData = data['result']
                limpiarSelect(selectDepto)
                limpiarSelect(selectMunicipio)

                const fragment = document.createDocumentFragment()
                arrData.forEach(element => {
                    const option = document.createElement('option')
                    option.setAttribute('value', element.cod_depto)
                    option.textContent = element.nom_depto;
                    fragment.append(option)
                        // console.log(element)
                });
                selectDepto.append(fragment)
            })
    }
})


selectDepto.addEventListener('change', (e) => {
    if (selectDepto.selectedIndex !== 0) {
        // console.log('jols')
        const id_depto = selectDepto.value;
        fetch(`empresas-getmunicipioxdepto/${id_depto}`)
            .then(res => res.json())
            .then(data => {
                const arrData = data['result']
                limpiarSelect(selectMunicipio)

                const fragment = document.createDocumentFragment()
                arrData.forEach(element => {
                    const option = document.createElement('option')
                    option.setAttribute('value', element.cod_municipio)
                    option.textContent = element.nom_municipio;
                    fragment.append(option)
                        // console.log(element)
                });
                selectMunicipio.append(fragment)
            })
    }
})

formEmpresa.addEventListener('submit', e => {
        e.preventDefault()
        const data = Object.fromEntries(
            new FormData(e.target)
        )
        
        if(!contains_data(data)){
            return toastr.error('Alguno de los campos esta incorrecto.')
        }
        
        toastr.success('Empresa registrada con exito!')
        formEmpresa.submit()
})





// qwe