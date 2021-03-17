<?php
get_template_part('includes/header');
bk_main_before();

$tiene_contenidos = get_field('tiene_contenidos');

// CUSTOM FLIELDS Descripciones
$grupo_de_datos = get_field('grupo_de_datos');
$ubicacion = $grupo_de_datos['ubicacion'];
$precio_desde = $grupo_de_datos['precio_desde'];
$tipologia_select = $grupo_de_datos['tipologia_select'];
$legal = $grupo_de_datos['legal'];
$whatsapp = $grupo_de_datos['whatsapp'];
$tag_del_ptroyecto = $grupo_de_datos['tag_del_ptroyecto'];
$caracteristicas_proyecto = $grupo_de_datos['caracteristicas_proyecto'];
$terminaciones_repeater = $grupo_de_datos['terminaciones_repeater'];
$folleto = $grupo_de_datos['folleto'];
$caracteristica_personalizada = $grupo_de_datos['caracteristicas_personalizadas'];
$planok = get_field( 'plan_ok' );
$pie_en_30_cuotas = get_field( 'pie_en_30_cuotas' );
$video = get_field( 'video' );
$imagen_video_portada = get_field( 'imagen_video_portada' );

// CUSTOM FLIELDS Imágenes Generales
$slider_proyecto = get_field('slider_proyecto');
$logo_proyecto = get_field('logo_proyecto');

// CUSTOM FLIELDS Arquitectura e Interiorismo
$arquitectura_interiorismo = get_field('arquitectura_interiorismo');
$slider_arquitectura = get_field('slider_arquitectura');

// CUSTOM FLIELDS Galerías
$repeater_galerias = get_field('repeater_galerias');

// CUSTOM FLIELDS Master Plan
$slider_master_plan = get_field('slider_master_plan');

// CUSTOM FLIELDS Ubicación y entorno
$descripcion_de_entorno = get_field('descripcion_de_entorno');
$mapa_de_ubicacion = get_field('mapa_de_ubicacion');
$mapa_de_ubicacion_mobile = get_field('mapa_de_ubicacion_mobile');
$gmaps = get_field('gmaps');
$waze = get_field('waze');

// CUSTOM FLIELDS 360º
$url_360 = get_field('url_360');
$text_360 = get_field('text_360'); 

$terms = wp_get_post_terms($post->ID, 'ubicaciones');
if (!empty($terms)) {
    foreach ($terms as $term) {
        $parent = $term->parent;
        $lugar = $term->name;
    }
}
?>
<div class="d-none d-md-block">
    <ul class="follow-button-pay bg-white shadow align-items-center <?php echo ($whatsapp) ? 'justify-content-md-between' : 'justify-content-md-start' ?>" style="min-width:<?php echo ($whatsapp) ? '380px' : '' ?>;">
        <li class="">
            <a href="#" class="contactoModalBtn btn btn-secondary btn-sm bk--btn__primary shadow p-2">
                <div class="d-md-inline">
                <i class="far fa-envelope"></i> 
                </div>
                <small>
                Contáctanos
                </small>
            </a>
        </li>
        <li class="">
            <a href="#" id="agendarConCalenly" class="btn btn-secondary btn-sm bk--btn__primary shadow p-2 <?php echo ($whatsapp) ? 'mx-2' : 'mx-2' ?>">
                <div class="d-md-inline">
                <i class="far fa-calendar-alt"></i>
                </div>
                <small>
                Agendar
                </small>
            </a>
        </li>
        <?php if($whatsapp): ?>
        <li class="text-center">
            <a id="whatsappButton" href="https://api.whatsapp.com/send/?phone=<?php echo $whatsapp;?>&text=Me%20interesa%20el%20 %20proyecto%20<?php echo the_title();?>" target="_blank">
                <img src="<?php bloginfo('template_directory');?>/assets/img/whatsappAmarillo.svg" alt="whatsapp" style="max-height:40px">
            </a>
        </li>
        <?php endif; ?>
        <li></li>
    </ul>
