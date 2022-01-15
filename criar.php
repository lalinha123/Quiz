<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Quiz muito legalzinho!">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/criar.css">
  <title>Quiz!</title>
</head>
<body>
  <main id="cont-princ" class="conteiner">
    <section id="cont-quiz" class="conteiner">
      <div id="titulo-princ">
        <h1>Crie seu Quiz!</h1>
        <p>
          Jogo muito legalzinho para você se divertir com seus amiguinhos.
        </p>
      </div>
      

      <form id="form-quiz">
        <section id="sec-quiz">
          <div class="div-input" id="div-nome">
            <label for="nome" class="obrigatorio">Nome do Quiz</label>
            <input type="text" name="nome" id="txt-nome" maxlength="60">
          </div>
      
          <div class="div-input" id="div-tema">
            <label for="tema">Tema</label>
            <input type="text" name="tema" id="txt-tema" maxlength="60">
          </div>

          <div class="div-input" id="div-seq-perg">
            <label for="rd-seq-perg">Sequência de perguntas</label>
            <div id="div-div-seq-perg">
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-perg" class="rd-seq-perg" id="rd-seq-p-aleat"><p class="p-rd-cbx">Aleatório</p></div>
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-perg" class="rd-seq-resp" id="rd-seq-r-aleat" checked><p class="p-rd-cbx">Normal</p></div>
            </div>
          </div>

          <div class="div-input" id="div-seq-resp">
            <label for="rd-seq-resp">Sequência de respostas</label>
            <div id="div-div-seq-resp">
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-resp" class="rd-seq-resp" id="rd-seq-r-aleat" checked><p class="p-rd-cbx">Aleatório</p></div>
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-resp" class="rd-seq-resp" id="rd-seq-r-aleat"><p class="p-rd-cbx">Normal</p></div>
            </div>
          </div>

          <div class="div-input" id="div-seq-resp">
            <label for="rd-seq-resp">Respostas certas/erradas</label>
            <div id="div-div-seq-resp">
              <div><input type="radio" name="mostra-resposta" class="rd-most-r" id="rd-most-r-cer-err" checked><p class="p-rd-cbx">Mostrar respostas certas e erradas</p></div>
              <div><input type="radio" name="mostra-resposta" class="rd-most-r" id="rd-most-r-certa"><p class="p-rd-cbx">Mostrar somente respostas certas</p></div>
              <div><input type="radio" name="mostra-resposta" class="rd-most-r" id="rd-most-r-errada"><p class="p-rd-cbx">Mostrar somente respostas erradas</p></div>
              <div><input type="radio" name="mostra-resposta" class="rd-most-r" id="rd-most-r-nada"><p class="p-rd-cbx">Não mostrar</p></div>
            </div>
          </div>

          <div class="div-input" id="div-pontuacao">
            <label for="rd-pontuacao">Pontuação</label>
            <div id="div-div-pontuacao">
              <div><input type="checkbox" name="mostra-pontos" id="cbx-pont-most-pont" checked><p class="p-rd-cbx">Mostrar pontos</p></div>
              <div><input type="checkbox" name="mostra-erros" id="cbx-pont-most-err" checked><p class="p-rd-cbx">Mostrar erros</p></div>
              <div><input type="checkbox" name="mostra-acertos" id="cbx-pont-most-acer" checked><p class="p-rd-cbx">Mostrar acertos</p></div>
            </div>
          </div>

          <div class="div-input" id="div-tempo">
            <label for="txt-tempo" class="obrigatorio">Tempo para responder às perguntas</label>
            <div id="div-div-tempo">
              <section class="sec-tempo">
                <input type="textbox" name="tempo-min" id="txt-tempo-min" class="txt-tempo" placeholder="min" max="15" min="0" maxlength="2" readonly value="00">
                <div class="div-btn-tempo">
                  <button type='button' class="btn-tempo-add" id="btn-tempo-add-min" onclick="calcTempo(this.id, this.className);"><i class="fas fa-angle-up"></i></button>
                  <button type='button' class="btn-tempo-sub" id="btn-tempo-sub-min" onclick="calcTempo(this.id, this.className);"><i class="fas fa-angle-down"></i></button>
                </div>
                <p>minutos</p>
              </section>
              <span>:</span>
              <section class="sec-tempo">
                <input type="textbox" name="tempo-seg" id="txt-tempo-seg" class="txt-tempo" placeholder="seg" max="59" min="5" maxlength="2" readonly value="05">
                <div class="div-btn-tempo">
                  <button type='button' class="btn-tempo-add" id="btn-tempo-add-seg" onclick="calcTempo(this.id, this.className);"><i class="fas fa-angle-up"></i></button>
                  <button type='button' class="btn-tempo-sub" id="btn-tempo-sub-seg" onclick="calcTempo(this.id, this.className);"><i class="fas fa-angle-down"></i></button>
                </div>
                <p>segundos</p>
              </section>
            </div>
          </div>
        </section>

        <section id="sec-perg">

          <!--  PERGUNTA 1  -->
          <div class="div-pergunta" id="div-p1">
            <h2 class="div-pergunta-titulo" id="div_perg_tit_p1">Pergunta 1</h2>
            <div class="div-input">
              <label for="txt-p-p1" class="obrigatorio">Pergunta</label>
              <input type="text" name="pergunta" id="txt-p-p1" maxlength="100">
            </div>

            <div class="div-input">
              <label for="txt-rc-p1" class="obrigatorio">Resposta certa</label>
              <input type="text" name="resposta-certa" id="txt-rc-p1" maxlength="100">
            </div>

            <div class="div-input">
              <label for="txt-re1-p1" class="obrigatorio">Resposta errada 1</label>
              <input type="text" name="resposta-errada-1" id="txt-re1-p1" maxlength="100">
            </div>

            <button id="btn-add-r-p1" class="btn-add-r" type="button" onclick="addResposta(this.id)"><span>+ </span>Adicionar resposta errada</button>
          </div>


          <!--  PERGUNTA 2  -->

          <div class="div-pergunta" id="div-p2">
            <h2 class="div-pergunta-titulo" id="div_perg_tit_p2">Pergunta 2</h2>
            <div class="div-input">
              <label for="txt-p-p2" class="obrigatorio">Pergunta</label>
              <input type="text" name="pergunta" id="txt-p-p2" maxlength="100">
            </div>

            <div class="div-input">
              <label for="txt-rc-p2" class="obrigatorio">Resposta certa</label>
              <input type="text" name="resposta-certa" id="txt-rc-p2" maxlength="100">
            </div>

            <div class="div-input">
              <label for="txt-re1-p2" class="obrigatorio">Resposta errada 1</label>
              <input type="text" name="resposta-errada-1" id="txt-re1-p2" maxlength="100">
            </div>

            <button id="btn-add-r-p2" class="btn-add-r" type="button" onclick="addResposta(this.id)"><span>+ </span>Adicionar resposta errada</button>
          </div>


            <!--  PERGUNTA 3  -->

            <div class="div-pergunta" id="div-p3">
              <h2 class="div-pergunta-titulo" id="div_perg_tit_p3">Pergunta 3</h2>
              <div class="div-input">
                <label for="txt-p-p3" class="obrigatorio">Pergunta</label>
                <input type="text" name="pergunta" id="txt-p-p3" maxlength="100">
              </div>
  
              <div class="div-input">
                <label for="txt-rc-p3" class="obrigatorio">Resposta certa</label>
                <input type="text" name="resposta-certa" id="txt-rc-p3" maxlength="100">
              </div>
  
              <div class="div-input">
                <label for="txt-re1-p3" class="obrigatorio">Resposta errada 1</label>
                <input type="text" name="resposta-errada-1" id="txt-re1-p3" maxlength="100">
              </div>

            <button id="btn-add-r-p3" class="btn-add-r" type="button" onclick="addResposta(this.id)"><span>+ </span>Adicionar resposta errada</button>
          </div>
        </section>

        <button id="btn-prox-pag" type="button">Próxima página <i class="fas fa-arrow-right"></i></button>
        <button type="button" id="btn-add-p" onclick="addPergunta()"><span>+ </span>Adicionar pergunta</button>
        <button id="btn-cria-quiz" type="submit">Criar quiz!</button>
      </form>
    </section>
  </main>
  <script src="./assets/js/principal.js"></script>
  <script src="./assets/js/criar.js"></script>
</body>
</html>