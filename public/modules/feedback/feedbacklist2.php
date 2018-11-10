<?php
session_start();

require_once '../../includes/autoload.php';


use classes\entity\Feedback;
use classes\business\FeedbackManager;
use classes\util\DBUtil;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>
<form action="feedbacklist2.php" method="post">
<!--  label>Search the user either by Email or FirstName or LastName </label><br> -->
<br><br>
Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="searchemail" placeholder="Search by email" ><br><br>
FirstName:<input type="text" name="searchfirstname" placeholder="Search by Firstname" ><br><br>
LastName:<input type="text" name="searchlastname" placeholder="Search by Lastname" >&nbsp;&nbsp;&nbsp;

<input type="submit" name="search" value="Search" >&nbsp;&nbsp;&nbsp;
<input type="reset" value="Clear Search" style="float: " ><br />
</form>

<?php 
if(isset($_POST["search"])){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/>Search Feedback Results <br/><br/>
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
    $FM=new FeedbackManager();
    if(isset($_POST['searchemail']) && !empty($_POST['searchemail'])) {
        echo 'Email is: '. $_POST['searchemail'];
        $results = $FM->searchByOption($_POST["searchemail"]);
    }
    else if(isset($_POST['searchfirstname']) && !empty($_POST['searchfirstname'])) {
        echo 'FirstName is: '. $_POST['searchfirstname'];
        $results = $FM->searchByOption($_POST["searchfirstname"]);
    }
    else if(isset($_POST['searchlastname']) && !empty($_POST['searchlastname'])) {
        echo 'LastName is: '. $_POST['searchlastname'];
        $results = $FM->searchByOption($_POST["searchlastname"]);
    }
    else if (empty($_POST['searchemail']) 
        && empty($_POST['searchfirstname']) 
        && empty($_POST['searchlastname']))
    {
        ?><B><font color = "Red">Use anyone of the search option</font></B>
        
        <?php
        
    }
    foreach ($results as $result) {
        if($result!=NULL){
            ?>
            <tr>
   
				<!--  <td><input type="checkbox" name="check"></td>  -->          
               <td><?=$result->id?></td>
               <td><?=$result->firstName?></td>
               <td><?=$result->lastName?></td>
               <td><?=$result->email?></td>
			   
            </tr>
            <?php 
        }
    }
}
    ?> 
    
    </table><br/><br/>

<br><br>
	
<?php
$FM=new FeedbackManager();
$feedbacks=$FM->getAllFeedback();

 if(isset($feedbacks)){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/>Below is the list of Feedbacks in community portal <br/><br/>
    <form action="" method="post">
    
    <table class="pure-table pure-table-bordered" width="800">
            <tr>
			<thead>
		       <th><b>Option</b></th>	
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
			   <th><b>Comments</b></th>
			   </thead>
            </tr> 
            <?php 
    foreach ($feedbacks as $feedback) {
        if($feedback!=null){
            ?>
            <tr>
            	<td><input type="checkbox" name="num[]" value="<?= $feedback->id?>" /></td>
               <td><?=$feedback->id?></td>
               <td><?=$feedback->firstName?></td>
               <td><?=$feedback->lastName?></td>
               <td><?=$feedback->email?></td>
               <td><?=$feedback->comments?></td>
			</tr>
            <?php 
        }
    }
    ?>   
    
    </table><br/><br/>
    
       <input type="submit" name="delete" value="Delete">
     </form>
<?php  
 if(isset($_POST["delete"]))
 {
     $noOfCheckbox = count($_POST['num']); // it counts the number of checkbox checked
     $i=0;
     while($i < $noOfCheckbox)
     {
         $keyToDelete = $_POST['num'][$i];
         
         $conn=DBUtil::getConnection();
         $sql="DELETE from tb_feedback WHERE id='$keyToDelete';";
         $stmt = $conn->prepare($sql);
         if ($conn->query($sql) === TRUE) {
             echo "<script>alert(Record deleted successfully)</script>";
         } else {
             echo "Error updating record: " . $conn->error;
         }
         $i ++;
                 
     }
     $conn->close();
     // refresh the page 
     header('Location:feedbacklist2.php');
 }
}
    
?> 
    

<?php
include '../../includes/footer.php';
?>

