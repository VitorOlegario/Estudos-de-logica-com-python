<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistência Técnica</title>
    <link rel="stylesheet" href="PaginaPrincipal.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="botao-container">
        <button id="recebimento"></button>
        <p class="botao-texto">Recebimento</p>
    </div>
    
    <div class="botao-container2">
        <button id="analise"></button>
        <p class="botao-texto2">Análise</p>
    </div>
    <div class="botao-container3">
        <button id="reparo"></button>
        <p class="botao-texto3">Reparo</p>
    </div>
    <div class="botao-container4">
        <button id="qualidade"></button>
        <p class="botao-texto4">Qualidade</p>
    </div>
    <div class="botao-container5">
        <button id="expedicao"></button>
        <p class="botao-texto5">Expedição</p>
    </div>
    <div class="botao-container6">
        <button id="relatorio"></button>
    </div>
    <div class="botao-container7">
        <button id="voltar" onclick="window.history.back();"></button>
        <p class="botao-texto7">Voltar</p>
    </div>  
      
   </div>
   
   <iframe id="conteudo-frame" src="" width="100%" height="600px" style="border: none; display: none;"></iframe>
   <!--<iframe id="painel-frame" src="../PaginaPrincipal/painel.php" width="100%" height="600px" style="border: none;"></iframe>-->
   <script>
       document.addEventListener("DOMContentLoaded", function () {
    const conteudoFrame = document.getElementById("conteudo-frame");
    let isFrameAberto = false;
    let paginaAtual = "";

    function alternarFrame(pagina) {
        if (!isFrameAberto || paginaAtual !== pagina) {
            conteudoFrame.src = pagina; // Carrega a nova página
            conteudoFrame.style.display = "block"; // Exibe o iframe
            isFrameAberto = true;
            paginaAtual = pagina;
        } else {
            conteudoFrame.style.display = "none"; // Oculta o iframe
            conteudoFrame.src = ""; // Limpa o src
            isFrameAberto = false;
            paginaAtual = "";
        }
    }

    document.getElementById("recebimento").addEventListener("click", function () {
        alternarFrame("recebimento.php");
    });

    document.getElementById("analise").addEventListener("click", function () {
        alternarFrame("analise.php");
    });
});

document.getElementById('relatorio').addEventListener('click', function() {
            const relatorio = this;
            const body = document.body;

            // Lista dos botões para conexão
            const buttons = [
                document.getElementById('analise'),
                document.getElementById('reparo'),
                document.getElementById('qualidade'),
                document.getElementById('expedicao'),
                document.getElementById('recebimento')
                
            ];

            // Tempo de intervalo entre cada linha (200ms)
            const intervalBetweenLines = 200;
            let currentIndex = 0;

            // Função para criar e animar uma linha
            function createLine(target) {
                const relatorioRect = relatorio.getBoundingClientRect();
                const targetRect = target.getBoundingClientRect();

                // Calcular a distância e o ângulo entre os botões
                const dx = targetRect.left + targetRect.width / 2 - (relatorioRect.left + relatorioRect.width / 2);
                const dy = targetRect.top + targetRect.height / 2 - (relatorioRect.top + relatorioRect.height / 2);
                const distance = Math.sqrt(dx * dx + dy * dy);
                const angle = Math.atan2(dy, dx) * 180 / Math.PI;

                // Criar a linha
                const line = document.createElement('div');
                line.classList.add('line');
                line.style.width = '0px';
                line.style.left = `${relatorioRect.left + relatorioRect.width / 2}px`;
                line.style.top = `${relatorioRect.top + relatorioRect.height / 2}px`;
                line.style.transform = `rotate(${angle}deg)`;
                line.style.position = 'absolute';
                body.appendChild(line);

                // Animar a linha
                setTimeout(() => {
                    line.style.width = `${distance}px`;
                    line.classList.add('visible');
                }, 100);
            }

            // Função para animar as linhas sequencialmente
            function animateLines() {
                if (currentIndex < buttons.length) {
                    createLine(buttons[currentIndex]);
                    currentIndex++;
                    setTimeout(animateLines, intervalBetweenLines);
                } else {
                    // Após todas as linhas serem criadas, iniciar a rotação
                    setTimeout(() => {
                        relatorio.classList.add('loading');
                    }, 100);

                    // Redirecionar após 5 segundos de rotação
                    setTimeout(() => {
                        window.location.href = '../../DashBoard/frontendDash/DashRecebimento.html';
                    }, 5000);
                }
            }

            // Iniciar a animação das linhas
            animateLines();
        });
   </script>
</body>
</html>
