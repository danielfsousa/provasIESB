# Time 2 Rocks
## Requisitos
https://iesb.blackboard.com/webapps/blackboard/execute/content/file?cmd=view&content_id=_613693_1&course_id=_457648_1

## MySQL
* IP: 52.39.66.114:3306
* User: laravel
* Pswd: iesb
* DB: iesb


## TO-DO
* Mudar o route do angular para o UI-Router ou usar ng-include na página de login;
* Inicializar o Angular com ngRoute; ( Feito )
* Fazer as páginas de acordo com o padrão do template (Depende da inicialização do Angular e ngRoute); ( Daniel está fazendo )
* Implementar interceptors para direcionar para páginas de erros, segue exemplo:

```javascript
angular
    .module('myProject.myModule')
    .config(['$httpProvider', function ($httpProvider) {

 $httpProvider.interceptors.push(['$q', '$location', function ($q, $location) {
        return {
            'responseError': function(response) {
                if(response.status === 401 || response.status === 403) {
                    $location.path('/signin'); // Replace with whatever should happen
                }
                return $q.reject(response);
            }
        };
    }]);
}]);
```
