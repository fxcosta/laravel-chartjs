@include('autoload::autoload')

<!--suppress BadExpressionStatementJS -->
<script type="text/javascript">

    var label = []; // graphic label array
    var infor = []; // graphic data array

    // incremeting labels array
    <?php foreach($labels as $label): ?>
        label.push("<?php echo $label; ?>");
    <?php endforeach; ?>


    /**
     * This function is responsible for loading the window.load and instantiate our chart.
     * The parameters of data and options are passed directly to avoid conflict with the
     * variable names when using more than one report.
     */
    addLoadEvent(function() {
        var <?php echo $element; ?> = document.getElementById("<?php echo $element; ?>").getContext("2d");

        window.myBar = new Chart(<?php echo $element; ?>).Bar(
                    // ---------------------------------------------------------------
                    // Data sections
                    // ---------------------------------------------------------------
                    {
                    labels: label,
                    datasets:
                            [
                                <?php
                                $i = 0; // responsible for iteration
                                foreach($dataset as $dado):
                                    echo '{';
                                ?>

                                    label: "Dados primários",
                                    fillColor: "<?php echo $colours[$i]; ?>",
                                    strokeColor: "<?php echo $colours[$i]; ?>",
                                    highlightFill: "<?php echo $colours[$i]; ?>",
                                    highlightStroke: "<?php echo $colours[$i]; ?>",
                                    data : [<?php echo $dado; ?>]

                                    <?php
                                    ($i+1) == $qtdDatasets ? print '}' : print '}, ';
                                    $i++;
                                endforeach;
                                ?>
                            ]
                    },
                    // End data section

                    // ---------------------------------------------------------------
                    // Options section
                    // ---------------------------------------------------------------
                    {
                        responsive:true
                    });
                    // End options section

    });
</script>




