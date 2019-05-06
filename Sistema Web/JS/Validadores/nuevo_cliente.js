$('#nuevo-Cliente').bootstrapValidator({
 
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
          inputApellido: {
			 validators: {
				 notEmpty: {
					 message: 'El apellido es requerido'
				 }
			 }
		 }, 
		 inputFecha: {
			 validators: {
				notEmpty: {
					 message: 'Se requiere un telefono'
				},
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
				},
                    notEmpty: {
					 message: 'Se requiere un telefono'
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