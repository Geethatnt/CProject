<?php
namespace classes\business;

use classes\entity\Feedback;
use classes\data\FeedbackManagerDB;

class FeedbackManager
{
    /**
     * 
     * @return \classes\entity\Feedback[]
     */
    public static function getAllFeedback(){
        return FeedbackManagerDB::getAllFeedback();
    }
    /**
     * 
     * @param unknown $input
     * @return \classes\entity\Feedback[]
     */
    public static function searchByOption($input){
        return FeedbackManagerDB::searchByOption($input);
    }
    /**
     * 
     * @param unknown $email
     * @return NULL|\classes\entity\Feedback
     */
    public function getFeedbackByEmail($email){
        return FeedbackManagerDB::getFeedbackByEmail($email);
    }
    /**
     * 
     * @param unknown $id
     * @return unknown
     */
    public function deleteFeedback($id){
        return FeedbackManagerDB::deleteFeedback($id);
    }	
    /**
     * 
     * @param Feedback $feedback
     */
    public function insertFeedback(Feedback $feedback){
        FeedbackManagerDB::insertFeedback($feedback);
    }
    /**
     * 
     * @param unknown $firstname
     * @return unknown
     */
    
    public function searchFeedback($firstname){
        return FeedbackManagerDB::searchFeedback($firstname);
    }
    /**
     * 
     */
	
	public function deleteAccount($id){
        FeedbackManagerDB::deleteAccount($id);
    }

}

?>