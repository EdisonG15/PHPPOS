function validarCedula(cedula) {

    if (cedula.length !== 10) return false;
    let provincia = parseInt(cedula.substring(0, 2));
    if (provincia < 1 || provincia > 24) return false;
    let tercerDigito = parseInt(cedula[2]);
    if (tercerDigito > 6) return false;

    let coeficientes = [2,1,2,1,2,1,2,1,2];
    let suma = 0;

    for (let i = 0; i < 9; i++) {
        let valor = parseInt(cedula[i]) * coeficientes[i];
        suma += valor > 9 ? valor - 9 : valor;
    }

    let verificador = (10 - (suma % 10)) % 10;
    return verificador === parseInt(cedula[9]);
}

function validarRUC(ruc) {
    if (ruc.length !== 13) return false;
    let cedula = ruc.substring(0, 10);
    return validarCedula(cedula);
}

function validarPasaporte(pasaporte) {
    const regex = /^[a-zA-Z0-9]{6,12}$/;
    return regex.test(pasaporte);
}
