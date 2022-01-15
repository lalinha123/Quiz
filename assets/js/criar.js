window.addEventListener('load', function() {
  document.getElementById('sec-perg').style.display = 'none';
  document.getElementById('btn-add-p').style.display = 'none';
  document.getElementById('btn-cria-quiz').style.display = 'none';
})


const form = document.getElementById('form-quiz');
let lista_perg = [];

function pergunta(num, perg, respc, resp1, resp2, resp3){
  return{
    num: num,
    perg: perg,
    respc: respc,
    resp4: resp1,
    resp2: resp2,
    resp3: resp3,
  };
}

lista_perg.push(pergunta(1, '', '', '', '', ''));
lista_perg.push(pergunta(2, '', '', '', '', ''));
lista_perg.push(pergunta(3, '', '', '', '', ''));

function criaInputTxt(tipo, num, valor, num_perg){
  const div_txt = document.createElement("div");
  const label_txt = document.createElement("label");
  const input_txt = document.createElement("input");
  let div_anterior;
  

  div_txt.classList.add("div-input");
  input_txt.id = `txt-${tipo + num}-p${num_perg}`;
  input_txt.innerHTML = valor;
  label_txt.for = input_txt.id;

  if(tipo === 're'){
    label_txt.innerHTML = `Resposta errada ${num}`;

    if(num == 1){
      div_anterior = document.getElementById(`txt-rc-p${num_perg}`);
      label_txt.classList.add('obrigatorio');
    }

    else if(num > 1){
      div_anterior = document.getElementById(`txt-${tipo}${num - 1}-p${num_perg}`);
    }
    
  }

  else if(tipo === 'rc'){
    label_txt.innerHTML = `Resposta certa`;
    div_anterior = document.getElementById(`txt-p-p${num_perg}`);
    label_txt.classList.add('obrigatorio');
  }

  else if(tipo === 'p'){
    div_anterior = document.getElementById(`div_perg_tit_p${num_perg}`);
    label_txt.innerHTML = `Pergunta`;
    label_txt.classList.add('obrigatorio');
  }

  div_txt.appendChild(label_txt);
  div_txt.appendChild(input_txt);

  div_anterior.after(div_txt);
}


function addResposta(btn_id){
  const num_perg = Number(btn_id.substring(btn_id.lastIndexOf("p")+1));
  const resposta_2_id = `txt-re2-p${num_perg}`;
  const resposta_3_id = `txt-re3-p${num_perg}`;
  const resposta_2 = document.getElementById(resposta_2_id);
  const resposta_3 = document.getElementById(resposta_3_id);
  
  if(resposta_2){
    if(!resposta_3){
      criaInputTxt('re', 3, '', num_perg);
    }
    document.getElementById(btn_id).style.display = 'none';
  }

  else if (!resposta_2){
    criaInputTxt('re', 2, '', num_perg);
  }
}

function addPergunta(){
  if(lista_perg.length < 30){
    const num_perg = Number(lista_perg.length) + 1;
    const perg = '';
    const respc = '';
    const resp1= '';
    const resp2 = '';
    const resp3 = '';
  
    lista_perg.push(pergunta(num_perg, '',  '', '', '', ''));
  
    const div_pergunta = document.createElement('div');
    const h2_titulo = document.createElement('h2');
    const btn_cria_r = document.createElement('button');
  
    div_pergunta.classList.add('div-pergunta');
    div_pergunta.id = `div-p${num_perg}`;
  
    h2_titulo.classList.add('div-pergunta-titulo');
    h2_titulo.id = `div_perg_tit_p${num_perg}`;
    h2_titulo.innerHTML = `Pergunta ${num_perg}`;

    btn_cria_r.classList.add('btn-add-r');
    btn_cria_r.id = `btn-add-r-p${num_perg}`;
    btn_cria_r.type = 'button';
    btn_cria_r.innerHTML = '<span>+ </span>Adicionar resposta errada';
    btn_cria_r.addEventListener("click", function() {
      addResposta(btn_cria_r.id);
    }); 
  
    document.getElementById('sec-perg').appendChild(div_pergunta);
    div_pergunta.appendChild(h2_titulo);
    criaInputTxt('p', '', perg, num_perg);
    criaInputTxt('rc', '', respc, num_perg);
    criaInputTxt('re', 1, resp1, num_perg);
    div_pergunta.appendChild(btn_cria_r);
  }
}

function calcTempo(btn_id, btn_classe){
  const calc_tipo = btn_classe.substring(btn_classe.lastIndexOf("-")+1);
  const txt_tempo_tipo = btn_id.substring(btn_id.lastIndexOf("-")+1);
  const txt_tempo = document.getElementById(`txt-tempo-${txt_tempo_tipo}`);

  function addZero(){
    if(txt_tempo.value < 10){
      txt_tempo.value = '0' + txt_tempo.value;
    }
  }

  if(txt_tempo.value == ''){
    txt_tempo.value = 0;
  }

  else if(txt_tempo.value != ''){
    if(calc_tipo === 'add'){
      if(txt_tempo_tipo === 'seg' && txt_tempo.value != 59){
        ++ txt_tempo.value;

        addZero();
      }

      else if(txt_tempo_tipo === 'min' && txt_tempo.value != 15){
        ++ txt_tempo.value;

        addZero();
      }
    }

    else if(calc_tipo === 'sub'){
      if(txt_tempo_tipo === 'seg' && txt_tempo.value != 05){
        -- txt_tempo.value;

        addZero();
      }

      else if(txt_tempo_tipo === 'min' && txt_tempo.value != 00){
        -- txt_tempo.value;

        addZero();
      }
    }

    
  }
}

form.addEventListener("submit", function() {
  const txt_nome = localStorage.setItem('txt_nome', document.querySelector('#txt-nome'));
  const txt_tema = localStorage.setItem('txt_tema', document.querySelector('#txt-tema'));
  const txt_tempo_min = localStorage.setItem('txt_tempo_min', document.querySelector('#txt-tempo-min'));
  const txt_tempo_seg = localStorage.setItem('txt_tempo_seg', document.querySelector('#txt-tempo-seg'));
  const nome = localStorage.setItem('nome', document.querySelector('#txt-nome').value);
  const tema = localStorage.setItem('tema', document.querySelector('#txt-tema').value);
  const tempo_min = localStorage.setItem('tempo_min', document.querySelector('#txt-tempo-min').value);
  const tempo_seg = localStorage.setItem('tempo_seg', document.querySelector('#txt-tempo-seg').value);

}); 

window.addEventListener("onload", function(e) {
  console.log('funfou');
}); 





