## INSTALAÇÃO

### Caso não tenha o **composer** e o **xampp** instalados, por favor baixar e instalar antes para evitar erro.

- [Baixar Composer](https://getcomposer.org/Composer-Setup.exe)
- [Baixar Xampp](https://www.apachefriends.org/download.html)
- [Baixar insomnia](https://insomnia.rest/download)


## PRÓXIMOS PASSOS:

**1.** Deixe o servidor rodando(ativo). Executando o xampp que fica em `c:\xampp` de **duplo clique** em `xampp-control` que esta dentro da pasta. quando ele abrir você clicara em **start** referente a **apache** e a **mysql** feito imagem abaixo:

![image](https://user-images.githubusercontent.com/97483102/199866517-360d261a-65d3-45ca-8afc-28b116002951.png)

2. Extrair o arquivo baixado:

![image](https://user-images.githubusercontent.com/97483102/206317552-ecba02cb-7c5b-4f99-ad56-15d18e1d7f80.png)

3. Entre na pasta **topbeerapi** e dentro dela faça o seguinte procedimento para abrir o power shell **segurar shift + botão direito do mouse**, e clicar em **Abrir janela do PowerShell aqui**:

![image](https://user-images.githubusercontent.com/97483102/199867233-f4eb3b95-0364-4da3-94fb-01b80076d5d0.png)

4. Após abrir a janela do power shell é so digitar o comando `composer install` feito a imagem abaixo:

![image](https://user-images.githubusercontent.com/97483102/206318022-37afd061-cd2b-4fdc-8250-c4bef3e67c34.png)

5. Se o Composer e o PHP estiver instalado corretamente vai acontecer algo similar a imagem abaixo:

![image](https://user-images.githubusercontent.com/97483102/206318387-8bdef9dc-def2-4dd7-9fd7-ba4bf7de15bf.png)

6. Agora é hora de criar um banco de dados pelo **phpmyadmin**, para isso digite a url no navegador: `http://localhost/phpmyadmin/` e dentro dele crie um bd com o nome **topbeerapi**. clicando no botão **novo**:

![image](https://user-images.githubusercontent.com/97483102/206319027-e5d091b4-de50-44e9-add1-ad1df67612c6.png)

7. Após isso, abra a pasta do projeto com o editor de sua preferência, e renomeie o arquivo `.env.example` para `.env`:

![image](https://user-images.githubusercontent.com/97483102/206319866-e4a4b2c3-ed47-4822-9550-344183d6dc81.png)

8. Configure o arquivo `.env`:

![image](https://user-images.githubusercontent.com/97483102/206320220-60cb6379-b4d5-4fde-bc4e-6d053238fd6e.png)

9. Abra o console e digite o seguinte código: `php artisan migrate`

![image](https://user-images.githubusercontent.com/97483102/206320395-0d931b9d-ce85-44d2-9e97-d0b642a47cb4.png)

10. Vai criar as tabelas no banco de dados.

![image](https://user-images.githubusercontent.com/97483102/206320647-ac277c47-4b2e-435f-95f1-bc46a182e42f.png)

11. No terminal ainda, rode o seguinte comando: `php artisan serve` para iniciar o servidor

![image](https://user-images.githubusercontent.com/97483102/206320950-2fbf28b1-75ff-4835-b78b-bb353424791c.png)

## Adicional:

1. Abra o Insomnia e importe o arquivo chamado `insomnia`

2. Na pasta autenticação, vai em registrar Token e cadastre o usuário para conseguir fazer as operações de **POST, PUT e DELETE**:

![image](https://user-images.githubusercontent.com/97483102/206321411-5286d8c7-25b2-4a02-b93e-90de791cfd79.png)
                                                                 
## Grupo:
Eric Gustavo Denkievicz                               
Gabriel Jun Shibata                               
Gláucio Ferreira de Araújo   




