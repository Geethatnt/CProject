<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM = new UserManager();
$users = $UM->getAllUsers();

if (isset($users)){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
	 
    <br/><br/>Below is the list of Developers registered in community portal <br/><br/>
    <table class="pure-table pure-table-bordered" width="800">
            <tr>
			<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
			   <th><b>Operation</b></th>
			   </thead>
            </tr>    
    <?php 
    foreach ($users as $user) {
        if ($user!=NULL){
            ?>
            <tr>
               <td><?=$user->id?></td>
               <td><?=$user->firstName?></td>
               <td><?=$user->lastName?></td>
               <td><?=$user->email?></td>
			   <td>
			   <?php
			   if ($user->role=="user"){
			   ?>
					<a href='deleteuser.php?id=<?php echo $user->id ?>'>Delete</a>&nbsp;&nbsp;
					<a href='edituser.php?id=<?php echo $user->id ?>'>Edit</a>
				<?php 
			         }
			     ?>	
			   </td>
            </tr>
            <?php 
        }
    }
        
    ?>
    
    </table><br/><br/>
    
    <?php 
}
?>

	<form action="userlist1.php" method="post">
	<label>Search the user either by Email or FirstName or LastName </label><br><br>
    Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="searchemail" placeholder="Search by email" ><br><br>
FirstName:<input type="text" name="searchfirstname" placeholder="Search by Firstname" ><br><br>
LastName:<input type="text" name="searchlastname" placeholder="Search by Lastname" >&nbsp;&nbsp;&nbsp;
   
    <input type="submit" name="search" value="Search" >
	</form>
	<?php 
	if (isset($_POST["search"])){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/>Search Results <br/><br/>
    <table class="pure-table pure-table-bordered" width="800">
            <tr>
			<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
			   </thead>
            </tr>    
    <?php
    $UM=new UserManager();
    if (isset($_POST['searchemail']) 
        && !empty($_POST['searchemail'])) 
    {
        echo 'Email is: '. $_POST['searchemail'];
        $results = $UM->searchByOption($_POST["searchemail"]);
    }
    else if (isset($_POST['searchfirstname']) 
        && !empty($_POST['searchfirstname'])) 
    {
        echo 'FirstName is: '. $_POST['searchfirstname'];
        $results = $UM->searchByOption($_POST["searchfirstname"]);
    }
    else if (isset($_POST['searchlastname']) 
        && !empty($_POST['searchlastname'])) 
    {
        echo 'LastName is: '. $_POST['searchlastname'];
        $results = $UM->searchByOption($_POST["searchlastname"]);
    }
    else if (empty($_POST['searchemail']) 
        && empty($_POST['searchfirstname']) 
        && empty($_POST['searchlastname']))
    {
         ?><B><font color = "Red">Use anyone of the search option</font></B>
        
        <?php
    }
    
    
    foreach ($results as $result) 
    {
        if ($result!=NULL)
        {
            ?>
            <tr>
               <td><?=$result->id?></td>
               <td><?=$result->firstName?></td>
               <td><?=$result->lastName?></td>
               <td><?=$result->email?></td>
			   
            </tr>
            <?php 
        }
    }
        
    ?> 
   
    </table><br/><br/>
    </body>
 <?php 
}
	
?>
 
    
<?php
include '../../includes/footer.php';
?>