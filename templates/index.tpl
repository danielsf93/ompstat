{* //plugins/generic/ompstat/templates/index.tpl *}

{include file="frontend/components/header.tpl" pageTitleTranslated=$title}

<section class="estatisticas_gerais section_dark"{if $journalDescriptionColour} style="background-color: {$journalDescriptionColour|escape};"{/if}>
    <div class="container">
        <header class="row">
            <h1 class="col-md-6">
                <p>Estatisticas Gerais:</p>
            </h1>
        </header>
        
        <header class="row">
            <header class="row">
                <h3 class="col-md-6">
                    <p>Livros Publicados: {$livrosPublicados}</p>
                </h3>
            </header>
            <header class="row">
                <h3 class="col-md-6">
                    <p>Total de Acessos: {$totalAcessos}</p>
                </h3>
            </header>
            <header class="row">
                <h3 class="col-md-6">
                    <p>Total de Downloads: {$totalDownloads}</p>
                </h3>
            </header>
            <header class="row">
                <h3 class="col-md-6">
                    <p>Séries Publicadas: {$seriesPublicadas}</p>
                </h3>
            </header>
            <header class="row">
                <h3 class="col-md-6">
                    <p>Categorias Publicadas: {$totalCategorias}</p>
                </h3>
            </header>
        
            <header class="row">
            <h3 class="col-md-6">
                <p>Usuários Registrados: {$totalUsuarios}</p>
            </h3>

            
            
        


            <header class="row">
                        <h3 class="col-md-6">

            <p>Quantidade de Autores: {count($totalAutores)}</p>

      </h3>

</header>

    </div>

<hr>
<div class="container2">
            <header class="row">
                <h1 class="col-md-6">
                    <p>Estatísticas de Acessos Por Mês:</p>
                </h1>
            </header>

            

            {foreach from=$monthsList item=mes}
                <header class="row">
                    <h3 class="col-md-6">
                        <p>{$mes}: {$metricsPorMes[$mes]}</p>
                    </h3>
                </header>
            {/foreach}
        </div>

        <hr>
        <p>TESTE: {$meuTeste}</p>
        <hr>
    </section>

{include file="frontend/components/footer.tpl"}
