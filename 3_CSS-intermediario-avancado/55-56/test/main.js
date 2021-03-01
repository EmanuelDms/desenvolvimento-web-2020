function getCurrentPage() {
  // captura url
  let path = window.location.pathname;
  let arrayUrlSplit = path.split('/');
  // captura o nome do arquivo + extensão
  let fileName = arrayUrlSplit[arrayUrlSplit.length - 1];
  // elimina extensão do arquivo
  fileName = (fileName.split('.html'))[0];

  if (fileName === 'index') fileName = 'home';

  return fileName;
}

function setStyleToCurrentPage(fileName) {
  console.log(fileName);
  let element = document.getElementById(fileName);
  return element.setAttribute('class', 'selected');
}

setStyleToCurrentPage(getCurrentPage());