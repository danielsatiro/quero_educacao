## Comandos de execução
```
docker run --rm -v $(pwd):/app prooph/composer:7.2 install
cp .env.example .env
docker-compose up -d
```

## Adicionar permissão de escrita nas pastas
```
storage/logs
storage/framework
```

## Testes
Dentro do docker executar o comando abaixo
```
vendor/bin/phpunit
```
Relatório de cobertura será gerado na pasta "report"

Endereço da aplicação:
POST http://localhost/api/conferences/talks