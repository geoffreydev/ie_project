<?php echo $this->Html->docType('xhtml-trans'); ?>

<html lang="en">
<head>

<title>Canine Clip Joint</title>
<?php
    echo $this->Html->charset('utf-8');
?>
    <?php    echo $this->Html->meta('icon', $this->Html->url('/img/images/favicon.png'));  ?>

    <?php echo $this->Html->css(array('style.small.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1px) and (max-width: 851px)'));?>
    <?php echo $this->Html->css(array('style.medium.css'), 'stylesheet', array('media' => 'only screen and (min-width: 852px) and (max-width: 1260px)'));?>
    <?php echo $this->Html->css(array('style.square.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1261px) and (max-width: 1290px)'));?>
    <?php echo $this->Html->css(array('style.medium.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1291px) and (max-width: 1500px)'));?>
    <?php echo $this->Html->css(array('style.large.css'), 'stylesheet', array('media' => 'only screen and (min-width: 1501px) and (max-width: 4000px)'));?>
    <?php echo $this->Html->css('font'); ?>
<?php  echo $this->Html->css('/usermgmt/css/umstyle');?>



</head>

<body>
<div id="wrap">
<div id="container">
 	<div id="header">
	<div class="header_resize">
    <div class="menu_nav">
        <ul>
            <li ><?php echo $this->Html->link('Home', '/');?></li>
            <li ><?php echo $this->Html->link('Services', '/pages/services'); ?></li>
            <li ><?php echo $this->Html->link('Gallery', '/pages/gallery'); ?></li>
            <li ><?php echo $this->Html->link('About', '/pages/aboutus'); ?></li>
            <?php
                if ($this->Session->read('UserAuth.User.user_group_id') == 1) {
            ?>
			<li ><?php echo $this->Html->link('Staff View', array('controller'=>'admins', 'action'=>'index'));?></li>
            <?php
                } else {
            ?>
                    <li ><?php echo $this->Html->link('My Account', '/accounts');?></li>
            <?php
                }
            ?>
        </ul>
    </div>
	
	<div align="left">
	<span>&nbsp; &nbsp;<?php
		if($this->UserAuth->getUserId() == NULL)
		{
		    echo $this->Html->link('Register', array('plugin' => null, 'controller' => '', 'action' => 'register'));
		?>&nbsp;
		<?php
		echo $this->Html->link('Log In', array('plugin' => null, 'controller' => '', 'action' => 'login'));
		}
		else
        {
            echo "Welcome ".$this->Session->read('UserAuth.User.username').'&nbsp;';
			echo $this->Html->link(__("Log Out",true),"/logout");
        }
        ?></span></p>
    <div class="logo"><h1><a href="."><span><?php echo $this->Html->image('images/logo5.png', array('width'=>"41", 'height'=>"44"));?>Canine Clip Joint</span> <small>Professional Dog Grooming</small></a></h1></div>
    
    <div class="clr"></div>

		</div>
	</div>
</div>
  

 
	<div id="contentwrap">
		<div id="mycontent">
            <br>
            <h3 style="text-align:center; color:white;"><?php echo $this->Session->flash(); ?></h3>
		<?php echo $this->fetch('content'); ?>
    	</div> <!-- end div#mycontent -->
	</div> <!-- end div#contentwrap -->


	 
</div>
</div>
	<div id="footer">
	 <div id="footer_resize">
      <p class="lf">&copy; Copyright Canine Clip Joint
	  <div id="social_box">
	  <ul>
			<li><?php echo $this->Html->image('images/facebook.png', array('url' => "http://www.facebook.com/groups/116065381778934/")); ?></li>
     </ul>
	
     </div>
    </div>
</div>
	 <!-- end div#footer -->
 
<?php //echo $this->element('sql_dump');?>

</body>
</html>
