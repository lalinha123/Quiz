// --------- VARIÁVEIS----------------------------------------------------------
let pagina_atual;
const form = document.getElementById('form-quiz');
const root = document.querySelector(':root')
const root_s = getComputedStyle(root);
const p_perg_apar = document.getElementById('pre-vis-pergunta');
let lista_perg = [];
let lista_fonte_p = [];
let lista_fonte_r = [];
let pont_body = {
  pontuacao: false,
  pontos: false,
};
let fonte_p = {
  fonte: 'Open Sans',
  fonte_tipo: 'sans-serif',
  align: 'left',
  bold: false,
  underline: false,
  italic: false,
};

let fonte_r = {
  fonte: 'Open Sans',
  fonte_tipo: 'sans-serif',
  align: 'left',
  bold: false,
  underline: false,
  italic: false,
};

let nome;
let tema;
let tempo_min;
let tempo_seg;

// --------- FUNÇÕES/OBJETOS DA PÁGINA DE PERGUNTAS----------------------------------------------------------

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

// --------- FUNÇÕES/OBJETOS DA PÁGINA DE CONFIG----------------------------------------------------------

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

// --------- FUNÇÕES/OBJETOS DA PÁGINA DE APARÊNCIA----------------------------------------------------------

function criaFonteLista(nome, tipo, tipo_ul){
  const fonte = document.createElement('li');
  let lis_fonte;

  switch (tipo_ul) {
    case 'pergunta':
      lis_fonte = document.getElementById('lis-fonte-p');
      lista_fonte_p.push(nome);
      break;

    case 'resposta':
      lis_fonte = document.getElementById('lis-fonte-r');
      lista_fonte_r.push(nome);
      break;
  }

  fonte.innerHTML = nome;
  fonte.style.fontFamily = nome, tipo;
  fonte.addEventListener("click", function() {
      mudaFonte(nome, tipo, tipo_ul);
  }); 

  lis_fonte.appendChild(fonte);
}

criaFonteLista('Open Sans', 'sans-serif', 'pergunta');
criaFonteLista('Dancing Script', 'cursive', 'pergunta');
criaFonteLista('Roboto', 'sans-serif', 'pergunta');
criaFonteLista('Montserrat', 'sans-serif', 'pergunta');
criaFonteLista('Playfair Display', 'serif', 'pergunta');
criaFonteLista('Roboto Mono', 'monospace', 'pergunta');
criaFonteLista('Oswald', 'sans-serif', 'pergunta');
criaFonteLista('The Nautigal', 'cursive', 'pergunta');
criaFonteLista('Comic Neue', 'sans-serif', 'pergunta');
criaFonteLista('Heebo', 'sans-serif', 'pergunta');

criaFonteLista('Open Sans', 'sans-serif', 'resposta');
criaFonteLista('Dancing Script', 'cursive', 'resposta');
criaFonteLista('Roboto', 'sans-serif', 'resposta');
criaFonteLista('Montserrat', 'sans-serif', 'resposta');
criaFonteLista('Playfair Display', 'serif', 'resposta');
criaFonteLista('Roboto Mono', 'monospace', 'resposta');
criaFonteLista('Oswald', 'sans-serif', 'resposta');
criaFonteLista('The Nautigal', 'cursive', 'resposta');
criaFonteLista('Comic Neue', 'sans-serif', 'resposta');
criaFonteLista('Heebo', 'sans-serif', 'resposta');

function mudaFonte(fonte_nome, fon_tipo, fon_tipo_ul){
  let exemplo;

  switch (fon_tipo_ul) {
    case 'pergunta':
      exemplo = document.getElementById('lis-fon-ex-p');
      fonte_p.fonte = fonte_nome;
      fonte_p.fonte_tipo = fon_tipo;
      break;
  
    case 'resposta':
      exemplo = document.getElementById('lis-fon-ex-r');
      fonte_r.fonte = fonte_nome;
      fonte_r.fonte_tipo = fon_tipo;
      break;
  }

  exemplo.style.fontFamily = fonte_nome, fon_tipo;
  document.body.style.setProperty(`--f-pergunta`, `${fonte_p.fonte}, ${fonte_p.fonte_tipo}`);
  document.body.style.setProperty(`--f-resposta`, `${fonte_r.fonte}, ${fonte_r.fonte_tipo}`);
}

function textoAlign(tipo_align, tipo_ul){
  let exemplo;

  switch (tipo_ul) {
    case 'pergunta':
      exemplo = document.getElementById('lis-fon-ex-p');
      fonte_p.align = tipo_align;
      p_perg_apar.style.textAlign = tipo_align;
      break;
  
    case 'resposta':
      exemplo = document.getElementById('lis-fon-ex-r');
      fonte_r.align = tipo_align;
      //p_resp_apar.style.textAlign = tipo_align;
      break;
  }

  exemplo.style.textAlign = tipo_align;
}

