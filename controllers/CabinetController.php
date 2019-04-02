<?php

include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Holiday.php';

class CabinetController{ 
    
    public function actionIndex(){
        
        $userId=User::checkLogged();
        
        $user=User::getUserById($userId);
        
        if($user['status']=='1'){
            
        $status="0"; 
            
        $userList=Holiday::getUserList($status);
        
        require_once(ROOT.'/views/cabinet/admin.php');
            
        }else{
        
        $holidayList=Holiday::checkHolidays($userId);
        
        require_once(ROOT.'/views/cabinet/index.php');
        }
        
        
    }
    
    public function actionEdit(){
        
        if(isset($_POST)){
        
            $fromDate=date("Y-m-d", strtotime($_POST['fromDate']));
            $toDate=date("Y-m-d", strtotime($_POST['toDate']));    

            $userId=User::checkLogged();
            $user=User::getUserById($userId);

            $checkHolidays=Holiday::checkHolidays($userId);

            if($checkHolidays){
                Holiday::updateHolidays($userId,$fromDate,$toDate);
            }else{
                Holiday::setHolidays($userId,$fromDate,$toDate);
            }
            $checkHolidays=Holiday::checkHolidays($userId);
            require_once(ROOT.'/views/cabinet/edit.php');
        }
        
        return true;
        
    }
    
    public function actionHoliday(){
        
        $userId=User::checkLogged();
        $user=User::getUserById($userId);
        $status=null;
        $userList=Holiday::getUserList($status);
        
        require_once(ROOT.'/views/cabinet/holiday.php');
        
    }
    
    public function actionConfirm(){
        
        $userId=User::checkLogged();
        $user=User::getUserById($userId);
        
        if(isset($_POST) && $user['status']=='1'){
            
        $cooperatorId=$_POST['cooperatorId'];
            
        $confirm=Holiday::confirmUsersHoliday($cooperatorId);
        $status="0";
        $userList=Holiday::getUserList($status);
        
        require_once(ROOT.'/views/cabinet/edit.php');  
       
        }
    }
}

?>
