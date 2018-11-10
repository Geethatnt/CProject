<?php
if (isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * from tb_feedback where firstname ='$valueToSearch' ";
    $search_result = filterTable($query);
}
else 
{
    $query = "SELECT * from tb_feedback";
    $search_result = filterTable($query);     
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost","root","test123","phpcrudsample");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<html>
<head>
<title>
PHP HTML Table data search </title>
</head>
<body>
<form action="list.php" method="post">
<input type="text" name ="valueToSearch" placeholder="value to search" >&nbsp; &nbsp;
<input type="submit" name ="search" value="Filter" ><br><br>
<table>
<tr>
			<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
			   <th><b>Comments</b></th>
			   </thead>
            </tr> 
            <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['firstname'];?></td>
            <td><?php echo $row['lastname'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['comments'];?></td>
            </tr>
            <?php endwhile;?>
</table>

</form>

</body>
</html>