</div>
<?php if (have_rows('slider_proyecto')) : ?>
<section class="master-carousel owl-carousel primary-hero">
    <?php while (have_rows('slider_proyecto')) : the_row();
        // vars
        $slider_proyecto_desktop = get_sub_field('slider_proyecto_desktop');
        $slider_proyecto_mobile = get_sub_field('slider_proyecto_mobile');
    ?>
    <div class="item project-hero">
        <img src="<?php echo $slider_proyecto_desktop['url'];?>" alt="<?php echo $slider_proyecto_desktop['alt'];?>">
    </div>
    <?php endwhile; ?>
</section>
<?php endif; ?>

<div class="container projec-wrapper-container">
    <div class="row align-items-stretch mb-4">
        <div class="<?php echo ($caracteristicas_proyecto) ? "col-md-8" : "col-md-12";?> bg-white shadow mb-3">
            <ul class="projec-wrapper-content d-md-flex justify-content-around align-items-stretch m-0 mb-2 pt-3">
                <?php if ($logo_proyecto):?>
                <li class="projec-wrapper-content-img d-flex align-items-center justify-content-center ml-4">
                    <div class="wrapper-img-project">
                    <h1>
                        <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="pr-4" >
                        <div class="sr-only"><?php echo the_title(); ?></div>
                    </h1>
                    </div>
                </li>
                <hr class="d-md-none">
                <?php endif; ?>
                <?php if ($ubicacion && ! $pie_en_30_cuotas):?>
                <li class="projec-wrapper-content-ubicacion d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <i class="fas fa-map-marker-alt"></i> <br>
                        <p class="px-3"><?php echo $ubicacion;?></p>
                    </div>
                </li>
                <hr class="d-md-none">
                <?php endif; ?>
                <?php if ($pie_en_30_cuotas):?>
                <li class="projec-wrapper-content-ubicacion d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <img style="min-height: 50px; width:100%; max-width: 150px;" class="px-1" src="<?php echo $pie_en_30_cuotas['url'];?>" alt="Promoción">
                    </div>
                </li>
                <hr class="d-md-none">
                <?php endif; ?>
                <?php if ($tipologia_select && $tipologia_select != 'seleccionar') :?>
                <li class="projec-wrapper-content-tipo d-flex align-items-center justify-content-center">
                    <div>
                        <img style="min-height: 50px; width:100%; max-width: 150px;" class="px-4" src="<?php echo bloginfo('template_directory').'/assets/img/'. $tipologia_select['value'] .'.svg'; ?>" alt="<?php echo $tipologia_select['label']; ?>">
                    </div>
                </li>
                <hr class="d-md-none">
                <?php endif; ?>
                <?php if ($precio_desde):?>
                <li class="projec-wrapper-content-precio d-flex align-items-center justify-content-center">
                    <div>
                        <p class="m-0">Precio desde</p>
                        <h4 class="m-0"><b>UF <?php echo $precio_desde;?></b></h4>
                        <p class="m-0" style="line-height:.8;color:#c3c3c3;"><small ><?php echo $legal; ?></small></p>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if ($caracteristicas_proyecto) : ?>
        <div class="col-md-4 mb-3 d-flex">
            <ul class="owl-carousel project-carousel d-none d-md-flex justify-content-around m-0">
                <?php foreach ($caracteristicas_proyecto as $caracteristicas_proyect) : ?>
                    <li class="project-carousel--item mx-3 align-items-center d-flex flex-column justify-content-between">
                        <div class="pt-3">
                            <img src="<?php bloginfo('template_directory');?>/assets/img/<?php echo $caracteristicas_proyect['value']; ?>.svg" alt="<?php echo $caracteristicas_proyect['label']; ?>">
                        </div>
                        <p class="m-0 pb-2"><?php echo $caracteristicas_proyect['label']; ?></p>
                    </li>
                <?php endforeach; ?>
                <?php if($caracteristica_personalizada):
                    foreach ($caracteristica_personalizada as $item) : ?>
                    <li class="project-carousel--item mx-3 align-items-center d-flex flex-column justify-content-between">
                        <div class="pt-3">
                            <img src="<?php echo $item['caracteristica_personalizada_imagen']['url']; ?>" alt="icono personalizado">
                        </div>
                        <p class="m-0 pb-2"><?php echo $item['caracteristica_personalizada_texto']; ?></p>
                    </li>
                <?php endforeach; endif;?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if ($arquitectura_interiorismo) : ?>
