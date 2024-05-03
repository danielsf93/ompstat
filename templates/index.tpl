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
