# blog-unifacig
Projeto Integrador - Blog Unifacig
  - Blog de Notícias para divulgação do curso de Análise e Desenvolvimento de Sistemas.

## Como utilizar

  - Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html)
  - Inicie o serviço do Apache e MySQL 
  - Copie/Clone a pasta do projeto para **htdocs**
    - No *Windows* ```C:\xampp\htdocs\```
    - No *Linux/Ubuntu* ```/opt/lampp/htdocs/```
  - Abra o *PHPMyAdmin* crie um banco de dados com o nome **blog_grupo3** (*nome padrão*).
  - Popule o banco de dados para testes importando o arquivo **database-populate.sql** localizado na pasta */model/database-populate.sql* do projeto no *PHPMyAdmin*.
  - Acesso o endereço padrão comumente localizado em [localhost](http://localhost/blog-unifacig/public/index.php)
  - **Divirta-se!**

### Configurações padrões PDO
  - Configurações ```"mysql:host=localhost;dbname=blog_grupo3"```
  - Usuário ```"root"```
  - Senha ```""```
  - Objeto PDO com as configurações ```new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "");```