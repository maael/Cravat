<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("includes\\header");?>
    <p><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
<?php require $this->checkTemplate("includes\\footer");?>