const btnPrueba = document.getElementById('btnPrueba');
const formReportes = document.getElementById('formReportes');

// FUNCIONES DE VALIDACION
const contains_data_unit = (element) => {
    if (element.trim().length > 0 && element !== "null") {
        return true;
    }
    return false;
}

const contains_data_file = (element) => {
    const files = element.files;
    if (files.length > 0) {
        return true;
    }
    return false;
}


btnPrueba.addEventListener('click', e => {
    // console.log(archivoReporte.files)
    console.log(formReportes.mi_archivo.files[0])

})

/*
formReportes.addEventListener('submit', e => {
    e.preventDefault()
    const miData = { titulo_reporte, correo_electronico, desc_reporte, hora_generar_reporte, tipo_reporte, tiempo_generar_reporte, ind_reporte, mi_archivo } = formReportes;
    const formData = new FormData(e.target)

    if (!contains_data_unit(titulo_reporte.value) || !contains_data_unit(correo_electronico.value) || !contains_data_unit(desc_reporte.value) || !contains_data_unit(hora_generar_reporte.value) || !contains_data_unit(tipo_reporte.value) || !contains_data_unit(tiempo_generar_reporte.value) || !contains_data_unit(ind_reporte.value)) {
        return toastr.error('Alguno de los campos esta incorrecto.')
    }

    if (!contains_data_file(mi_archivo)) {
        return toastr.error('Tiene que subir un archivo.')
    }

    // fetch('reportes-add/reportes-ins', {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(res => res.json())
    //     .then(data => {
    //         console.log(data)
    //         toastr.success('Reporte registrado con exito!')
    //     })
    //     .catch(err => {
    //         console.log('ERROR ACA>>', err)
    //         toastr.error('Error al registrar reporte.')
    //     })

    formReportes.submit()
})
*/




// qwe