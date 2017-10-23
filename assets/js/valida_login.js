with(document.login){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && email.value==""){
			ok=false;
			alert("Debe escribir un email de usuario");
			email.focus();
		}
		if(ok && password.value==""){
			ok=false;
			alert("Debe escribir su contraseña");
			password.focus();
		}
		if(ok){ submit(); }
	}
}
