function getCurrentPage() {
  // captura url
  const path = window.location.pathname;
  const splitedUrl = path.split('/');
  // captura o nome do arquivo + extensão
  let fileName = splitedUrl[splitedUrl.length - 1];
  // elimina extensão do arquivo
  fileName = (fileName.split('.html'))[0];
  return (fileName === 'index') ? 'home' : fileName;
}

function setStyleToCurrentPage() {
  const element = document.getElementById(getCurrentPage());
  return element.setAttribute('class', 'selected');
}

setStyleToCurrentPage();