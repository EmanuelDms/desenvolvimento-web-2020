
// Exercício 1
function checaIdade(idade) {
  return new Promise(function (resolve, reject) {
    setTimeout(function () {
      if (idade >= 18) {
        resolve();
      } else {
        reject();
      }
    }, 2000)
  });
}

checaIdade(20)
  .then(function (response) {
    console.log('Maior que 18');
  })
  .catch(function (error) {
    console.warn('Menor que 18');
  })

// Exercício 2 e 3
// Button
var ul = document.querySelector('ul');
document.querySelector('#listDataUser').onclick = () => {
  var userName = document.querySelector('input[name=user]');
  ul.innerHTML = '';

  axios.get(`https://api.github.com/users/${userName.value}/repos`)
    // .interceptors.request.use(function (config) {
    //   return config;
    // })
    .then(function (response) {
      response.data.forEach(element => {
        var li = document.createElement('li');
        var textFork = element.fork ? ' (Fork)' : '';
        var text = document.createTextNode(element.name + textFork);
        li.appendChild(text);
        ul.appendChild(li);
      })
    })
    .catch(function (error) {
      if (error.response.status == 404) {
        alert('Usuário inexistente');
      } else {
        console.warn('Erro na requisição');
      }
    })
}