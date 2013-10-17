<?php echo $this->Html->docType('html5');
?>
<html lang="en">
<head>


<title>Canine Clip Joint</title>
<?php
echo $this->Html->charset('utf-8'); 
echo $this->Html->css('/usermgmt/css/umstyle');
echo $this->Html->script('html5.js'); 	
echo $this->Html->css('reset.css',null,array('media' => 'screen'));
echo $this->Html->css('grid_12.css',null,array('media' => 'screen'));
echo $this->Html->css('style3.css',null,array('media' => 'screen'));
echo $this->Html->css('nivo-slider.css',null,array('media' => 'screen'));
echo $this->Html->css('nivodefault.css',null,array('media' => 'screen'));

echo $this->Html->css('lightbox.css',null,array('media' => 'screen'));
echo $this->Html->script('jquery-1.7.min.js');
echo $this->Html->script('jquery.easing.1.3.js');
echo $this->Html->script('tms-0.4.1.js');

echo $this->Js->writeBuffer(array('cache'=>true));?>


 <script>
		$(document).ready(function(){				   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:'.prev',
				nextBu:'.next',
				playBu:false,
				duration:10000,
				preset:'zoomer',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:false,
				banners:'fade',
				waitBannerAnimation:false,
				progressBar:false
			})		
		});
	</script>
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>

<body>


<header>
    	<div class="main">
        	<h1><a href="index.html"><?php echo $this->Html->image('images/logo1.png', array('alt' => 'Banner Image'));?></a></h1>
        
            <div class="clear"></div>
        </div>
    </header>  
    <nav>  
        <ul class="menu">
            <?php $currentTab = $this->params['controller'].'/'.$this->params['action']; ?>
            <?php
                if ($this->Session->read('UserAuth.User.user_group_id') != 4) {
            ?>

		<li <?php if ($currentTab == 'pages/display'){ echo 'class="current"'; };?>>
			<?php echo $this->Html->link('Home', '/');?></li>
		
		<li <?php if ($currentTab == 'services/index'){ echo 'class="current"'; };?>>
			<?php echo $this->Html->link('Services', '/pages/services'); ?></li>
			
	
		<li <?php if ($currentTab == 'photos/index'){ echo 'class="current"'; };?>>
		<?php echo $this->Html->link('Gallery', '/photos'); ?></li> 

		<li <?php if ($currentTab == 'abouts/index'){ echo 'class="current"'; };?>>
		<?php echo $this->Html->link('About Us', '/pages/aboutus'); ?></li>
		
		<li <?php if ($currentTab == 'contacts/index'){ echo 'class="current"'; };?>>
            <?php
              }
            ?>

			<?php
                if ($this->Session->read('UserAuth.User.user_group_id') == 1 || $this->Session->read('UserAuth.User.user_group_id') == 4) {
            ?>
			<li <?php if ($currentTab == 'admins/index'){ echo 'class="current"'; };?>>
			<?php
            if($this->Session->read('UserAuth.User.user_group_id') != 4){
                echo $this->Html->link('Staff View', array('controller'=>'admins', 'action'=>'index'));
            }
            ?></li>
			<li ><?php echo $this->Html->link('Log out', '/logout');?></li>

            <?php
                } else if($this->Session->read('UserAuth.User.user_group_id') == 2){
            ?>

				<li <?php if ($currentTab == 'accounts/index'){ echo 'class="current"'; };?>>
					<?php echo $this->Html->link('My Account', '/accounts');?></li>
					<li ><?php echo $this->Html->link('Log out', '/logout');?></li>

            <?php
                }else {
            ?>
					<li <?php if ($currentTab == 'users/register'){ echo 'class="current"'; };?>>

                    <?php echo $this->Html->link('Register', '/register');?></li>
					<li <?php if ($currentTab == 'users/login'){ echo 'class="current"'; };?>>

					<?php echo $this->Html->link('Log In', '/login');?></li>
            <?php
                }
            ?>
			
        </ul>
        <div class="clear"></div>
     </nav>
  

 
<section id="contentwrap">
		<div id="mycontent">
            <h3 style="text-align:center; color:black;"><?php echo $this->Session->flash(); ?></h3>
		<?php echo $this->fetch('content'); ?>
    	</div> <!-- end div#mycontent -->
    </section>


	 

 <footer>
   	  <div class="footer-col-1">
        	<h3>Member</h3>
            <ul class="list-1">
            	<li>
				<?php if($this->UserAuth->getUserId() == NULL)
		{
		    echo $this->Html->link('Register', array('plugin' => null, 'controller' => '', 'action' => 'register'));
		?>&nbsp;
		<?php
		echo $this->Html->link('Log-In', array('plugin' => null, 'controller' => '', 'action' => 'login'));
		}
		else
        {
            ?><p style="color:#ef6f53"> <?php echo "Welcome ".$this->Session->read('UserAuth.User.username').'&nbsp;';?></p>
			<?php
            echo $this->Html->link(__("Log Out",true),"/logout");
            ?><p style="color:#ef6f53"> <?php
            echo $this->Html->link(__("Change Password",true),"/changePassword");
        }
        ?></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="footer-col-2">
        	<h3>Contact</h3>
            <dl class="adrss">
                <?php
                echo $contactcontent['PageContent']['content'];
                ?>
            </dl> 
        </div>  
        <div class="footer-col-3">
        	<h3>Follow Us</h3>
        	<div class="social-icons">
                <div>
                    <a href="https://www.facebook.com/groups/116065381778934/" class="icon-2"></a>
                </div>
            </div>
        </div>  
        <div class="footer-col-4">
        	<p>@ Canine Clip Joint<br>
        </div>  
  </footer>	       

     

 
<?php //echo $this->element('sql_dump');?>

</body>
</html>