<section class="container py-md-5">
    <div class="row py-5 align-items-center" id="proyecto">
        <div class="col-md-6">
            <h3 class="text-uppercase section-title"><span class="primary-title">Arquitectura</span><br><span
                    class="secondary-title">& Interiorismo</span></h3>
            <p class="pr-5" >
                <?php echo $arquitectura_interiorismo; ?>
            </p>
            <?php if ($terminaciones_repeater) : ?>
            <p class="pr-5" >
                <b>Los espacios y terminaciones que hacen la diferencia:</b>
            </p>
            <ul class="pl-4" style="list-style-type: disc !important;">
                <?php foreach ($terminaciones_repeater as $clave=>$terminaciones_item):?>
                <li><?php echo $terminaciones_item['terminaciones_item'];?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if( $folleto ): ?>
                <a href="<?php echo $folleto; ?>" class="btn btn-secondary btn-sm bk--btn__primary shadow py-2 my-3 text-capitalize" target="_blank">descargar folleto</a>
            <?php endif; ?>
        </div>
        <?php if ( $video ) : ?>
            <div class="col-md-6 d-none d-md-block">
                <div class="video-portada">
                    <a href="javascript:void();" class="item p-5 d-block playvideo" data-src="https://www.youtube.com/embed/<?php echo $video; ?>" data-toggle="modal" data-target="#homeVideo">
                        <img src="<?php echo $imagen_video_portada['url'];?>" alt="<?php echo $imagen_video_portada['alt'];?>" class="w-100">
                    </a>
                </div>
            </div>
        <?php else : ?>
            <?php if (have_rows('slider_arquitectura')) : ?>
            <div class="col-md-6 d-none d-md-block">
                <div class="arquitectura-carousel owl-carousel ">
                    <?php while (have_rows('slider_arquitectura')) : the_row();
                        // vars
                        $slider_arquitectura_desktop = get_sub_field('slider_arquitectura_desktop');
                    ?>
                    <div class="item p-5">
                        <img src="<?php echo $slider_arquitectura_desktop['url'];?>" alt="<?php echo $slider_arquitectura_desktop['alt'];?>" class="w-100">
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if ($caracteristicas_proyecto) : ?>
<section class="container-fluid bg-azul mb-5" style="background-image: url('<?php echo $slider_proyecto_desktop['url'];?>');">
    <div class="container ">
        <div class="row py-5" id="caracteristicas">
            <div class="col-12 text-white">
                <h4 class="text-white text-uppercase text-center py-5">Los espacios que necesitas para <strong>la vida
                        de hoy</strong> </h4>
                <ul class="d-md-flex justify-content-around ">
                    <?php foreach ($caracteristicas_proyecto as $caracteristicas_proyect) : ?>
                        <li class="mx-md-4 text-center d-flex flex-column justify-content-between project-icons">
                            <div>
                                <img src="<?php bloginfo('template_directory');?>/assets/img/<?php echo $caracteristicas_proyect['value']; ?>.svg" alt="<?php echo $caracteristicas_proyect['label']; ?>">
                            </div>
                            <p class="py-2"><?php echo $caracteristicas_proyect['label']; ?></p>
                        </li>
                    <?php endforeach; ?>
                    <?php if($caracteristica_personalizada):
                        foreach ($caracteristica_personalizada as $item) : ?>
                        <li class="mx-md-4 text-center d-flex flex-column justify-content-between project-icons">
                            <div class="">
                                <img src="<?php echo $item['caracteristica_personalizada_imagen']['url']; ?>" alt="icono personalizado">
                            </div>
                            <p class="py-2"><?php echo $item['caracteristica_personalizada_texto']; ?></p>
                        </li>
                        <?php  endforeach; endif;?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $query = new WP_Query(array(
    'post_type'          => 'plantas',
    'posts_per_page'    => -1,
    'post_status'        => 'publish',
    'meta_query' => array(
        array(
            'key' => 'vincular_planta_a_proyecto',
            'value' => '' . get_the_ID() . '',
            'compare' => '='
        )
    ),
    'meta_key'        => 'estado',
    'orderby' => array(
        'estado' => 'DESC',
        'title' => 'ASC',
    )
));
if ($query->have_posts()) : ?>
<section class="container-fluid my-5 pt-5" id="plantas">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="flex-wrapper d-flex justify-content-between alig-items-center">
                    <div class="wrapper-only">
                        <h3 class="text-uppercase section-title"><span class="primary-title">Plantas</span></h3>
                    </div>
                    <ul class="filter_list text-uppercase d-none d-md-flex justify-content-center align-items-end">
                        <li class="mr-2"><a id="todo" class="filter_list_item active btn btn-sm btn-primary">Todas</a>
                        </li>
                        <li class="mr-2"><a id="estudio" class="filter_list_item btn btn-sm btn-secondary">Estudio</a>
                        </li>
                        <li class="mr-2"><a id="1dorm" class="filter_list_item btn btn-sm btn-secondary">1 Dorm</a></li>
                        <li class="mr-2"><a id="2dorm" class="filter_list_item btn btn-sm btn-secondary">2 Dorm</a></li>
                        <li class="mr-2"><a id="3dorm" class="filter_list_item btn btn-sm btn-secondary">3 Dorm</a></li>
                        <li class="mr-2"><a id="4dorm" class="filter_list_item btn btn-sm btn-secondary">4 o más</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post();

                    $estado = get_field('estado');

                    $post_id = get_the_ID();
                    $superficie_total = get_field('superficie_total');
                    $cantidad_de_banos = get_field('cantidad_de_banos');

                    $dormitorios_para_filtrar = get_field_object('dormitorios_para_filtrar');
                    $value = $dormitorios_para_filtrar['value'];
                    $label = $dormitorios_para_filtrar['choices'][$value];

                    $fotografia_planta = get_field('repeater_fotografias');
                    $fotografia_planta_mobile = $fotografia_planta[0]['fotografia_planta']['url'];
                ?>

            <div class="col-sm-6 col-lg-4 planta <?php echo $value; ?> <?php echo ($estado == 'Normal') ? "active" : "";?>">
                <?php if ($estado == 'Normal') : ?>
                <a href="<?php echo ($planok) ? "#": the_permalink(); ?>" <?php echo ($planok) ? 'data-toggle="modal" data-target="#planok-modal"' : '';?> >
                <?php endif;?>
                    <div class="planta-item d-block text-center shadow ">

                        <h3 class="d-none p-3 text-uppercase mb-2 <?php echo ($estado == 'Normal') ? "bg-secondary text-white " : "bg-grey" ?>">
                            <?php echo the_title(); ?>
                        </h3>

                        <div class="bk-info-wrap  mb-5 card rounded-0">
                            <p class="pl-5 pt-4 m-0 text-left" style="font-size:1rem;">
                                <b><?php echo esc_html($label); ?> +</b>
                                <b><?php echo $cantidad_de_banos; echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                                </b>
                            </p>
                            
                            <?php if ($fotografia_planta) : ?>
                            <div style="overflow: hidden;position: relative;">
                                <?php if ($estado == 'Agotado') : ?>
                                <div class="img-overlay" style="filter: grayscale(1) opacity(50%); position:absolute; width:100%;height:100%;background:#fff"></div>
                                <?php endif;?>
                                <img class="m-auto pb-4 fotografia-planta <?php echo ($estado == 'Normal') ? "" : "img-overlay" ?>"
                                    src="<?php echo $fotografia_planta[0]['fotografia_planta']['sizes']['medium']; ?>"
                                    alt="<?php echo $row['fotografia_planta']['name']; ?>">
                            </div>
                            <?php endif; ?>

                            <ul class="d-flex py-3 m-0 border-right-0 border-left-0" style="border-bottom:1px solid #D3D3D3;">
                                <li class="d-none">
                                    <img src="<?php bloginfo('template_directory');?>/assets/img/bedIcon.png" alt="Dormitorios"
                                        style="max-width:26px">
                                    <small><?php echo esc_html($label); ?></small>
                                </li>
                                <li class="d-none">
                                    <img src="<?php bloginfo('template_directory');?>/assets/img/batIcon.png" alt="Baños"
                                        style="max-width:24px">
                                    <small><?php echo $cantidad_de_banos;
                                                echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                                    </small>
                                </li>
                                <li class="pl-5">
                                    <p style="font-size:1rem"><img
                                            src="<?php bloginfo('template_directory');?>/assets/img/areaIcon.png" alt="Area"
                                            style="max-width:22px">
                                        <span class="pl-2">Sup. Total</span> <b><?php echo $superficie_total; ?>m<sup>2</sup></b> apróx.
                                    </p>
                                </li>
                            </ul>

                            <ul class="d-flex justify-content-between align-items-center py-3 m-0" style="background:#F6F8FA">
                                <li class="pl-5 d-none">
                                    Desde <b class="">UF 2300</b>
                                </li>
                                <li class="ml-auto">
                                    <?php if ($estado == 'Normal') : ?>
                                        <?php if ($planok) : ?>
                                            <a class="btn btn-primary px-4 mr-3 text-uppercase" data-toggle="modal" data-target="#planok-modal">Cotizar</a>
                                        <?php else:?>
                                            <div class="btn btn-primary px-4 mr-3 text-uppercase">cotizar</div>
                                        <?php endif;?>
                                    <?php else : ?>
                                    <p class="btn btn-primary disabled bg-grey mr-3 mb-0">Agotada</p>
                                    <?php endif; ?>
                                </li>
                            </ul>

                        </div>
                    </div>
            <?php if ($estado == 'Normal') : ?>
                </a>
            <?php endif; ?>
            </div>

            <?php endwhile;
                wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if (have_rows('repeater_galerias')) : 
    $counter = 1; 
