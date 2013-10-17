<?php $this->layout = 'default';?>
<?php
echo $this->Html->script('tiny_mce/tinymce.js');
echo $this->Html->script('jquery-1.9.1.js');
echo $this->Html->script('jquery-ui.js');
echo $this->Html->css('jquery-ui.css');

?>
<?php /*
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",


    });
</script>
 */ ?>

<script type="text/javascript">
   <?php //tinymce.PluginManager.load('moxiemanager', '/js/moxiemanager/plugin.min.js');?>

    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste <?php //moxiemanager?>"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        autosave_ask_before_unload: false,
        max_height: 600,
        min_height: 300,
        width: 800,
        height : 400
    });
</script>
<div class="umtop">
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Edit '.$this->data['PageContent']['page'].' Page'); ?></span>
                <span class="umstyle2" style="float:right"><?php
                        echo $this->Html->link(__("Back to page list",true),"/pagecontents/");
                    ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>

<div id = "add_dog">
<div id="dogForm">
<?php echo $this->Form->create('PageContent');?>

<table id="greytable" width="50%" >

<?php echo $this->Form->input('page',array('type'=>'hidden','style'=>'width:60px','label' => '', 'maxlength' => '20')); ?>

<tr>
<td>
<?php
    echo $this->Form->input('content',array('type'=>'textarea','style'=>'width:960px; height:800px;','label' => '', 'maxlength' => '1000'));
    /*echo $this->Tinymce->input('PageContent.content', array(
        'label' => 'Content'
    ),array(
        'language'=>'en'
    ),
    'full'
); */
?>
</td>
</tr>
<td>
	<?php echo $this->Form->end('Save'); ?>
</td>
</table>
</div></div></div></div></div></div>
