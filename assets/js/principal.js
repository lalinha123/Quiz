function navbar() {
  let nav = document.createElement('nav');
  let ul = document.createElement('ul');
  let li_link_criar = document.createElement('li');
  let li_link_index = document.createElement('li');
  let li_link_jogar = document.createElement('li');
  let a_link_criar = document.createElement('a');
  let a_link_index = document.createElement('a');
  let a_link_jogar = document.createElement('a');

  a_link_criar.innerHTML = 'Criar!';
  a_link_index.innerHTML = 'Quiz!';
  a_link_jogar.innerHTML = 'Jogar!';

  a_link_criar.id = 'nav-link-criar';
  a_link_jogar.id = 'nav-link-jogar';
  a_link_index.id = 'nav-link-quiz';

  a_link_criar.href = 'criar.html';
  a_link_index.href = 'index.html';
  a_link_jogar.href = 'jogar.html';


  li_link_criar.appendChild(a_link_criar);
  li_link_index.appendChild(a_link_index);
  li_link_jogar.appendChild(a_link_jogar);

  ul.appendChild(li_link_criar);
  ul.appendChild(li_link_index);
  ul.appendChild(li_link_jogar);

  nav.id = "navbar";
  nav.appendChild(ul);

  document.body.appendChild(nav);
}