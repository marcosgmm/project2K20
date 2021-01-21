function validNome() {
  var nome = document.forms["lavoraForm"]["nome"].value;
  var text = "Nome non valido";
  var textOk = "Nome valido";
  var regexNome = /^[A-Za-z\s]+$/;
  if ( !regexNome.test(nome) ) {
    document.getElementById("n").innerHTML = text;
  }
  else {
    document.getElementById("n").innerHTML = textOk;
  }
}


function validCognome() {
  var cognome = document.forms["lavoraForm"]["cognome"].value;
  var text = "Cognome non valido";
  var textOk = "Cognome valido";
  var regexCognome = /^[A-Za-z\s]+$/;
  if ( !regexCognome.test(cognome) ) {
    document.getElementById("c").innerHTML = text;
  }
  else {
    document.getElementById("c").innerHTML = textOk;
  }
}


function validData() {
  var data = document.forms["lavoraForm"]["data"].value;
  var text = "Inserire data nel formato Anno-Mese-Giorno: AAAA-MM-GG";
  var textOk = "Data corretta";
  var regexData = /^(\d{4})(\-)(\d{1,2})(\-)(\d{1,2})$/;
  if ( !regexData.test(data) ) {
    document.getElementById("d").innerHTML = text;
  }
  else {
    document.getElementById("d").innerHTML = textOk;
  }
}

function validMail() {
  var mail = document.forms["lavoraForm"]["mail"].value;
  var text = "Mail non valida: formato accettato: miamail@mail.dom";
  var textOk = "Mail corretta";
  var regexMail = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/;
  if ( !regexMail.test(mail) ) {
    document.getElementById("m").innerHTML = text;
  }
  else {
    document.getElementById("m").innerHTML = textOk;
  }
}
