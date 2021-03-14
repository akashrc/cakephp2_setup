<?php
echo $this->Form->create('Detail');
?>
<div class='heading'>
    <h2>Listing Page</h2>
</div>
<?php echo $this->element('filter');?>
<div class="wrapper-listing">
<table border="1">
<thead>
<tr>
    <th>ID</th>
    <th>FIRST NAME</th>
    <th>LAST NAME</th>
    <th>EMAIL</th>
    <th>PASSWORD</th>
    <th>GENDER</th>
    <th>CITY</th>
    <th>COUNTRY</th>
    <th>STATUS</th>
    <th>AGREEMENT</th>
    <th>EDIT DETAIL</th>
</tr>
</thead>
<tbody>
<?php foreach($user_data as $row) { ?>
<tr>
    <td><?php echo $row['Detail']['id']; ?></td>
    <td><?php echo $row['Detail']['first_name']; ?></td>
    <td><?php echo $row['Detail']['last_name']; ?></td>
    <td><?php echo $row['Detail']['email']; ?></td>
    <td><?php echo $row['Detail']['password']; ?></td>
    <td><?php echo $row['Detail']['gender']; ?></td>
    <td><?php echo $row['Detail']['city']; ?></td>
    <td><?php echo $row['Detail']['country']; ?></td>
    <td><?php echo $row['Detail']['status']; ?></td>
    <td><?php echo $row['Detail']['agreement']; ?></td>
    <td>
            
            <a href='http://localhost/cakephp/details/registration?id=<?php echo $row['Detail']['id']?>'><input type="button" value="Edit"></a>

    </td>
</tr>
<?php } ?>

</tbody>
</table>

</div>