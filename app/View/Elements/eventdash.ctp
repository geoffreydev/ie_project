<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div id="dashboard">

    <div style="float:left;padding-left:10px"><?php echo $this->Html->link('All Bookings', array("controller"=>"events","action"=>"viewall", 0),array('class' => 'buttoned')) ?></div>
    <div style="float:left;padding-left:10px"><?php echo $this->Html->link('Pending Bookings', array("controller"=>"events","action"=>"viewall", 1),array('class' => 'buttoned')) ?></div>
    <div style="float:left;padding-left:10px"><?php echo $this->Html->link('Confirmed Bookings', array("controller"=>"events","action"=>"viewall", 2),array('class' => 'buttoned')) ?></div>
    <div style="float:left;padding-left:10px"><?php echo $this->Html->link('Cancelled Bookings', array("controller"=>"events","action"=>"viewall", 3),array('class' => 'buttoned')) ?></div>
    <div style="float:left;padding-left:10px"><?php echo $this->Html->link('Completed Bookings', array("controller"=>"events","action"=>"viewall", 4),array('class' => 'buttoned')) ?></div>
    <div style="clear:both"></div>
</div>