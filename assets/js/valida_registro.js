with(document.registro){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && dnireg.value==""){
			ok=false;
			alert("Debe escribir el dni del usuario");
			dnireg.focus();
		}
		if(ok &&nombrereg.value==""){
			ok=false;
			alert("Debe escribir su nombre");
			nombrereg.focus();
		}
		if(ok && apellidosreg.value==""){
			ok=false;
			alert("Debe escribir sus apellidos");
			apellidosreg.focus();
		}	
		if(ok && direcreg.value==""){
			ok=false;
			alert("Debe escribir la direccion");
			direcreg.focus();
		}
		if(ok && telefonoreg.value==""){
			ok=false;
			alert("Debe escribir su telefono");
			telefonoreg.focus();
		}		
		if(ok && provreg.value=="0"){
			ok=false;
			alert("Debe seleccionar la provincia");
			provreg.focus();
		}
		if(ok && localreg.value=="0"){
			ok=false;
			alert("Debe seleccionar la localidad");
			localreg.focus();
		}		
		if(ok && emailreg.value==""){
			ok=false;
			alert("Debe escribir su email");
			emailreg.focus();
		}
		if(ok && user.value==""){
			ok=false;
			alert("Debe escribir su usuario");
			user.focus();
		}		
		if(ok && passreg.value==""){
			ok=false;
			alert("Debe escribir su password");
			passreg.focus();
		}
		if(ok && passrepetirreg.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			passrepetirreg.focus();
		}

		if(ok && passreg.value!= passrepetirreg.value){
			ok=false;
			alert("Los passwords no coinciden");
			passrepetirreg.focus();
		}


		if(ok){ submit(); }
	}
}
