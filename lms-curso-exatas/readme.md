# lms-curso-exatas
# Para rodar o Back-End:

# Ter php, mysql e composer instalados
-- sudo apt-get install php
-- sudo apt-get install mysql-server
-- sudo apt-get install curl
-- sudo curl -s https://getcomposer.org/installer | php
-- sudo mv composer.phar /usr/local/bin/composer

# Install dependencies
-- composer install
(Caso o composer reclame que estão faltando extensões, baixe as identificadas usando o seguinte padrão: -- sudo apt-get install php-[nome-da-extensão]. Exemplo: -- sudo apt-get install php-mbstring)

# Criar o arquivo .env
Utilize o arquivo exemplo e troque a extensão para .env, indicando os dados do banco.

# Criar tabelas e popular
-- php artisan migrate:fresh --seed

# Rodar o servidor 
-- php artisan serve