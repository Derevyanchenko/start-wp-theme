<!--header-->

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php echo wp_get_document_title(); ?></title>
    <!-- <link rel="stylesheet" href="css/main.css">-->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<!--header-->



<?php the_custom_logo(); ?>

<?php wp_nav_menu(array(
    "theme_location" => "main_menu",
    "container" => false,
)); ?>

