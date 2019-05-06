$('#nuevo-vehiculoForm').bootstrapValidator({
      excluded: 'disabled',
	 message: 'Este valor no es valido',
	 fields: {
		 inputPatente: {
			 validators: {
				 notEmpty: {
					 message: 'La patente es requerida'
				 }
			 }
		 },
		 inputAno: {
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