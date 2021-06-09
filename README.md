# Teste para programador Anexus (Iniciante/Junior)

## Problema

Um sistema de indicação pode conter várias estruturas de rede, uma delas é a estrutura binária. Uma estrutura binária funciona de uma forma simples e com base em 3 regras fundamentais.

1º REGRA: Cada usuário tem dois lados para indicar outros usuários, o lado esquerdo e o lado direito.
2º REGRA: Cada usuário pode ter no máximo 1 indicado de cada lado.
3º REGRA: A alocação dos usuários na estrutura binária deve sempre ocorrer da esquerda para direita.

Veja a seguir um caso de uso:
Neste caso temos 3 usuários se cadastrando no sistema;
O primeiro é o usuário 1 que, ao se cadastrar, se torna o topo desta estrutura binária;
O segundo é o usuário 2 que, ao se cadastrar indicado pelo usuário 1, deve ser alocado do lado esquerdo do usuário 1, seguindo a 3º regra de ordem de alocação da esquerda para direita.
O terceiro é o usuário 3 que, ao se cadastrar indicado pelo usuário 1, deve ser alocado do lado direito do usuário 1, seguindo a regra de ordem de alocação da esquerda para direita.

A estrutura de indicação pode conter vários formatos de regra de negócio, e uma delas é o acúmulo de pontos gerados por cada usuário da rede.

No caso de uso o usuário 3 adquiriu 100 pontos e o usuário 2 adquiriu 200 pontos, nessa situação o sistema irá montar os pontos para apresentar os resumos de quantos pontos que o usuário 1 tem acumulado no lado esquerdo e quantos pontos acumulados tem no lado direito.

Segue a imagem de como a estrutura ficaria.

O propósito deste teste é identificar a capacidade de entendimento lógico a respeito deste tipo de estrutura e explorar a criatividade do candidato em relação às possíveis soluções .
Seguindo o caso de uso, crie a solução onde podemos simular cada situação.

Requisitos mínimos, mesmo não tendo domínio tente usar todos os recursos abaixo:
Pode usar framework de sua preferência
PHP 7.4+
composer (PSR-4 ou PSR-7)
Git
Foque em solucionar o problema
Crie alguma tela onde possamos ver o domínio HTML e CSS
Para análise é necessário enviar a url do git do teste, para o avaliador clonar o projeto e fazer a análise do teste.

## Observações sobre a solução
* O sistema armazena as informações em um banco de dados sqlite, então é necessário ter o mesmo instalado no servidor
* Não houve necessidade de usar o Composer para gerenciar nenhuma lib ou pacote
* Não foi utilizado nenhum framework, todas as tecnologias foram utilizadas de maneira "pura"
* O primeiro usuário adicionado só recebe pontos das pessoas que ele indica, diferente dos próximos, que recebem assim que são criados
* Rodar em Windows
* Não apagar o banco de dados

Enjoy it! :D