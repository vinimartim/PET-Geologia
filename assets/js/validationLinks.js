var form = document.getElementById("cad_link");

if(form.addEventListener) {
	form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {
	form.attachEvent("onsubmit", validaCadastro); //dar suporte a navegadores antigos
}

function validaCadastro(evt) {
	var ul = document.getElementById("lista-erros");
	ul.innerHTML = "";
	
	var title = document.getElementById("title");
	var description = document.getElementById("description");
	var url = document.getElementById("url");
	var icon = document.getElementById("icon");
	var contErro = 0;
	
	// Validação do campo title
	if(title.value == "") {
		var li = criaLi("msg-title");
		ul.appendChild(li);
		li.innerHTML = "Título não pode ser vazio";
		contErro += 1;
	}
	
	// Validação do campo description
	if(description.value == "") {
		var li = criaLi("msg-description");
		ul.appendChild(li);
		li.innerHTML = "Descrição não pode ser vazia";
		contErro += 1;
	}

	// Validação do campo url
	if(url.value.indexOf("http://") == -1) {
		var li = criaLi("msg-url");
		ul.appendChild(li);
		li.innerHTML = "O campo URL deve conter 'http://'";
		contErro += 1;
	} 
	
	// Validação do campo icon
	if(icon.value.indexOf("<i") == -1 && icon.value.indexOf("</i>") == -1 && icon.value.indexOf(">") == -1) {
		var li = criaLi("msg-icon");
		ul.appendChild(li);
		li.innerHTML = "O código do ícone parece incorreto. Verifique se as tags (< ou >) estão fechadas corretamente";
		contErro += 1;
	}

	if(contErro > 0) {
		evt.preventDefault();
		ul.classList.add("alert","alert-danger"); 
	}
	
}

function criaLi(classe) {
	var li = document.createElement("li");
	li.classList.add(classe,"mx-4");
	
	return li;
}