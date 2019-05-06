// JavaScript Document

$('#loginForm').bootstrapValidator({
 
	 message: 'Este valor no es valido',
	 fields: {
		 inputUsuario: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre de usuario es requerido'
				 }
				 
			 }
		 },
		 inputPassword: {
			 validators: {
				 notEmpty: {
					 message: 'La contraseña es requerida'
				 }
			 }
		 },
	 }
});

$('#nuevo-clienteForm').bootstrapValidator({
 
	 message: 'Este valor no es valido',
	 fields: {
		 inputRut: {
			 validators: {
				 notEmpty: {
					 message: 'El rut es requerido'
				 },
			 }
		 },
		 inputNombre: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre es requerido'
				 }
			 }
		 },
		 inputFecha: {
			 validators: {
				 date: {
					 format: 'YYYY/MM/DD',
					 message: 'Valor incorrecto'
				 }
			 }
		 },
		 inputEmail: {
			validators: {
				emailAddress: {
					message: 'Formato incorrecto'
				}
			}
		 },
		 inputTelefono1: {
			 validators: {
				 integer: {
					 message: 'Debe ser numerico'
				 },
				 notEmpty: {
					 message: 'Se requiere un telefono'
				 }
			 }
		 },
		 inputTelefono2: {
			 validators: {
				 integer: {
					 message: 'Debe ser numerico'
				 }
			 }
		 },
	 }
});

$('#nuevo-equipoForm').bootstrapValidator({
 
	 message: 'Este valor no es valido',
	 fields: {
		 inputRut: {
			 validators: {
				 notEmpty: {
					 message: 'El rut es requerido'
				 }
			 }
		 },
		 inputNombre: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre es requerido'
				 }
			 }
		 },
		 inputFecha: {
			 validators: {
				 date: {
					 format: 'YYYY/MM/DD',
					 message: 'Valor incorrecto'
				 },
                     notEmpty: {
					 message: 'La Fecha es requerido'
				 }
			 }
		 },
		 inputEmail: {
			validators: {
				emailAddress: {
					message: 'Formato incorrecto'
				},
                    notEmpty: {
					 message: 'el Email es requerido'
				}
			}
		 },
		 inputTelefono: {
			 validators: {
				 integer: {
					 message: 'Debe ser numerico'
				 },
				 notEmpty: {
					 message: 'Se requiere un telefono'
				 }
			 }
		 },
	 }
});

$('#nuevo-vehiculoForm').bootstrapValidator({
 
	 message: 'Este valor no es valido',
	 fields: {
		 inputPatente: {
			 validators: {
				 notEmpty: {
					 message: 'La patente es requerida'
				 }
			 }
		 },
		 inputAño: {
			 validators: {
				 integer: {
					 message: 'Debe ser numerico'
				 },
				 notEmpty: {
					 message: 'El año es requerido'
				 }
			 }
		 },
		 inputMarca: {
			 validators: {
				 notEmpty: {
					 message: 'La marca es requerida'
				 }
			 }
		 },
		 inputModelo: {
			 validators: {
				 notEmpty: {
					 message: 'El modelo es requerido'
				 }
			 }
		 },
		 inputColor: {
			 validators: {
				 notEmpty: {
					 message: 'El color es requerido'
				 }
			 }
		 },
		 
		 inputKilometros: {
			 validators: {
				 integer: {
					 message: 'Debe ser numerico'
				 },
				 notEmpty: {
					 message: 'Se requieren los kilometros'
				 }
			 }
		 },
	 }
});