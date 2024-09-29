<?php  session_start();
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  if(in_array($_SESSION['project_user_type'], ['marketing_head'], true )){ header("location:marketing_head"); } else 
  if(in_array($_SESSION['project_user_type'], ['rnd_head'], true )){ header("location:rnd_head"); } else 
  if(in_array($_SESSION['project_user_type'], ['qa_head'], true )){ header("location:qa_head"); } else 
  if(in_array($_SESSION['project_user_type'], ['finance_head'], true )){ header("location:finance_head"); } else 
  if(in_array($_SESSION['project_user_type'], ['fuel_station_user'], true )){ header("location:fuel_station_user"); }else{ header("location:logout"); }

}else{
    header("location:login");
}

?>
