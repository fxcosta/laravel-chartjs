<script src="js/Chart.js"></script>

<!--suppress BadExpressionStatementJS -->
<script type="text/javascript">

    var label = []; // array com labels do gráfico
    var infor = []; // array com os dados do gráfico

    /**
     * populo os meus arrays js com os dados que foram recebidos
     */
    <?php foreach($labels as $label){ ?>
    label.push("<?php echo $label; ?>");
    <?php } ?>

    //console.log(infor[1 ]);

    var options = {
        responsive:false
    };

    var data = {
        labels: label,
        datasets: [
            <?php
                $i = 0;
                foreach($dados as $dado){
                    echo '{';
                ?>
            label: "Dados primários",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data : [<?php echo $dado; ?>]
    <?php
        $i+1 == $datasets ? print '}' : print '},';
        $i++; }
    ?>
    ]
    };

    window.onload = function(){
        var ctx = document.getElementById("<?php echo $elemento; ?>").getContext("2d");
        var BarChart = new Chart(ctx).Bar(data, options);
    }
</script>