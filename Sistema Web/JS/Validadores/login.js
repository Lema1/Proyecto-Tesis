$('#loginForm').bootstrapValidator({
 
	 message: 'Este valor no es valido',
	 fields: {
		 inputUsuario: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre de usuario es requerido'
				},
                     emailAddress: {
					message: 'Formato incorrecto'
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