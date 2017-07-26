=== Codigo no Registro ===
Contributors: Anderson.Makiyama
Tags: captcha, código imagem, código segurança registro, plugin captcha, signup captcha, security
Requires at least: 3.0
Tested up to: 4.0
Stable tag: trunk

Exiba uma imagem com código de segurança na página de registro do teu blog.
Display a captcha on signup form

== Description ==
**Apresentação**

Quando você habilita o cadastro de novos usuários em seu blog - seja para novos inscritos, autores, colaboradores, etc -, é provável que mais cedo ou mais tarde spammers irão encontrar seu site e começarão a efetuar cadastros automatizados. Para evitar este tipo de abuso você pode utilizar este plugin, com ele, na página de registro, o usuário precisará digitar o código da imagem corretamente para poder fazer o cadastro. 

https://www.youtube.com/watch?v=vKbeKE7oc-U

**Recursos**

* Obriga os interessados inserirem o código gerado em uma imagem para efetuar o registro
* Opção para definir imagem de fundo
* Opção para definir cor a da fonte
* Opção para definir número total de caracteres
* Opção para definir máximo de tentativas erradas antes de bloquear o IP
 
**Sobre**

O plugin Código no Registro foi criado por Anderson Makiyama do [Como Criar um Blog](http://comocriar.blog.br)

== Installation ==

Para instalar o plugin, siga os passos abaixo:

1- Envie o plugin para o diretório de plugins do teu blog, geralmente fica em: /wp-content/plugins/
2- Acesse o painel do teu blog, vá até a seção Plugins e ative o Plugin Código no Registro
3- Agora, irá aparecer um novo ítem lá no final do menu lateral chamado Código no Registro, clique sobre ele para editar as opções do plugin
4- Faça as configurações que achar necessárias e salve as alterações. 

Note que o plugin permite você configurar quantos caracteres (entre 1 e 5) devem ser utilizados no código da imagem. Além disso também é possível definir a cor que você quer para fonte, as opções válidas são: preto, branco, azul, vermelho e verde. Ah, também é possível escolher entre 8 tipo de imagens e também é possível escolher a opção aleatório, assim sendo, o plugin escolherá uma imagem aleatória cada vez que a página de registro for aberta.

== License ==

This file is part of this plugin.
This Plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published
by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
This plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Publish Anonymous Posts. If not, see <http://www.gnu.org/licenses/>.

== Frequently Asked Questions ==

= Posso sugerir idéias ou modificações para este plugin? =
Claro que pode, deixe seu comentário no link [Plugin Codigo Captcha no Registro](http://fazer-site.net/plugin-wordpress-codigo-capcha-no-registro)

== Screenshots ==
1. Pagina de registro com o Plugin Ativado
2. Página de opções do Plugin

== Changelog ==

= 0.1 =
* Publicação do Plugin

= 0.2 =
* Atualização de Links
* Adicionado limite de 3 tentativas para acertar o código da imagem. 
Após ultrapassar este limite, o IP do usuário fica bloqueado durante o dia atual, sendo automaticamente desbloqueado no próximo dia.
* Retirado require do arquivo get_image.php

= 0.3 =
* Adicionado opção para poder definir o número de tentativas antes de bloquear o IP.
Valores entre 3 e 10.

= 1.0 = 
* Adicionado novo seletor de cor
* Adicionada tradução para o inglês