?>
<div class="py-5">
    <div class="container mb-5">
        <div class="row mt-5" id="galeria">
            <div class="col-sm-12">
                <div class="flex-wrapper d-md-flex justify-content-between alig-items-center">
                    <div class="wrapper-only">
                        <h3 class="text-uppercase section-title"><span class="primary-title">Galería</span></h3>
                    </div>
                    <ul class="nav nav-tabs border-0 text-uppercase" id="galleryTab" role="tablist">
                    <?php while (have_rows('repeater_galerias')) : the_row();
                    // vars
                    $tipo_de_galeria = get_sub_field('tipo_de_galeria');
                    $destacado = get_sub_field('destacado');
                    $icono = get_sub_field('icono');
                    ?>
                        <li class="tab-item mr-2 mb-2 mx-md-2">
                            <a class="btn btn-sm btn-secondary" style="<?php echo $destacado ? 'background-color: tomato !important;' : ''; ?>" id="edificio-<?php echo $counter; ?>-tab" data-toggle="tab" href="#edificio-<?php echo $counter; ?>" role="tab" aria-controls="edificio-<?php echo $counter; ?>" aria-selected="true" >
                                <?php echo $icono ? $icono.' ' : ''; ?><?php echo $tipo_de_galeria;?>
                            </a>
                        </li>

                    <?php $counter++;
                    endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (have_rows('repeater_galerias')) : 
    $counter2 = 1; 
