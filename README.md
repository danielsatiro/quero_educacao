## Descrição
Apesar de o tempo do teste ser de 5 dias eu tinha disponivel apenas o final de semana para resolvelo, então optei por utilizar a arquitetura padrão do Laravel MVC, mesmo utilizando apenas o Model e Controller, por ser uma API não há necessidade de Views e nem de conexão a banco de dados uma vez que os dados recebidos são processados e devolvidos.

Classes e metodos com responsabilidades únicas de forma a facilitar a evolução e manutenção da aplicação.

## Comandos de execução
```
docker run --rm -v $(pwd):/app prooph/composer:7.2 install
cp .env.example .env
docker-compose up -d
```

## Adicionar permissão de escrita nas pastas
```
storage
bootstrap/cache
```

## Testes
Dentro do docker executar o comando abaixo
```
vendor/bin/phpunit
```
Relatório de cobertura será gerado na pasta "report"

Endereço da aplicação:

POST http://localhost/api/conferences/talks

POST https://quero-educacao.satiro.me/api/conferences/talks

Endereço da documentação:

POST http://localhost/api/documentation

POST https://quero-educacao.satiro.me/api/documentation