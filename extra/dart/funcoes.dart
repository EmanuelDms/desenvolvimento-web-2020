void main() {
  criarBotao("Botao Sair!", botaoCriado, cor: "Azul");

  criarBotao("OIII", () {
    print('olá mundo');
  });
}

void botaoCriado() => print('Botão criado!');

void criarBotao(String texto, Function criadoFunc,
    {String cor, double largura}) {
  print(texto);
  print(cor ?? "Preto");
  print(largura ?? 10.0);
  criadoFunc();
}
