<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("includes\\header");?>
    <p><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
    <a href='<?php echo APP_BASE; ?>/admin'>test</a>
<?php require $this->checkTemplate("includes\\footer");?>