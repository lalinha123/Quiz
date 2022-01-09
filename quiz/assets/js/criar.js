function criaResposta(num_resp, tipo_resp, num_perg){
  const div_resposta = document.createElement("div");
  const label_resposta = document.createElement("label");
  const input_resposta = document.createElement("input");

  div_resposta.classList.add("div_input");
  input_resposta.id = `txt-r${tipo_resp + num_resp}-p${num_perg}`;
  label_resposta.for = input_resposta.id;
  //document.body.appendChild(div_resposta);

  console.log(input_resposta.id);
}


function addResposta(btn_id){
  const pergunta_numero = Number(btn_id.substring(btn_id.lastIndexOf("p")+1));
  const resposta_2_id = `txt-re2-p${pergunta_numero}`;
  const resposta_3_id = `txt-re3-p${pergunta_numero}`;
  const resposta_2 = document.getElementById(resposta_2_id);
  const resposta_3 = document.getElementById(resposta_3_id);
  

  if(resposta_2){
    criaResposta(3, 'e', pergunta_numero);
  }

  else if (!resposta_2){
    criaResposta(2, 'e', pergunta_numero);
  }

  else{
    alert('algum erro aconteceu :(')
  }
  
}

function criaQuiz(){
  const nome = document.querySelector('#txt-nome').value;
  const tema = document.querySelector('#txt-tema').value;
  const tempo_min = Number(document.querySelector('#txt-tempo-min').value);
  const tempo_seg = Number(document.querySelector('#txt-tempo-seg').value);
  
  localStorage.setItem('nome', nome);
  localStorage.setItem('tema', tema);
  localStorage.setItem('tempo_seg', tempo_seg);
}
