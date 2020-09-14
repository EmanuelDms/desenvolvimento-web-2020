var listElement = document.querySelector('#app ul');
var inputElement = document.querySelector('#app input');
var buttonElement = document.querySelector('#app button');

var todos = JSON.parse(localStorage.getItem('list_todos')) || [];

function renderToDos() {
  listElement.innerHTML = '';

  for (const todo of todos) {
    var todoElement = document.createElement('li');
    var todoText = document.createTextNode(todo);

    var linkElement = document.createElement('a');

    linkElement.setAttribute('href', '#');

    // .indexOf() => Returns the index of the first occurrence of a value in an array. 
    var pos = todos.indexOf(todo);
    linkElement.setAttribute('onclick', 'deleteToDo(' + pos + ')');

    var linkImage = document.createElement('img');
    linkImage.setAttribute('src', './criss-cross.svg');
    linkImage.setAttribute('class', 'deleteToDo');

    linkElement.appendChild(linkImage);

    todoElement.appendChild(todoText);
    todoElement.appendChild(linkElement);

    listElement.appendChild(todoElement);
  }
}

renderToDos();

function addToDo() {
  var todoText = inputElement.value;

  todos.push(todoText);
  inputElement.value = '';
  renderToDos();
  saveToStorage();
}

buttonElement.onclick = addToDo;

function deleteToDo(pos) {
  // Removes elements from an array and, if necessary, inserts new elements in their place, returning the deleted elements.
  todos.splice(pos, 1);
  renderToDos();
  saveToStorage();
}

// localstorage (armazenamento local) para armazenar os dados da aplicação
// salva lista de ToDos (todos) no localstorage
function saveToStorage() {
  // define um item no storage | O localstorage não tem habilidades para armazenar vetores; é uma chave valor que grava valores em formato String
  // JSON é semelhante à um objeto, só que com Strings
  localStorage.setItem('list_todos', JSON.stringify(todos))
}