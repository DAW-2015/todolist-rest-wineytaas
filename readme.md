#Propriedades do sistema


##Usuario


1.  `GET /usuarios/:id`
    1. parametro: **id** do usuario desejado
    2. body: NULL
    3. return: O **id** , **nome** , **email** , **login** e **senha** do usuario selecionado

2.  `GET /usuarios`
    1. parametro: NULL
    2. body: NULL
    3. return: Os **id** , **nome** , **email** , **login** e **senha** de todos os usuarios

3.  `POST /usuarios`
    1. parametro: NULL
    2. body: { "nome": "NOME_USUARIO", "email": "EMAIL_USUARIO", "login":"LOGIN_USUARIO", "senha":"SENHA_USUARIO" }
    3. return: Dados do novo usuario **id** , **nome** , **email** , **login** e **senha**

4.  `PUT /usuarios/:id`
    1. parametro: **id** do usuario desejado
    2. body: { "nome": "NOME_USUARIO", "email": "EMAIL_USUARIO", "login":"LOGIN_USUARIO", "senha":"SENHA_USUARIO" }
    3. return: Dados atualizados do usuario **id** , **nome** , **email** , **login** e **senha**

5.  `DELETE /usuarios/:id`
    1. parametro: **id** do usuario desejado
    2. body: NULL
    3. return: **Usuario excluído**, caso true. **Erro ao excluir usuario**, case false