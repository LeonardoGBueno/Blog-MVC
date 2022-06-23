# Blog MVC

Para a utilização desse projeto se faz necessário algumas tecnologias:

- PHP 8.1^
- MariaDB 
- Composer
- Git

# Database

Download: https://drive.google.com/file/d/1Eu8eLhJ-AjK2bvKBpMUcnx7CtbZhkDVM/view?usp=sharing

# Configuração

O arquivo de configuração fica na pasta app\config, contendo o arquivo config.php e uma subpasta chamada de env contendo o arquivo final de configuração para ambiente local.


# Twig

Para renderizar uma página com o Twig basta extender a classe **App\Core\Controller.php** e chamar o método view.

O método recebe dois parâmetros, sendo eles:

* **$page** - Página a ser carregada, não informe .twig.php pois já é inserido automáticamente. Não utilizar **/** para diretório, mas sim **.**, ex: **diretorio.pagina**;
* **$params** - Array associativo com os valores a serem entregues para a página do twig.