function textoEstilo(estilo, fon_tipo_ul){
  let exemplo;

  function mudaEstilo(tipo_ul_obj, exemplo_ul, p_apar){
    exemplo = document.getElementById(exemplo_ul);

    switch (estilo) {
      case 'bold':
        if(tipo_ul_obj.bold === true){
          tipo_ul_obj.bold = false;
          exemplo.style.fontWeight = 'normal';
          p_apar.style.fontWeight = 'normal';
        }
  
        else if(tipo_ul_obj.bold === false){
          tipo_ul_obj.bold = true;
          exemplo.style.fontWeight = 'bold';
          p_apar.style.fontWeight = 'bold'
        }
        break;

      case 'underline':
        if(tipo_ul_obj.underline === true){
          tipo_ul_obj.underline = false;
          exemplo.style.textDecoration = 'none';
          p_apar.style.textDecoration = 'none';
        }
  
        else if(tipo_ul_obj.underline === false){
          tipo_ul_obj.underline = true;
          exemplo.style.textDecoration = 'underline';
          p_apar.style.textDecoration = 'underline';
        }
        break;

      case 'italic':
        if(tipo_ul_obj.italic === true){
          tipo_ul_obj.italic = false;
          exemplo.style.fontStyle = 'normal';
          p_apar.style.fontStyle = 'normal';
        }
  
        else if(tipo_ul_obj.italic === false){
          tipo_ul_obj.italic = true;
          exemplo.style.fontStyle = 'italic';
          p_apar.style.fontStyle = 'italic';
        }
        break;
    }
  }

  switch (fon_tipo_ul) {
    case 'pergunta':
      mudaEstilo(fonte_p, 'lis-fon-ex-p', p_perg_apar);
      break;
  
    case 'resposta':
      mudaEstilo(fonte_r, 'lis-fon-ex-r', p_resp_apar);
      break;
  }

}

function mudaCor(cor, cor_nova){
  document.body.style.setProperty(`--c-${cor}`, root_s.getPropertyValue(`--c-${cor_nova}`));
}

function abreCor(div_nome){
  function addDisplayNone(id){
    document.getElementById(id).style.display = 'none'
  }

  if(document.getElementById(div_nome).style.display != 'grid'){
    addDisplayNone('div-cor-btn-1');
    addDisplayNone('div-cor-btn-2');
    addDisplayNone('div-cor-btn-3');
    addDisplayNone('div-cor-btn-4');
    document.getElementById(div_nome).style.display = 'grid';
  }

  else if(document.getElementById(div_nome).style.display === 'grid'){
    addDisplayNone(div_nome);
  }
  
  
}

// --------- FUNÇÕES/OBJETOS DE PÁGINA----------------------------------------------------------

function pegaInformacao(){
  nome = document.getElementById('txt-nome').value;
  tema = document.getElementById('txt-tema').value;
  tempo_min = document.getElementById('txt-tempo-min').value;
  tempo_seg = document.getElementById('txt-tempo-seg').value;

  document.getElementById('p-pre-vis-temp').innerHTML = `${tempo_min} : ${tempo_seg}`
  document.getElementById('pre-vis-tema').innerHTML = tema;

  if(document.getElementById('txt-p-p1').value === ''){
    p_perg_apar.innerHTML = 'Gostou desse estilo? Tente outros também!'
  }

  else if(document.getElementById('txt-p-p1').value != ''){
    p_perg_apar.innerHTML = document.getElementById('txt-p-p1').value;
  }

}

function pagPergunta(){
  document.getElementById('sec-quiz').style.display = 'none';
  document.getElementById('sec-perg').style.display = 'unset';
  document.getElementById('sec-aparencia').style.display = 'none';
  document.getElementById('btn-pag-ant').style.display = 'unset';
  document.getElementById('btn-prox-pag').style.display = 'block';
  document.getElementById('btn-cria-quiz').style.display = 'none';
  document.getElementById('btn-add-p').style.display = 'unset';
  document.getElementById('titulo').innerHTML = `Perguntas`;
  document.getElementById('subtitulo').innerHTML = `Personalize as perguntas do seu jeito!`;
  pagina_atual = 'pag_perguntas';
}

function pagConfigQuiz(){
  document.getElementById('sec-quiz').style.display = 'block';
  document.getElementById('sec-perg').style.display = 'none';
  document.getElementById('sec-aparencia').style.display = 'none';
  document.getElementById('btn-cria-quiz').style.display = 'none';
  document.getElementById('btn-pag-ant').style.display = 'none';
  document.getElementById('btn-add-p').style.display = 'none';
  document.getElementById('titulo').innerHTML = `Crie seu Quiz!`;
  document.getElementById('subtitulo').innerHTML = `Personalize seu Quiz como quiser com as informações abaixo!`;
  pagina_atual = `pag_config_quiz`;
}

function pagSecAparencia(){
  document.getElementById('sec-quiz').style.display = 'none';
  document.getElementById('sec-perg').style.display = 'none';
  document.getElementById('sec-aparencia').style.display = 'block';
  document.getElementById('btn-cria-quiz').style.display = 'unset';
  document.getElementById('btn-pag-ant').style.display = 'unset';
  document.getElementById('btn-prox-pag').style.display = 'none';
  document.getElementById('btn-add-p').style.display = 'none';
  document.getElementById('titulo').innerHTML = `Aparência`;
  document.getElementById('subtitulo').innerHTML = `Personalize seu Quiz como quiser com as informações abaixo!`;
  pagina_atual = `pag_aparencia`;
}

function proxPag(){
  window.scrollTo(0, 0);
  pegaInformacao();

  if(pagina_atual === `pag_config_quiz`){
    pagPergunta();
  }

  else if(pagina_atual === `pag_perguntas`){
    pagSecAparencia();
  }
}

function pagAnt(){
  window.scrollTo(0, 0);
  
  if(pagina_atual === `pag_perguntas`){
    pagConfigQuiz();
  }

  if(pagina_atual === `pag_aparencia`){
    pagPergunta();
  }
}

window.addEventListener('load', function() {
  pagConfigQuiz();
});


// --------- SUBMIT----------------------------------------------------------

document.getElementById('btn-cria-quiz').addEventListener('click', function(){
  if(document.getElementsByClassName('input-obrigatorio').value == ''){
    alert('aaa');
  }
});

navbar();









