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
					<h3 class="col-md-6">
						<p>Livros Publicados:</p>
					</h3>
				</header>

				<header class="row">
					<h3 class="col-md-6">
						<p>Total de Acessos:</p>
					</h3>
				</header>

				<header class="row">
					<h3 class="col-md-6">
						<p>Total de Downloads:</p>
					</h3>
				</header>

				<header class="row">
					<h3 class="col-md-6">
						<p>Usuários Registrados:</p>
					</h3>
				</header>

				

			</div>
		</section>

 <div class="page">
 <h1>{translate key="plugins.generic.abcdsearch.pagetitle"}</h1>

{$obterDados|escape}

{foreach from=$obterDados item=valor}
    <a href="{url page="copyrightSearch" router=$smarty.const.ROUTE_PAGE}/?query={$valor}"target="_blank">{$valor}</a><br><br>
  
{/foreach}

 </div>

{include file="frontend/components/footer.tpl"}
