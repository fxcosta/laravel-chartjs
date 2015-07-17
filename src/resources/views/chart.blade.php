<script src="js/Chart.js"></script>

<!--suppress BadExpressionStatementJS -->
<script type="text/javascript">

    var label = []; // graphic label array
    var infor = []; // graphic data array


    // incremeting labels array
    <?php foreach($labels as $label){ ?>
        label.push("<?php echo $label; ?>");
    <?php } ?>


    var options = {
        responsive:false
    };


    /**
     * Here i use the default style concatenation between javascript and php by preference, for
     * future expansion and for me to believe so far it is better to work in this case.
     * TODO: improve the color scheme
     */
    var data = {
        labels: label,
        datasets: [
            <?php
                // responsible for iteration
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
                ($i+1) == $qtdDatasets ? print '}' : print '},';
                $i++;
                }
            ?>
    ]
    };

    window.onload = function(){
        var ctx = document.getElementById("<?php echo $element; ?>").getContext("2d");
        var BarChart = new Chart(ctx).Bar(data, options);
    }
</script>