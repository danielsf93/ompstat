{* //plugins/generic/ompstat/templates/index.tpl *}

{include file="frontend/components/header.tpl" pageTitleTranslated=$title}

<style>
    /* Estilo para os botões das abas */
    .tablink {
        background-color: #4CAF50; /* Cor de fundo */
        color: white; /* Cor do texto */
        padding: 10px 15px; /* Espaçamento interno */
        border: none; /* Sem borda */
        cursor: pointer; /* Cursor ao passar */
    }

    /* Estilo para os botões ativos */
    .active {
        background-color: #45a049;
    }

    /* Estilo para o conteúdo das abas */
    .tabcontent {
        display: none; /* Inicia oculto */
        padding: 20px; /* Espaçamento interno */
        border: 1px solid #ccc; /* Borda */
    }
</style>

<div class="page">
    <h1>Estatísticas</h1>

    <!-- Abas -->
    <div class="tabs">
        <button class="tablink" onclick="openTab('downloads')">Downloads</button>
        <button class="tablink" onclick="openTab('acessos')">Acessos</button>
    </div>

    <!-- Conteúdo das Abas -->
    <div id="downloads" class="tabcontent">
        <!-- Conteúdo da aba Downloads -->
        <p>Conteúdo da aba Downloads...</p>
    </div>

    <div id="acessos" class="tabcontent">
        <!-- Conteúdo da aba Acessos -->
        <p>Conteúdo da aba Acessos...</p>
    </div>
</div>

{include file="frontend/components/footer.tpl"}

<!-- Script para alternar entre as abas -->
<script>
    function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tabcontent");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        var tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }

        document.getElementById(tabName).style.display = "block";
        event.currentTarget.classList.add("active");
    }
</script>