?>
<div class="tab-content" id="galleryTabContent">
    <?php while (have_rows('repeater_galerias')) : the_row(); 
    
    $tipo_de_modulo = get_sub_field('tipo_de_modulo');
    $url_360 = get_sub_field('url_360');
    //echo $tipo_de_modulo ;
    //print_r($tipo_de_modulo);
    if ($tipo_de_modulo === '360'):
    ?>
    <div class="tab-pane fade" id="edificio-<?php echo $counter2;?>" role="tabpanel" aria-labelledby="edificio-<?php echo $counter2;?>-tab" style="position:relative;">
        <iframe <?php echo (is_single(128)) ? 'scrolling="no" style="overflow:hidden;"' : '';?> width="100%" height="522"
                src="<?php echo $url_360; ?>" frameborder="0" allowfullscreen=""></iframe>
    </div>
    <?php else: ?>
        <?php if (have_rows('slider_galerias')) : ?>
            <div class="tab-pane fade" id="edificio-<?php echo $counter2;?>" role="tabpanel" aria-labelledby="edificio-<?php echo $counter2;?>-tab" style="position:relative;">
                <div class="owl-carousel owl-theme  gallery-caarousel">
                    <?php while (have_rows('slider_galerias')) : the_row();
                    // vars
                    $slider_galerias_desktop = get_sub_field('slider_galerias_desktop');
                    $etiqueta_imagen= get_sub_field('etiqueta_imagen');
                    ?>
                    <div class="item">
                        <a href="<?php echo esc_url($slider_galerias_desktop['url']); ?>" data-fancybox="edificio-<?php echo $counter2;?>">
                            <img src="<?php echo $slider_galerias_desktop['url'];?>" alt="<?php echo $slider_galerias_desktop['alt'];?>">
                        </a>
                        <p class=" m-0 pl-4"><b><?php echo $etiqueta_imagen;?></b></p>
                    </div>

                    <?php endwhile; ?>
                </div>
                <div class="gallery-overlay"></div>
            </div>
        <?php endif; ?>
    <?php endif; $counter2++; endwhile; ?>
    </div>
