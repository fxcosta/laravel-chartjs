# laravel-chartjs - Gráficos do Chartjs para Laravel 5.x
Esse é um simples pacote que permite a utilização simples e rápida de relatórios e gráficos da biblioteca 
Javascript [Chart.js](http://www.chartjs.org/) de Nick Downie.


# Instalação:
```
composer require fx3costa/laravelchartjs
```

E adicionar o Service Provider no seu arquivo config/app.php:
```
Fx3costa\Laravelchartjs\ChartjsServiceProvider::class
```

Até o presente atual momento é necessário instalar e adicionar a seu arquivo de layouts/templates a lib do Chartjs que pode ser encontrada facilmente para download em: http://www.chartjs.org. Essa configuração também será melhorada.

# Modo de uso:
Exemplo de uso simples, em uma view qualquer que você deseje exibir o gráfico:
```
<div class="container-fluid">
    <canvas id="GraficoBarra" style="width:50%;"></canvas>
</div>

<?php
    $dados = array(
        'Janeiro' => array(33),
        'Fevereiro' => array(32),
        'Março' => array(12)
    );
?>

{!! app()->chartjs->render("GraficoBarra", $dados) !!}
```
Onde $dados é um array com as informações, a chave serve como Label e o valor é o valor da informação propriamente dita.

# OBS:
Essa README, assim como o pacote, está em desenvolvimento mas será atualizada constantemente e os manterei informado assim que
estiver pronta para produção. Obrigado pela compreensão.

Qualquer dúvida ou sugestão, mail me:
fx3costa@gmail.com
