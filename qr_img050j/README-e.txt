QR Code Perl CGI & PHP script ver.0.50i

                                 Copyright (c) 2000-2009, Y.Swetake
                                 Todos os direitos reservados.

1, sobre esse software

Este e um software livre para produzir uma imagem de QRcode em Perl ou PHP.
Estes programas suportam QRcode model2 version1-40, e algumas funcoes
NAO sao suportados. (por exemplo, mudanca de modo, modo KANJI etc.)



2, diretorio e arquivos

  qr_img0.50 - + - perl - + - qr_img.cgi
             | + - qr_image.pl
             | + - qr_html.pl
             |
             + -data - + - qrvV_N.dat
             | + - rscX.dat
             | + - qrvfrV.dat
             |
             + -image - + - qrvV.png
             | + - b.png d.png
             |
             + -php - qr_img.php


qr_img.cgi  Perl Programa(programa CGI, mas isso tambem funciona no shell).
qr_image.pl subprograma para saida de uma imagem png ou jpeg.
qr_html.pl  sub-programa para saida html.

qrvV_N.dat  arquivo de dados de geometria e mascara para a versao V, ecc nivel N
rscX.dat    arquivo de dados de tabelas de calucatina para codificacao RS
qrvfrV.dat  arquivo de dados do padrao fixo para a versao V (para o modo html)

qrvV.png 	arquivo de imagem do padrao fixo para a versao V.
b.png 		imagem quadrada brilhante (para o modo html)
d.png 		imagem quadrada escura (para o modo html)

qr_img.php 	Programa PHP (requer GD.)

README.txt  Documento em japones (EUC)
README.sjis Documento em japones (SJIS)
README_e.txt este documento.

3, requisito

 Se voce criar uma imagem PNG ou JPEG, voce precisa de GD.
 E voce pode precisar compilar ou coordenar parametros
 para usar o GD corretamente de Perl ou PHP.

 Verifiquei este programa no abaixo do ambiente

    Linux 2.4.18 (x86)
	apache-1.3.27 + PHP-4.3.0 (como modulo apache)
	perl 5.6.1
	GD 2.0.11
	GD.pm 2.06

* CUIDADO *
  Este programa NAO e executado no GD 2.0. [0-9] ou PHP4.3. [01] agrupar
  para o erro de GD.
  Use GD versao 1.8.x, 2.0.10 ou superior.

4, uso

4-1, configuracao

Defina um caminho para perl ou php (no uso como cgi).

Altere os valores na area de configuracao, se voce precisar.
(Se voce usar no posicionamento descompactado, voce nao precisa alterar o valor.
Mas voce pode precisar mover alguns arquivos para a posicao indicada.
por exemplo. b.png)

4-2, uso

Do navegador

qr_img.cgi? d = dados [& e = (L, M, Q, H)] [& s = tamanho int] [& v = (1-40)] [& t = (J, H)]
          [& m = (1-16) & n = (2-16) [& o = dados originais] [& p = (0-255)]]

qr_img.php? d = dados [& e = (L, M, Q, H)] [& s = tamanho int] [& v = (1-40)] [& t = J]
          [& m = (1-16) & n = (2-16) [& o = dados originais] [& p = (0-255)]]

d: Dados que voce deseja codificar para QRcode.
    Uma letra especial como '%'. O espaco ou a letra de 8 bits devem ser codificados por URL.
    Voce nao pode omitir esse parametro.

e: erro no nivel correto
    Voce pode definir 'L', 'M', 'Q' ou 'H'.

    Se voce nao definir, o programa seleciona 'M'.

s: tamanho do modulo
    Este parametro nao tem efeito no modo HTML.
    Voce pode definir um numero superior a 1.
    O tamanho da imagem depende desse parametro.

    Se voce nao definir, o programa seleciona '4' no modo PNG ou '8' no modo JPEG.

v: versao
    Voce pode configurar 1-40.
    Se voce nao definir, o programa seleciona automaticamente.

t: tipo de imagem
    Voce pode definir 'J', 'H' ou outro.
    'J': modo jpeg.
    'H': modo html. (Apenas para perl)
    Outro: modo png.

    Se voce nao definir, selecione o modo PNG selecionado.

* CUIDADO *
O parametro abaixo e experimental.

n: estrutura anexa n (2-16) imagem n. ‹ m de n.
m: estrutura anexa m (1-16) imagem n. ‹ m de n.
p: estrutura adiciona paridade
o: dados originais (dados codificados por URL) para calcular a paridade

Na linha de comando (apenas para Perl)

exemplo
 $ ./qr_img.cgi d = Este + e + a + pen e = L s = 3> qrcode.png

 $ ./qr_img.cgi e = H <data.txt> qrcode.png

 Se voce inserir dados do STDIN, os dados nao precisam ser codificados por URL.

5,Notice

This software is a free software.
You can freely use,change or redistribute unless you change the 
copyright and disclaimer in this program and this document.


THIS SOFTWARE IS PROVIDED BY Y.Swetake ``AS IS'' AND ANY EXPRESS OR
IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
IN NO EVENT SHALL Y.Swetake OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES 
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)  HOWEVER CAUSED 
AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE
USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.


6,Others

If you find bugs,please tell me.
(But I may be unable to reply,because I'm a poor at English.)

e-mail: swe[ at-mark ]venus.dti.ne.jp

URL: http://www.swetake.com/ (Japanese page)


5, aviso

Este software e um software livre.
Voce pode usar, mudar ou redistribuir livremente, a menos que voce altere o
Direitos autorais e isencao de responsabilidade neste programa e neste documento.


ESTE SOFTWARE E FORNECIDO POR Y.Swetake "COMO ESTA" E NENHUM EXPRESSO OU
GARANTIAS IMPLICITAS, INCLUINDO, MAS NAO SE LIMITANDO A, GARANTIAS IMPLICITAS
DE COMERCIALIZACAO E ADEQUACAO A UM DETERMINADO PROPOSITO SAO ISENCIADOS.
EM NENHUMA CIRCUNSTANCIA A CONTEUDO OU OS COLABORADORES SERAO RESPONSAVEIS POR QUALQUER DIRETOR,
DANOS INDIRETOS, INCIDENTAIS, ESPECIAIS, EXEMPLARES OU CONSEQUENCIAIS
(INCLUINDO, MAS NAO SE LIMITANDO A, AQUISICAO DE PRODUTOS OU SERVICOS SUBSTITUTOS;
PERDA DE USO, DADOS OU LUCROS; OU INTERRUPCAO DE NEGOCIOS), QUALQUER CAUSA
E EM QUALQUER TEORIA DE RESPONSABILIDADE, SEJA EM CONTRATO, RESPONSABILIDADE ESTRITA,
OU DELITO (INCLUINDO NEGLIGENCIA OU DE OUTRA FORMA) DECORRENDO DE QUALQUER FORMA
UTILIZACAO DESTE SOFTWARE, INCLUSO SE AVISADA DA POSSIBILIDADE DE TAIS DANOS.


6, outros

Se voce encontrar insetos, por favor me diga.
(Mas talvez eu nao consiga responder, porque sou pobre em ingles).

E-mail: swe [at-mark] venus.dti.ne.jp

URL: http://www.swetake.com/ (pagina japonesa)