</div>
<?php endif; ?>

<?php if (have_rows('slider_master_plan')) : 
    $counter3 = 1;?>
<div class="pt-5">
    <div class="container-fluid">
        <div class="container">
            <div class="row" id="masterPlan">
                <div class="col-12">
                    <div class="flex-wrapper d-md-flex justify-content-between alig-items-center">
                        <div class="wrapper-only">
                            <h3 class="text-uppercase section-title">
                                <span class="primary-title">Master</span><br><span class="secondary-title">Plan</span>
                            </h3>
                        </div>
                        <ul class="nav nav-tabs border-0 text-uppercase" id="masterPlanTab" role="tablist">
                        <?php while (have_rows('slider_master_plan')) : the_row();
                        // vars
                        $slider_master_plan_titulo = get_sub_field('slider_master_plan_titulo');
                        ?>
                            <li class="tab-item mr-2 mb-2 mx-md-2">
                                <a class="btn btn-sm btn-secondary" id="plan-<?php echo $counter3; ?>-tab" data-toggle="tab" href="#plan-<?php echo $counter3; ?>" role="tab" aria-controls="plan-<?php echo $counter3; ?>" aria-selected="true"><?php echo $slider_master_plan_titulo;?></a>
                            </li>

                        <?php $counter3++; endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (have_rows('slider_master_plan')) : 
    $counter4 = 1;
    $counter5 = 1;
?>
<div class="container-fluid bg-medio-azul px-0 pt-3 pb-4 mb-5">
    <div class="container-md p-0 p-md-4 tab-content mt-2">
        <?php while (have_rows('slider_master_plan')) : the_row();
            // vars
            $slider_master_plan_desktop = get_sub_field('slider_master_plan_desktop');
            $slider_master_plan_detalle = get_sub_field('slider_master_plan_detalle');
            $slider_master_plan_titulo = get_sub_field('slider_master_plan_titulo');
            $items = get_sub_field('items');
        ?>
        <div class="tab-pane fade" id="plan-<?php echo $counter4;?>" role="tabpanel" aria-labelledby="plan-<?php echo $counter4;?>-tab" style="position:relative;">
            <div class="shadow bg-white p-md-5">
                <h5 class="ml-auto  p-2 py-md-4 color-primary text-uppercase font-weight-bold"><?php echo $slider_master_plan_titulo;?></h5>
                <a href="<?php echo esc_url($slider_master_plan_detalle['url']); ?>" data-fancybox="gallery">
                    <img src="<?php echo $slider_master_plan_desktop['url'];?>" alt="<?php echo $slider_master_plan_desktop['alt'];?>" class="w-100">
                </a>
                <?php if ($items): ?>
                <ul class="d-none d-md-flex flex-wrap flex-row justify-content-center mt-2">
                    <?php 
                    foreach( $items as $clave=>$valor ) {
                        echo '<li class="align-items-center my-1" style="display: flex; 
                        flex-basis: calc(20% - 14px);"><span class="mp-list-number mr-3 p-2 bg-primary-color text-white" style="display:table;">';
                        echo ($clave + 1).'</span> '.$valor['item_title'];
                        echo '</li>';
                    }
                    ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
        <?php $counter4++; endwhile; ?>
    </div>
    <div class="container">
        <ul class="nav nav-tabs border-0 text-uppercase planB-tab" id="masterPlanTab2" role="tablist">
        <?php while (have_rows('slider_master_plan')) : the_row();?>
            <li class="tab-item mx-md-2">
                <a class="p-2 planB-tab-item" id="planB-<?php echo $counter5; ?>-tab" data-toggle="tab" href="#plan-<?php echo $counter5; ?>" role="tab" aria-controls="plan-<?php echo $counter5; ?>" aria-selected="true">
                <?php echo $counter5 === 1 ? '<span aria-label="Next">‹</span>': '<span aria-label="Next">›</span>';?>
                </a>
            </li>

        <?php $counter5++; endwhile; ?>
        </ul>
        
    </div>
