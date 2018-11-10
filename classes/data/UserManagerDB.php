<?php
namespace classes\data;

use classes\entity\User;
use classes\util\DBUtil;

class UserManagerDB
{

    /*
     *
     */
    public static function fillUser($row)
    {
        /**
         *
         * @var \classes\entity\User $user
         */
        $user = new User();
        $user->id = $row["id"];
        $user->firstName = $row["firstname"];
        $user->lastName = $row["lastname"];
        $user->email = $row["email"];
        $user->password = $row["password"];
        $user->role = $row["role"]; // added for role 05092018
        $user->account_creation_time = $row["account_creation_time"];
        $user->subscribe = $row["is_subscribed"];
        return $user;
    }

    public static function getUserByEmailPassword($email, $password)
    {
        /**
         *
         * @var unknown $user
         */
        $user = NULL;
        $conn = DBUtil::getConnection();
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $sql = "select * from tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     * 
     * @param unknown $email
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmail($email)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     * 
     */
    public static function getUserById($id)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "select * from tb_user where id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     * 
     * @param User $user
     */
    public static function saveUser(User $user)
    {
        $conn = DBUtil::getConnection();
        $sql = "call procSaveUser(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssss", $user->id, $user->firstName, $user->lastName, $user->email, $user->password, $user->account_creation_time, $user->role, $user->is_subscribed);
        $stmt->execute();
        if ($stmt->errno != 0) {
            printf("Error: %s.\n", $stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    /**
     * 
     * @param unknown $email
     * @param unknown $password
     */

    public static function updatePassword($email, $password)
    {
        $conn = DBUtil::getConnection();
        $sql = "UPDATE tb_user SET password='$password' WHERE email='$email';";
        $stmt = $conn->prepare($sql);
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    
    public static function updateSubscription($email){
        $conn = DBUtil::getConnection();
        
        $sql  = "UPDATE tb_user SET is_subscribed='0' WHERE email='$email';";
        if ($conn->query($sql)) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
        
    }

    /**
     * 
     * @param unknown $id
     */
    public static function deleteAccount($id)
    {
        $conn = DBUtil::getConnection();
        $sql = "DELETE from tb_user WHERE id='$id';";
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
     * @return \classes\entity\User[]
     */

    public static function getAllUsers()
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }
    /**
     * 
     */

    // Function written to search the feedback either by email or firstname or lastname 18092018
    public static function searchByOption($input)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        // SELECT * FROM `tb_user` WHERE email LIKE 'geethatnt@gmail.com' or firstname LIKE 'Geetha' or lastname LIKE 'Nalla';
        $sql = "select * from tb_user where email LIKE '%$input%' or firstname LIKE '%$input%' or lastname LIKE '%$input%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }
}
?>