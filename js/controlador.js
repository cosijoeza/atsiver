function setEstudiante(value){
	sessionStorage['utm'] = value;
	if(value){
		var xmlhttp = window.XMLHttpRequest? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp.onreadystatechange = 
		function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
				console.log(xmlhttp.responseText);
		};
		xmlhttp.open("GET","procesa.php?op=4",true);
		xmlhttp.send();
	}
}

function meGusta(){
	document.getElementById("btnMG").disabled = true;
	document.getElementById("btnNMG").disabled = true;
	var xmlhttp = window.XMLHttpRequest? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
	document.getElementById("contMG").innerHTML = parseInt(document.getElementById("contMG").innerHTML)+1;
	xmlhttp.onreadystatechange = 
	function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
			console.log(xmlhttp.responseText);
	};
	xmlhttp.open("GET","procesa.php?op=1&rev="+getParametroURL("rev"),true);
	xmlhttp.send()
}
	
function noMeGusta(){
	document.getElementById("btnMG").disabled = true;
	document.getElementById("btnNMG").disabled = true;
	if(localStorage['nm'+getParametroURL("rev")] == undefined){    
        var xmlhttp = window.XMLHttpRequest? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
	    document.getElementById("contNMG").innerHTML = parseInt(document.getElementById("contNMG").innerHTML)+1;
	    xmlhttp.onreadystatechange = 
	    function(){
		    if(xmlhttp.readyState==4 && xmlhttp.status==200)
			    console.log(xmlhttp.responseText);
	    };
	    xmlhttp.open("GET","procesa.php?op=2&rev="+getParametroURL("rev"),true);
	    xmlhttp.send();
        localStorage['nm'+getParametroURL("rev")] = true;
    }
}

function comentar(){
	var inputNom = document.getElementById("nombre");
	var inputCom = document.getElementById("inputComentario")
	var nombre = inputNom.value;
	var comentario = inputCom.value;
	if(inputNom.value!="" && inputCom.value!=""){
		inputNom.value = "";
		inputCom.value = "";
		var xmlhttp = window.XMLHttpRequest? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp.onreadystatechange = 
		function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
				console.log(xmlhttp.responseText);
		};
		xmlhttp.open("GET","procesa.php?op=3&nombre="+encodeURI(nombre)+"&texto="+encodeURI(comentario)+"&rev="+getParametroURL("rev"),true);
		xmlhttp.send();
		agregarComentario(nombre,comentario);
	}
}

function agregarComentario(nombre,comentario){
	var divComs = document.getElementById("comentarios");
	var divRow = crearDiv(["row", "pt-4"]);
	var divCol = crearDiv(["col-5", "mx-auto"]);
	var divCard = crearDiv(["card"]);
	var h5 = crearH5(["card-header"]);
	var divCardBody = crearDiv(["card-body"]);
	var pTexto = crearP(["card-text"]);
    var divCardFooter = crearDiv(["card-footer","text-muted", "text-right"]);
	h5.innerHTML = nombre;
	pTexto.innerHTML = comentario;
	divCardBody.appendChild(pTexto);
    divCardFooter.innerHTML = (new Date()).toLocaleDateString(undefined,{hour:"2-digit",minute:"2-digit"});
	divCard.appendChild(h5);
	divCard.appendChild(divCardBody);
	divCard.appendChild(divCardFooter);
	divCol.appendChild(divCard);
	divRow.appendChild(divCol);
	divComs.insertBefore(divRow, divComs.childNodes[1]);
}

function crearDiv(classList){
	var div = document.createElement("DIV");
	classList.forEach(function(element){
		div.classList.add(element);	
	});
	return div;
}

function crearP(classList){
	var p = document.createElement("p");
	classList.forEach(function(element){
		p.classList.add(element);	
	});
	return p;
}

function crearH5(classList){
	var h = document.createElement("H5");
	classList.forEach(function(element){
		h.classList.add(element);	
	});
	return h;
}

function getParametroURL(nombre){
	var parametrosURL = window.location.search.substring(1);
	var parametros = parametrosURL.split('&');
	for(var i=0; i<parametros.length; i++){
    	var parametro = parametros[i].split('=');
    	if(parametro[0] == nombre)	
        	return parametro[1];
	}
}