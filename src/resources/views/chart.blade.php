<script src="js/Chart.js"></script>

<script type="text/javascript">

    var label = []; // array com labels do gráfico
    var infor = []; // array com os dados do gráfico

    /**
     * populo os meus arrays js com os dados que foram recebidos
     */
    <?php foreach($dados as $key => $dado){ ?>
        label.push("<?php echo $key; ?>");
        infor.push("<?php echo $dado; ?>");
    <?php } ?>


    var options = {
        responsive:true
    };

    var data = {
        labels: label,
        datasets: [
            {
                label: "Dados primários",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data : infor
            }
        ]
    };

    window.onload = function(){
        var ctx = document.getElementById("<?php echo $elemento; ?>").getContext("2d");
        var BarChart = new Chart(ctx).Bar(data, options);
    }
</script>