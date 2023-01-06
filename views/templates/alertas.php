
<!-- Alertas Mensajes -->
<?php
    //iterar
    foreach($alertas as $key => $mensajes):
        foreach($mensajes as $mensaje):
?>  
    <!-- mostrar mensaje -->
    <div class="alerta <?php echo $key; ?>">
            <?php echo $mensaje; ?>
    </div>
<?php
        endforeach;
    endforeach;

?>