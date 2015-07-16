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
                foreach($dataset as $dado){
                    echo '{';
            ?>

            label: "Dados primários",
            fillColor: "<?php echo $colours[$i]; ?>",
            strokeColor: "<?php echo $colours[$i]; ?>",
            highlightFill: "<?php echo $colours[$i]; ?>",
            highlightStroke: "<?php echo $colours[$i]; ?>",
            data : [<?php echo $dado; ?>]

            <?php
                $i+1 == $qtdDatasets ? print '}' : print '},';
                $i++;
                }
            ?>
    ]
    };

    window.onload = function(){
        var ctx = document.getElementById("<?php echo $elemento; ?>").getContext("2d");
        var BarChart = new Chart(ctx).Bar(data, options);
    }
</script>