# Time 2 Rocks

<p align="center">
<img src="https://user-images.githubusercontent.com/11372312/28599125-9f306d94-717e-11e7-9db3-039bb499ae79.gif">
</p>

Após os pulls:
```
php artisan migrate:refresh --seed
```

## Requisitos
https://iesb.blackboard.com/webapps/blackboard/execute/content/file?cmd=view&content_id=_613693_1&course_id=_457648_1

## MySQL
* IP: 52.39.66.114:3306
* User: laravel
* Pswd: iesb
* DB: iesb

## TO-DO Client
* Criar e Editar Questão
* Criar e Editar Prova
* Criar Nota vinculada a cada aluno ao criar uma prova
* Editar Nota
* Filtrar dados nas páginas de listagem
* Autorização das rotas na navegação do template

## TO-DO Server
* Digitalizar Prova
* Refatorar Nota migration, model e controller
