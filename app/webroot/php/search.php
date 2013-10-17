<html>
<head>

<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />  
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
  <?php 
  include ('connect.php');
  $sql="SELECT * FROM events";
  $result=mysql_query($sql) or die(mysql_error());
  $sql1="SELECT * FROM dogs";
  $result1=mysql_query($sql1) or die(mysql_error());
  ?>
<script>
$(document).ready(function() {
$("input#autocomplete").autocomplete({
source:[
<?php while ($row = mysql_fetch_array($result)) 
  { 
  echo '"'; 
  echo $row['name'];
  echo '",'; 
  }
?>
<?php while ($row1 = mysql_fetch_array($result1)) 
  { 
  echo '"'; 
  echo $row1['event_theme'];
  echo '",'; 
  }
?>
"User Last Name","Bookings Name"]
});
});
</script>
</head>
<body>
<form class="searchform" method="get" action="/CakePHP/usermgmt/users/search/">
<input id="autocomplete" class="searchfield"  name="search" autocomplete="on"  placeholder="Type Cus/Booking/Dog name to Search..." />
<input class="searchbutton" type="submit" value="Go" />
</form>
</body>
</html>