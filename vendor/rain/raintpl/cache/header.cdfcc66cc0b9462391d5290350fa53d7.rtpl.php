<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon"> 
    <title><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    <?php $counter1=-1;  if( isset($styles) && ( is_array($styles) || $styles instanceof Traversable ) && sizeof($styles) ) foreach( $styles as $key1 => $value1 ){ $counter1++; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <?php } ?>
    <?php $counter1=-1;  if( isset($scripts) && ( is_array($scripts) || $scripts instanceof Traversable ) && sizeof($scripts) ) foreach( $scripts as $key1 => $value1 ){ $counter1++; ?>
    <script type="text/javascript" src="<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></script>
    <?php } ?>
</head>
<body>