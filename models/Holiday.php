<?php
class Holiday{
public static function setHolidays($userId,$fromDate,$toDate){
        
        $db = DB::getConnection();
        $sql='INSERT INTO holidays (userId,fromDate,toDate) VALUES (:userId,:fromDate,:toDate)';

        $result=$db->prepare($sql);
        $result->bindParam(':userId',$userId,PDO::PARAM_INT);

        $result->bindParam(':fromDate',$fromDate);
        $result->bindParam(':toDate',$toDate);
        
        $result->execute(); 
        $result->fetch();
        
        if($result)
            return $result;
        return $result;
    }
    
    public static function updateHolidays($userId,$fromDate,$toDate){
        
        $db = DB::getConnection();
        $sql="UPDATE holidays SET fromDate=:fromDate, toDate=:toDate WHERE userId = :userId AND status='0'";
        
        $result=$db->prepare($sql);
        $result->bindParam(':userId',$userId,PDO::PARAM_INT);
        $result->bindParam(':fromDate',$fromDate);
        $result->bindParam(':toDate',$toDate);
        
        $result->execute(); 
        
    }
    
    public static function checkHolidays($userId){
        
        $db = DB::getConnection();
        $sql='SELECT * FROM holidays WHERE userId=:userId LIMIT 1';
        
        $result=$db->prepare($sql);
        $result->bindParam(':userId',$userId,PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row=$result->fetch();
        
        if($row !== false)
            return $row;
        return false;
    }
    public static function getUserList($status){
        
        $db = DB::getConnection();
        
        $userList=array();
        if($status=="0"){
        $sql='SELECT u.id, u.name, u.email,h.status, h.userId, h.fromDate, h.toDate FROM holidays h LEFT JOIN users u ON h.userId=u.id WHERE h.status=:status';
        
        $result=$db->prepare($sql); 
        $result->bindParam(':status',$status,PDO::PARAM_STR);     
        
        }else{
        $sql='SELECT u.id, u.name, u.email,h.status, h.userId, h.fromDate, h.toDate FROM holidays h LEFT JOIN users u ON h.userId=u.id';
        
        $result=$db->prepare($sql);   
        }
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        
        while($row=$result->fetch()){
            $userList[$row['userId']]['id']=$row['id'];
            $userList[$row['userId']]['name']=$row['name'];
            $userList[$row['userId']]['email']=$row['email'];
            $userList[$row['userId']]['fromDate']=$row['fromDate'];
            $userList[$row['userId']]['toDate']=$row['toDate'];
            $userList[$row['userId']]['status']=$row['status'];
        }
        return $userList;
    }
    public static function confirmUsersHoliday($cooperatorId){
        
        $db = DB::getConnection();
        $sql='UPDATE holidays SET status=:status WHERE userId = :userId';
        
        $status='1';
        $result=$db->prepare($sql);
        $result->bindParam(':status',$status,PDO::PARAM_STR);
        $result->bindParam(':userId',$cooperatorId,PDO::PARAM_INT);
        
        $result->execute();
    }
}
?>