<?php $this->layout = 'default';?>
<?php
echo $this->Html->script('tiny_mce/tinymce.js');
echo $this->Html->script('jquery-1.9.1.js');
echo $this->Html->script('jquery-ui.js');
echo $this->Html->css('jquery-ui.css');
//$this->TinyMCE->editor(array('theme' => 'advanced', 'mode' => 'textareas'));

?>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea"
    });
</script>
<div class="umtop">
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Pages'); ?></span>

                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>

<div id = "add_dog">
<div id="dogForm">
<?php echo $this->Form->create('PageContent');?>

    <p> <?php //echo $this->Html->link(__("Home",true),"/pagecontents/edit/1"); ?> </p>
    <p> <?php echo $this->Html->link(__("Services",true),"/pagecontents/edit/2"); ?> - The 'Services' tab at the top of the screen.</p>
    <p> <?php echo $this->Html->link(__("About Us",true),"/pagecontents/edit/4"); ?> - The 'About Us' tab at the top of the screen.</p>
    <p> <?php echo $this->Html->link(__("Contact",true),"/pagecontents/edit/5"); ?>  - This is the contact information at the bottom of the screen.</p>
    <p> <?php echo $this->Html->link(__("Gallery",true),"/photos/viewall"); ?> </p>
</div></div></div></div></div></div>
