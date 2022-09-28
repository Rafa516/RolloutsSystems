<center><img src="logo.png" width="350"></center>

# Sistema Web Rollouts Systems.

[![](https://img.shields.io/pypi/status/ok)](https://travis-ci.org/joemccann/dillinger)
## Descrição

- **Sistema de gerenciamento e controle dos termos e rollouts realizados para o Operador Nacional do Sistema Elétrico ONS**
    >Projeto densenvolvido para falicitar o gerenciamento e controle dos dados e arquivos gerados após cada finalização de termos e rollouts,adicionado também o controle de estoque, visto que há uma alta demanda dessas funções, atualmente na versão 1.5. 
    >Nessa atual versão é possível realizar cadastro, alteração e exclusão de equipamentos, movimentação do estoque com a abertura de termos de devolução e entrega. Os rollouts ainda permanecem sem a movimentação dinâmica com estoque, previsto para a próxima atualização juntamente com outras localidades ativadas.
    
    

## Tecnologias
- **Desenvolvimento**
    O desenvolvimento do projeto é a partir do **PHP Orientado a Objetos**, com auxílio da estrutura **PDO**, para fornecer uma camada de abstração em relação a conexão com o banco de dados. 
    As rotas são definidas pela classe **Slim** em uma arquitetura **API RESTful**.
    Os templates são gerados através da  classe **TPL(Rain TPL)**.
    Essa estrutura delimita o front-end do back-end.
    O sistema gerenciador de banco de dados relacional usado será o [MySQL Workbench](https://www.mysql.com/products/workbench/) e [phpMyAdmin](https://www.phpmyadmin.net/).

## Configuração habilitada

- **Tipo de servidor:** MySQL.
- **Apache/2.4.29**
- **Versão do PHP:** 7.2.24

  
 ## Instalações necessárias:

- [Composer](https://github.com/composer/composer)
- [Rain TPL](https://github.com/feulf/raintpl3)
- [Slim](https://www.slimframework.com/)
- [LAMP](https://www.techtudo.com.br/dicas-e-tutoriais/noticia/2012/11/como-instalar-lamp-no-linux.html) ou [WAMP](https://www.techtudo.com.br/tudo-sobre/wampserver.html) ou [XAMPP]() ou [MAMP](https://www.apachefriends.org/pt_br/index.html)
- [PHPMailler](https://github.com/PHPMailer/PHPMailer)

 ## Configurações necessárias:

- Recomendável configurar uma **Virtual Host** [LINUX](https://odesenvolvedor.com.br/como-configurar-um-dominio-com-lamp-linux-apache-mysql-php.html) ou [WINDOWS](https://hcode.com.br/blog/como-configurar-apache-virtual-hosts-no-windows)
- **Composer .Json**.