</div>
<?php endif; ?>


<?php if ( ($descripcion_de_entorno and $gmaps) || ($descripcion_de_entorno and $mapa_de_ubicacion) ) : ?>
<section class="container-fluid bg-white">
    <div class="row align-items-stretch shadow" id="ubicacion">
        <div class="col-lg-4 offset-xl-2 py-5 d-md-flex align-items-center">
            <div class="mt-xl-5 max-w-480">
                <div class="wrapper-only">
                    <h3 class="text-uppercase section-title"><span class="primary-title">Ubicación</span><br><span
                            class="secondary-title">Y Entorno</span></h3>
                </div>
                <div class="pr-5">
                    <?php echo $descripcion_de_entorno; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-6" class="map-column">
            <?php if ($mapa_de_ubicacion) : ?>
            <div class="mapImg mapItem mapActive">
                <picture>
                    <source media="(max-width: 768px)"
                        srcset="<?php echo $mapa_de_ubicacion_mobile ? $mapa_de_ubicacion_mobile['url'] : $mapa_de_ubicacion['url'];?>">
                    <img class="w-100" src="<?php echo $mapa_de_ubicacion['url'];?>" alt="Mapa" class="w-100">
                </picture>
            </div>
            <?php endif; ?>
            <?php if ($gmaps) : ?>
            <div class="projectMap mapItem <?php echo $mapa_de_ubicacion ? '' : 'mapActive';?>">
                <iframe class="w-100"
                    src="<?php echo $gmaps;?>"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" heitht="660"></iframe>
            </div>
            <?php endif; ?>
            <?php if ($waze) : ?>
            <div class="btns-map">
                <?php if(wp_is_mobile()): ?>
                <a href="<?php echo $waze;?>" class="btn btn-secondary mr-3" target="_blank">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/waze.png" alt="Waze" class="mr-3" style="max-height:18px"> 
                    waze
                </a>
                <?php endif; ?>
                <a href="#" class="btn btn-secondary ml-4 changeMapButton"><img
                        src="<?php bloginfo('template_directory');?>/assets/img/gmaps.png" alt="google maps"
                        class="mr-3" style="max-height:20px"><span class="changeMapButtonSpan">maps</span></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif;?>
<?php if ($planok) : ?>
<div class="modal fade" id="planok-modal" tabindex="-1" role="dialog" aria-labelledby="planok-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <div class="row align-items-stretch">
                    <iframe style="width:100%;height:660px" src="<?php echo $planok; ?>" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php if ($video) : ?>
<div class="modal fade" id="homeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <!-- <button type="button" class="btn btn-default pausevideo" data-dismiss="modal" >Cerrar X</button> -->
        <div class="embed-responsive embed-responsive-16by9 " id="content-video">
            <iframe class="embed-responsive-item content-video" src="" id="video"  allowscriptaccess="always" allow="autoplay" style="background: #E5EFF1"></iframe>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php
bk_main_after();
get_template_part('includes/footer');
?>