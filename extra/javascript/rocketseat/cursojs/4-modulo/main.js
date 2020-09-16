// Requisições Assíncronas (AJAX)
/*
var xhr = new XMLHttpRequest();

// cria rota para requisição
xhr.open('GET', 'https://api.github.com/users/emanueldms');
// Envio dos parâmetros da requisição
xhr.send(null);

xhr.onreadystatechange = function () {
  if (xhr.readyState === 4) {
    // 4 é quando a resposta (response) é retornado para o script
    console.log(JSON.parse(xhr.responseText))
  }
}
*/

// Promises 
var ajaxPromise = function () {
  return new Promise(function (resolve, reject) {
    // resolve é quando o resultado obtido é sucesso
    // resolve é quando o resultado obtido é falso
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://api.github.com/users/emanueldms');
    xhr.send(null);

    xhr.onreadystatechange = function () {
      // 4 é quando a resposta (response) é retornado para o script
      if (xhr.readyState === 4) {
        // 200 sucesso
        if (xhr.status === 200) {
          resolve(JSON.parse(xhr.responseText));
        } else {
          reject('Erro na requisição.');
        }
      }
    }
  });
}

// não esperou o resultado da requisição assíncrona, dando status de pending
ajaxPromise()
  // Invocado pelo resolve da promise
  .then(function (response) {
    console.log(response.login)
  })
  // Invocado pelo reject da promise
  .catch(function (error) {
    console.warn(error)
  })

axios.get('https://api.github.com/users/moisesduartem')
  .then(function (response) {
    console.log(response.data.login);
  })
  .catch(function (error) {
    console.log(error);
  });