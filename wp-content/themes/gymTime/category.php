<?php get_header() ;?>




</h2>
<main class="pagina seccion no-sidebars contenedor">

    <h2 class="text-center texto-primario">
        <?php $categoria = get_queried_object() ;?>


            Categoria: <?php echo $categoria->name ;?>
    <!-- //  echo "<pre>";-->
     <!--  // var_dump($categoria->name);-->
      <!--  // echo "</pre>";-->

        <?php  get_template_part('template-parts/loop','blog') ;?>

</main>





<?php get_footer() ;?>