{* //plugins/generic/ompstat/templates/index.tpl *}

{include file="frontend/components/header.tpl" pageTitleTranslated=$title}

<style>
    /* Estilo para os botões das abas */
    .tablink {
        background-color: #4CAF50; /* Cor de fundo */
        color: white; /* Cor do texto */
        padding: 15px 160px; /* Espaçamento interno */
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

{* recuperando a informação do arquivo principal *}
{$meuTeste2|escape}
    <h1>Estatísticas</h1>

    <!-- Abas -->
    <div class="tabs">
        <button class="tablink" onclick="openTab('downloads')"><b>Downloads</b></button>
        <button class="tablink" onclick="openTab('acessos')"><b>Acessos</b></button>
    </div>

    <!-- Conteúdo das Abas -->
    <div id="downloads" class="tabcontent">
        <!-- Conteúdo da aba Downloads -->
        <b>Selecione o Ano:</b><br><br>



        
            
                <button id="button2010">2010</button>
                <div id="div2010" style="display:none;">
                    <style>
                        #button2010 {
                            font-weight: bold;
                            background-color: #ececec;
                            color: #076fb1;
                            border-radius: 5px;
                            border: 100;
                            padding: 5px 76px;
                            
                        }
                    </style>
                    <div class="referencia 2010">
                        ola









                        
                    </div>
                    <script>
                        const button2010 = document.getElementById("button2010");
                        const div2010 = document.getElementById("div2010");
                        button2010.addEventListener("click", function () {
                            if (div2010.style.display === "none") {
                                div2010.style.display = "block";
                                button2010.innerHTML = "2010";
                            } else {
                                div2010.style.display = "none";
                                button2010.innerHTML = "2010";
                            }
                        });
                    </script>
                </div><br><br>

           <button id="button2011">2011</button>
                <div id="div2011" style="display:none;">
                    <style>
                        #button2011 {
                            font-weight: bold;
                            background-color: #ececec;
                            color: #076fb1;
                            border-radius: 5px;
                            border: 100;
                            padding: 5px 76px;
                            
                        }
                    </style>
                    <div class="referencia 2011">
                        ola
                    </div>
                    <script>
                        const button2011 = document.getElementById("button2011");
                        const div2011 = document.getElementById("div2011");
                        button2011.addEventListener("click", function () {
                            if (div2011.style.display === "none") {
                                div2011.style.display = "block";
                                button2011.innerHTML = "2011";
                            } else {
                                div2011.style.display = "none";
                                button2011.innerHTML = "2011";
                            }
                        });
                    </script>
                </div><br><br>











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
