<?php
namespace classes\data;

use classes\entity\Feedback;
use classes\util\DBUtil;

class FeedbackManagerDB
{
    /**
     * 
     * @param unknown $row
     * @return \classes\entity\Feedback
     */
    public static function fillFeedback($row){
        $feedback=new Feedback();
        $feedback->id=$row["id"];
        $feedback->firstName=$row["firstname"];
        $feedback->lastName=$row["lastname"];
        $feedback->email=$row["email"];
        $feedback->comments=$row["comments"];
        return $feedback;
    }
    /**
     * 
     * @param unknown $email
     * @return NULL|\classes\entity\Feedback
     */
    public static function getFeedbackByEmail($email){
        $feedback=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_feedback where email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $feedback=self::fillFeedback($row);
            }
        }
        $conn->close();
        return $feedback;
    }
	
    
    /**
     * 
     * @param unknown $id
     */
    public static function deleteFeedback($id){
        $conn=DBUtil::getConnection();
        $sql="DELETE from tb_feedback WHERE id='$id';";
        $stmt = $conn->prepare($sql);
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert(Record deleted successfully)</script>";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		$conn->close();

    }	
    /**
     * 
     */
    //Function written to search the feedback either by email or firstname or lastname 18092018
    public static function searchByOption($input){
        $feedbacks[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_feedback where email LIKE '%$input%' or firstname LIKE '%$input%' or lastname LIKE '%$input%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $feedback=self::fillFeedback($row);
                $feedbacks[]=$feedback;
            }
        }
        $conn->close();
        return $feedbacks;
        
    }	
    /**
     * 
     * @return \classes\entity\Feedback[]
     */
    
    public static function getAllFeedback(){
        $feedbacks[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_feedback";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $feedback=self::fillFeedback($row);
                $feedbacks[]=$feedback;
            }
        }
        $conn->close();
        return $feedbacks;
    }
        
	/**
	 * 
	 * @param Feedback $feedback
	 */
	public static function insertFeedback(Feedback $feedback){
        $conn=DBUtil::getConnection();
		$sql="INSERT INTO TB_FEEDBACK (firstname, lastname, email, comments) VALUES (?, ?, ?, ?)"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $feedback->firstname, $feedback->lastname, $feedback->email,$feedback->comments); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("SQL Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();		
		
	}
}

?>