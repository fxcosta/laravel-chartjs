@include('autoload::autoload')

<!--suppress BadExpressionStatementJS -->
<script type="text/javascript">


    addLoadEvent(function(){
        var <?php echo $element; ?> = document.getElementById("<?php echo $element; ?>").getContext("2d");
        var PizzaChart = new Chart(<?php echo $element; ?>).Pie(
                // ---------------------------------------------------------------
                // Data sections
                // ---------------------------------------------------------------
                [
                    <?php
                        // responsible for iteration
                        $i = 0;
                        foreach($data as $label => $d){
                        echo '{';
                    ?>

                    value: <?php echo $d['value']; ?>,
                    color:"<?php echo $d['colour']; ?>",
                    highlight: "<?php echo $d['highlight']; ?>",
                    label: "<?php echo $d['label']; ?>"

                    <?php
                        ($i+1) == $qtdData ? print '}' : print '},';
                        $i++;
                    }
                    ?>
                ],
                // End data section


                // ---------------------------------------------------------------
                // Options section
                // ---------------------------------------------------------------
                {
                    responsive:true
                }
                // End options section
        );
    });
</script>