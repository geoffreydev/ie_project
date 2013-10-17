<?php $this->layout = 'default';?>
<?php
echo $this->Html->script('tiny_mce/tinymce.js');
echo $this->Html->script('jquery-1.9.1.js');
echo $this->Html->script('jquery-ui.js');
echo $this->Html->css('jquery-ui.css');
?>

<form enctype="multipart/form-data" action="/php/saveupload.php" method="post">
    <table id="submit" summary="Add new dvd submission table">
        <tr><td>Choose Image:</td><td><input class="submit" type=file name=file></td></tr>
        <tr><td>Image Caption:</td><td><input class="submit"type="text" name="caption" id="caption" /> (Optional)</td></tr>
        <tr><td>Upload Destination:
                <select name="destination">
                    <option value="0">Gallery</option>
                    <option value="1">Home Page</option>
                </select>
            </td></tr>
    </table>
    <input type="hidden" name="add" value="set">
    <button>Upload Image</button>

    <hr>

    <table cellspacing="0" cellpadding="10" width="100%" border="0" >
        <thead>
        <tr >
            <th style="text-align: left;"><?php echo __('Filename');?></th>
            <th style="text-align: left;"><?php echo __('Caption');?></th>
            <th style="text-align: left;"><?php echo __('Actions');?></th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (!empty($images)) {
            foreach ($images as $row) {
        ?>
        <tr><?php

            echo "<td><a href='".$this->Html->url('/img/uploads/'.$row['Photo']['filename'])."'>".h($row['Photo']['first_name'])." ".h($row['User']['last_name'])."</td>";
            echo "<td>".h($row['User']['username'])."</td>";
            if ((h($row['User']['mobile_phone'])) != null) {
                echo "<td>".h($row['User']['mobile_phone'])."</td>";
            } else if ((h($row['User']['landline_phone'])) != null) {
                echo "<td>".h($row['User']['landline_phone'])."</td>";
            } else {
                echo "<td>".h($row['User']['work_phone'])."</td>";
            }
            echo "<td>";

            echo "</td>";
            echo "</tr>";

            }
            } else {
                echo "<tr><td colspan=10><br/><br/>No Images Found!</td></tr>";
            }
            ?>
        </tbody>
    </table>

</form>