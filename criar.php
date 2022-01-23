<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Quiz muito legalzinho!">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/criar.css">
  <title>Criar Quiz!</title>
</head>
<body>

  <main id="cont-princ" class="conteiner">
    <section id="cont-quiz" class="conteiner">
      <div id="titulo-princ">
        <h1 id="titulo">Crie seu Quiz!</h1>
        <p id="subtitulo">
        </p>
      </div>

      <form id="form-quiz">
        <section id="sec-quiz">
          <div class="div-input" id="div-nome">
            <label for="nome" class="obrigatorio">Nome do Quiz</label>
            <input type="text" name="nome" id="txt-nome" maxlength="50" required>
          </div>
      
          <div class="div-input" id="div-tema">
            <label for="tema">Tema</label>
            <input type="text" name="tema" id="txt-tema" maxlength="50">
          </div>

          <div class="div-input" id="div-seq-perg">
            <label for="rd-seq-perg">Sequência de perguntas</label>
            <div id="div-div-seq-perg">
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-perg" class="rd-seq-perg" id="rd-seq-p-aleat"><p class="p-rd-cbx">Aleatório</p></div>
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-perg" class="rd-seq-resp" id="rd-seq-p-norm" checked><p class="p-rd-cbx">Normal</p></div>
            </div>
          </div>

          <div class="div-input" id="div-seq-resp">
            <label for="rd-seq-resp">Sequência de respostas</label>
            <div id="div-div-seq-resp">
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-resp" class="rd-seq-resp" id="rd-seq-r-aleat" checked><p class="p-rd-cbx">Aleatório</p></div>
              <div class="div-rd-cbx-inline"><input type="radio" name="sequencia-resp" class="rd-seq-resp" id="rd-seq-r-norm"><p class="p-rd-cbx">Normal</p></div>
            </div>
          </div>

          <div class="div-input" id="div-seq-resp">
            <label for="rd-seq-resp">Ordem das respostas</label>
            <div id="div-div-seq-resp">
              <div><input type="radio" name="ordem-resp" id="rd-ord-resp-abc-mai" checked><p class="p-rd-cbx">A. B. C. D.</p></div>
              <div><input type="radio" name="ordem-resp" id="rd-ord-resp-abc-min"><p class="p-rd-cbx">a. b. c. d.</p></div>
              <div><input type="radio" name="ordem-resp" id="rd-ord-resp-123"><p class="p-rd-cbx">1. 2. 3. 4.</p></div>
              <div><input type="radio" name="ordem-resp" id="rd-ord-resp-123-rom"><p class="p-rd-cbx">I. II. III. IV.</p></div>
              <div><input type="radio" name="ordem-resp" id="rd-ord-resp-nada"><p class="p-rd-cbx">Sem ordenação</p></div>
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
              <div><input type="checkbox" name="mostra-pontos" id="cbx-pont-most-pont" checked><p class="p-rd-cbx">Mostrar pontos das perguntas</p></div>
              <div><input type="checkbox" name="mostra-pontuacao" id="cbx-pont-most-pontuacao" checked><p class="p-rd-cbx">Mostrar pontuação</p></div>
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
              <input type="text" name="pergunta" id="txt-p-p1" maxlength="70">
            </div>

            <div class="div-input">
              <label for="txt-rc-p1" class="obrigatorio">Resposta certa</label>
              <input type="text" name="resposta-certa" id="txt-rc-p1" maxlength="40">
            </div>

            <div class="div-input">
              <label for="txt-re1-p1" class="obrigatorio">Resposta errada 1</label>
              <input type="text" name="resposta-errada-1" id="txt-re1-p1" maxlength="40">
            </div>

            <button id="btn-add-r-p1" class="btn-add-r" type="button" onclick="addResposta(this.id)"><span>+ </span>Adicionar resposta errada</button>
          </div>


          <!--  PERGUNTA 2  -->

          <div class="div-pergunta" id="div-p2">
            <h2 class="div-pergunta-titulo" id="div_perg_tit_p2">Pergunta 2</h2>
            <div class="div-input">
              <label for="txt-p-p2" class="obrigatorio">Pergunta</label>
              <input type="text" name="pergunta" class="input-obrigatorio" id="txt-p-p2" maxlength="70">
            </div>

            <div class="div-input">
              <label for="txt-rc-p2" class="obrigatorio">Resposta certa</label>
              <input type="text" name="resposta-certa" id="txt-rc-p2" maxlength="40">
            </div>

            <div class="div-input">
              <label for="txt-re1-p2" class="obrigatorio">Resposta errada 1</label>
              <input type="text" name="resposta-errada-1" id="txt-re1-p2" maxlength="40">
            </div>

            <button id="btn-add-r-p2" class="btn-add-r" type="button" onclick="addResposta(this.id)"><span>+ </span>Adicionar resposta errada</button>
          </div>


            <!--  PERGUNTA 3  -->

            <div class="div-pergunta" id="div-p3">
              <h2 class="div-pergunta-titulo" id="div_perg_tit_p3">Pergunta 3</h2>
              <div class="div-input">
                <label for="txt-p-p3" class="obrigatorio">Pergunta</label>
                <input type="text" name="pergunta" id="txt-p-p3" maxlength="70">
              </div>
  
              <div class="div-input">
                <label for="txt-rc-p3" class="obrigatorio">Resposta certa</label>
                <input type="text" name="resposta-certa" id="txt-rc-p3" maxlength="40">
              </div>
  
              <div class="div-input">
                <label for="txt-re1-p3" class="obrigatorio">Resposta errada 1</label>
                <input type="text" name="resposta-errada-1" id="txt-re1-p3" maxlength="40">
              </div>

            <button id="btn-add-r-p3" class="btn-add-r" type="button" onclick="addResposta(this.id)"><span>+ </span>Adicionar resposta errada</button>
          </div>
        </section>
        <button type="button" id="btn-add-p" onclick="addPergunta()"><span>+ </span>Adicionar pergunta</button>

        <section id="sec-aparencia">
          <div class="div-input">
            <label for="pre-vis-aparencia">Pré-visualização</label>
            <div class="pre-vis-cor1" id="pre-vis-aparencia">
              <div>
                <p id="pre-vis-tema">Tema</p>
              </div>
              <div id="div-div-pre-vis">
                <div class="pre-vis-cor2" id="pre-vis-quiz">
                  <div id="pre-vis-header">
                    <div id="pre_vis_div_top">
                      <p id="pre_vis_pag"></p>
                      <p id="pre_vis_pontos">2 pontos</p>
                    </div>
                    <p id="pre-vis-pergunta">Gostou desse estilo? Tente outros!</p>
                  </div>

                  <ul id="pre_vis_lis_r">
                    <li id="pre-vis-lis-r-1">Resposta 1</li>
                    <li id="pre-vis-lis-r-2">Resposta 2</li>
                    <li id="pre-vis-lis-r-3">Resposta 3</li>
                    <li id="pre-vis-lis-r-4">Resposta 4</li>
                  </ul>
                </div>

                <div id="pre-vis-temp" class="pre-vis-cor3">
                  <p id="p-pre-vis-temp"></p>
                </div>

                <div id="pre-vis-pont" class="pre-vis-cor2">
                  <p>Pontuação</p>
                  <ul>
                    <li>Pontos: 0</li>
                    <li>Erros: 0</li>
                    <li>Acertos: 0</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="div-input">
            <label for="">Cores</label>
              <div id="div-div-muda-aparencia">
                <div class="div-cor-aparencia">
                  <button type="button" class="pre-vis-btn pre-vis-cor1" id="btn-muda-cor1" onclick="abreCor('div-cor-btn-1')"></button>
                  <div class="div-cor-btn" id="div-cor-btn-1">
                    <button type="button" class="btn-cor-btn pre-vis-cor9" onclick="mudaCor('cor1', 'cor9')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor11" onclick="mudaCor('cor1', 'cor3')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor12" onclick="mudaCor('cor1', 'cor4')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor5" onclick="mudaCor('cor1', 'cor5')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor6" onclick="mudaCor('cor1', 'cor6')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor7" onclick="mudaCor('cor1', 'cor7')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor8" onclick="mudaCor('cor1', 'cor8')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor10" onclick="mudaCor('cor1', 'cor2')"></button>
                  </div>
                  <p>cor 1</p>
                </div>
                <div class="div-cor-aparencia">
                  <button type="button" class="pre-vis-btn pre-vis-cor2" id="btn-muda-cor2" onclick="abreCor('div-cor-btn-2')"></button>
                  <div class="div-cor-btn" id="div-cor-btn-2">
                    <button type="button" class="btn-cor-btn pre-vis-cor9" onclick="mudaCor('cor2', 'cor9')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor11" onclick="mudaCor('cor2', 'cor3')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor12" onclick="mudaCor('cor2', 'cor4')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor5" onclick="mudaCor('cor2', 'cor5')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor6" onclick="mudaCor('cor2', 'cor6')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor7" onclick="mudaCor('cor2', 'cor7')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor8" onclick="mudaCor('cor2', 'cor8')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor10" onclick="mudaCor('cor2', 'cor2')"></button>
                  </div>
                  <p>cor 2</p>
                </div>
                <div class="div-cor-aparencia">
                  <button type="button" class="pre-vis-btn pre-vis-cor3" id="btn-muda-cor3" onclick="abreCor('div-cor-btn-3')"></button>
                  <div class="div-cor-btn" id="div-cor-btn-3">
                    <button type="button" class="btn-cor-btn pre-vis-cor9" onclick="mudaCor('cor3', 'cor9')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor11" onclick="mudaCor('cor3', 'cor3')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor12" onclick="mudaCor('cor3', 'cor4')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor5" onclick="mudaCor('cor3', 'cor5')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor6" onclick="mudaCor('cor3', 'cor6')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor7" onclick="mudaCor('cor3', 'cor7')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor8" onclick="mudaCor('cor3', 'cor8')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor10" onclick="mudaCor('cor3', 'cor2')"></button>
                  </div>
                  <p>cor 3</p>
                </div>
                <div class="div-cor-aparencia">
                  <button type="button" class="pre-vis-btn pre-vis-cor4" id="btn-muda-cor4" onclick="abreCor('div-cor-btn-4')"></button>
                  <div class="div-cor-btn" id="div-cor-btn-4">
                    <button type="button" class="btn-cor-btn pre-vis-cor9" onclick="mudaCor('cor4', 'cor9')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor11" onclick="mudaCor('cor4', 'cor3')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor12" onclick="mudaCor('cor4', 'cor4')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor5" onclick="mudaCor('cor4', 'cor5')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor6" onclick="mudaCor('cor4', 'cor6')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor7" onclick="mudaCor('cor4', 'cor7')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor8" onclick="mudaCor('cor4', 'cor8')"></button>
                    <button type="button" class="btn-cor-btn pre-vis-cor10" onclick="mudaCor('cor4', 'cor2')"></button>
                  </div>
                  <p>cor 4</p>
                </div>
              </div>
          </div>

          <div class="div-input" id="div-input-apar-p">
            <label>Estilo da fonte - Pergunta</label>
            <div id="div-div-apar">
              <section class="sec-apar">
                <p class="lis-apar-titulo">Fonte</p>
                <ul id="lis-fonte-p">
                </ul>
              </section>
              <section class="sec-apar">
                <p class="lis-apar-titulo">Estilo</p>
                <div class="div-lis-fon-estilo">
                  <i class="fas fa-bold" onclick="textoEstilo('bold', 'pergunta')"></i>
                  <i class="fas fa-underline" onclick="textoEstilo('underline', 'pergunta')"></i>
                  <i class="fas fa-italic" onclick="textoEstilo('italic', 'pergunta')"></i>
                </div>

                <p class="lis-apar-titulo">Alinhamento</p>
                <div class="div-lis-fon-estilo">
                  <i class="fas fa-align-left" onclick="textoAlign('left')"></i>
                  <i class="fas fa-align-center" onclick="textoAlign('center')"></i>
                  <i class="fas fa-align-right" onclick="textoAlign('right')"></i>
                </div>
              </section>
            </div>
          </div>
          <div class="div-input" id="div-input-apar-r">
            <label>Estilo da fonte - Respostas</label>
            <div id="div-div-apar">
              <section class="sec-apar">
                <p class="lis-apar-titulo">Fonte</p>
                <ul id="lis-fonte-r">
                </ul>
              </section>
              <section class="sec-apar">
                <p class="lis-apar-titulo">Estilo</p>
                <div class="div-lis-fon-estilo">
                  <i class="fas fa-bold" onclick="textoEstilo('bold', 'resposta')"></i>
                  <i class="fas fa-underline" onclick="textoEstilo('underline', 'resposta')"></i>
                  <i class="fas fa-italic" onclick="textoEstilo('italic', 'resposta')"></i>
                </div>
                
              </section>
            </div>
          </div>
        </section>

        
        <div id="div-btn-pag">
          <button class="btn-pag-right" id="btn-prox-pag" type="button" onclick="proxPag()">Próxima página <i class="fas fa-arrow-right"></i></button>
          <button class="btn-pag-left" id="btn-pag-ant" type="button" onclick="pagAnt()"><i class="fas fa-arrow-left"></i> Anterior</button>
          <button class="btn-pag-right" id="btn-cria-quiz" type="submit">Criar quiz!</button>
        </div>
      </form>
    </section>
  </main>
  <script src="./assets/js/principal.js"></script>
  <script src="./assets/js/criar.js"></script>
</body>
</html>