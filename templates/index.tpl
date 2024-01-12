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
            <hr>
            <p>TESTE: {$meuTeste}</p>
            <hr>
        </div>
    </section>

{include file="frontend/components/footer.tpl"}
