function checaIdade(idade) {
  return new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'idade')
    xhr.send(null);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          resolve(xhr.responseURL);
        } else {
          reject('Erro na requisição');
        }
      }
    }
  });
}

checaIdade()
  .then(function (response) {
    console.log(response);
  })