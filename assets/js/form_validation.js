var form = document.getElementById("cadastrar");

if(form.addEventListener) {
	form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {
	form.attachEvent("onsubmit", validaCadastro); //dar suporte a navegadores antigos
}

function validaCadastro(evt) {
	var ul = document.getElementById("lista-erros");
	ul.innerHTML = "";

	var nome = document.getElementById("name");
	var username = document.getElementById("username");
	var senha = document.getElementById("senha");
	var senha2 = document.getElementById("senha2");
	var contErro = 0;

	// Validação do campo nome
	if(nome.value == "") {
		var li = criaLi("msg-nome");
		ul.appendChild(li);
		li.innerHTML = "Nome não pode ser vazio";
		contErro += 1;
	}

	// Validação do campo e-mail
	if(username.value == "") {
		var li = criaLi("msg-username");
		ul.appendChild(li);
		li.innerHTML = "Username não pode ser vazio";
		contErro += 1;
	} 

	if(username.value.length < 3 || username.value.length > 6) {
		var li = criaLi("msg-username");
		ul.appendChild(li);
		li.innerHTML = "Username tem tamanho mínimo de 3 e máximo de 6";
		contErro += 1;
	}

	// Validação do campo senha
	if(senha.value == "") {
		var li = criaLi("msg-senha");
		ul.appendChild(li);
		li.innerHTML = "Senha não pode ser vazia";
		contErro += 1;
	} 

	if(senha.value.length <= 2){
		var li = criaLi("msg-senha");
		ul.appendChild(li);
		li.innerHTML = "Senha precisa ter no mínimo 3 caracteres";
		contErro += 1;
	}

	// Validação do campo senha
	//if(senha2.value == "") {
	//	var li = criaLi("msg-senha2");
	//	ul.appendChild(li);
	//	li.innerHTML = "Senha não pode ser vazia";
	//	contErro += 1;
	//} else if(senha2.value.length < 6){
	//	li.innerHTML = "Senha precisa ter no mínimo 6 caracteres";
	//	contErro += 1;
	//}

	//Valida se as senhas são iguais
	if(senha.value != senha2.value) {
		li.innerHTML = "Senhas não conferem";
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