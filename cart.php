<?php
    include 'inc.form.php';
?>
<table border="1">
    <tr>
        <td> Movie Title </td>
        <td> Actor </td>
        <td> Genre </td>
        <td> Year Release </td>
    </tr>
    <?php while($row=mysql_fetch_array($result)){ ?>
        <tr>
            <td> <?php echo $row['movie_title'] ?> </td>
            <td> <?php echo $row['firstName'] . $row['lastName'] ?> </td>
            <td> <?php echo $row['movie_category'] ?> </td>
            <td> <?php echo $row['year_release'] ?> </td>
        </tr>
    <?php}?>
</table>
<?php}?> 