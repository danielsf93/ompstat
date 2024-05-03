{* //plugins/generic/ompstat/templates/index.tpl *}

{include file="frontend/components/header.tpl" pageTitleTranslated=$title}

<section class="estatisticas_gerais section_dark"{if $journalDescriptionColour} style="background-color: {$journalDescriptionColour|escape};"{/if}>
    <div class="container">
        <header>
            <h1>Estatísticas Gerais:</h1>
        </header>

        <ul class="list-unstyled">  <!-- Usando uma lista para melhor organização -->
            <li><strong>Livros Publicados:</strong> {$livrosPublicados}</li>
            <li><strong>Total de Acessos:</strong> {$totalAcessos}</li>
            <li><strong>Total de Downloads:</strong> {$totalDownloads}</li>
            <li><strong>Séries Publicadas:</strong> {$seriesPublicadas}</li>
            <li><strong>Categorias Publicadas:</strong> {$totalCategorias}</li>
            <li><strong>Usuários Registrados:</strong> {$totalUsuarios}</li>
            <li><strong>Quantidade de Autores:</strong> {count($totalAutores)}</li>  <!-- Retorna direto a contagem -->
            
        </ul>

        <hr>

        <header>
            <h3>Gráfico de Acessos</h3>  <!-- Uma seção separada para o gráfico -->


{* Inclua o script Chart.js, você pode usar um CDN ou local *}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<section class="downloads-por-mes">
    <h2>Downloads por Mês</h2>
    
    <canvas id="downloadsPorMesGrafico"></canvas>  <!-- Onde o gráfico será renderizado -->
    
    <script>
    // JavaScript para renderizar o gráfico
    var ctx = document.getElementById("downloadsPorMesGrafico").getContext("2d");
    
    // Obtem as datas e os valores dos downloads
    var labels = [{foreach from=$downloadsPorMes item=download}{if !$smarty.foreach.downloadsPorMes.first},{/if}{"{$download.data}"}, {/foreach}];
    var data = [{foreach from=$downloadsPorMes item=download}{if !$smarty.foreach.downloadsPorMes.first},{/if}{"{$download.total}"}, {/foreach}];
    
    // Cria o gráfico de barras usando Chart.js
    var myChart = new Chart(ctx, {
        type: "bar", // Tipo do gráfico
        data: {
            labels: labels,
            datasets: [{
                label: "Total de Downloads",
                data: data,
                backgroundColor: "rgba(54, 162, 235, 0.2)", // Cor das barras
                borderColor: "rgba(54, 162, 235, 1)", // Cor da borda das barras
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true // Começa a escala do eixo Y no zero
                    }
                }]
            }
        }
    });
    </script>
</section>




        </header>

        <hr>

        <div class="container2">
            <header>
                <h1>Estatísticas de Acessos Por Mês:</h1>
            </header>
        </div>

        <hr>

        <p>TESTE: {$meuTeste}</p>

    </div>
</section>

{include file="frontend/components/footer.tpl"}
