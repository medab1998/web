<?php
session_start();
?>
<?php   
 $conn=mysqli_connect("localhost","root","","iotbd"); //database connection  


$id = $_SESSION['id'];
 $query="select * from medecin where id ='$id'";  


  $connect=mysqli_query($conn,$query); 
 
  $num=mysqli_num_rows($connect); //check in database any data have or not  

 
 //get user
 $user=mysqli_fetch_assoc($connect);
     
 ?> 
<html>
<head> 
<div>	<form method="post">

</form>
<nav>
      <ul>
          <li>	     <form method="post">

                         <button class="logout " type="submit" name="logout">logout</button>
                    </form>
          </li>
          <li><h1 style="color: rgb(75,30,130);">Welcome Doctor
          <?php 
            
            echo $user["firstname"]." ";
            echo $user["lastname"];
           
            ?></h1></li>
     </ul>   
 </nav>
</div>

<style type="text/css">

    .logout{  
    float: right;
    margin-top: -0%;
    color: #009879;
    padding: 10px 31px 11px 30px;
    background: border-box;
    border-radius: 23px;
    box-shadow: 48px;
    border: 3px double green;
    border-style: double;

    }  
	
</style>

</head> 
<body>

<?php



	if(!isset($_SESSION['email'])){
		
		header("Location: http://localhost/code-main/home/home_medicin/login_medicin/login_medicin.php");
		exit();
	}







	if(isset($_POST['logout'])){
		unset($_SESSION['email']);
		header("Location: login_medicin.php");
		exit();
	}
?>
    
</body>
</html>




<?php   

 $conn=mysqli_connect("localhost","root","","iotbd"); //database connection  
 //hostname, username, password, database name  
 if ($conn) {  
      echo "";  
 }else{  
      echo "Error";  
 }  

 $mid=$_SESSION['id'];
 //check database connect or not  
 $query="select patid from view where medid='$mid'";
//  $query="select * from users where med_id='$mid'";
 $connect=mysqli_query($conn,$query); 
// add
$ids_array = array();
while($row = mysqli_fetch_array($connect))
{
    $ids_array[] = $row['patid'];
}
// add
//  print_r($ids_array); 
if(!empty($ids_array)){
 $queryu="select * from users where id IN (".implode(',',$ids_array).")";
}else{
     $queryu = 'select * from users where id=00'; // to avoid empty access error
}
 $connect = mysqli_query($conn,$queryu);
//  print_r(mysqli_query($conn,$queryu));
//  die('end end end');
 $num=mysqli_num_rows($connect); //check in database any data have or not 
//  $query1="select * from vs"  ;
//  $connect1=mysqli_query($conn,$query1);
// $num1=mysqli_num_rows($connect1);
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title>IoT-Medical</title>  
      <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
           }  
           body{  
               height: 100%;
               justify-content: center;
               margin: 0;
                width: 100%;  
                min-height: 100vh;  
               background-color: white;
                background-image: url(https://defisante.defimedia.info/wp-content/uploads/2017/07/Background-mainslider2.jpg); 
               }  
           .container{  
                max-width: 900px;  
                margin: 100px auto;  
                width: 100%;  
           }  
           table{  
               border-collapse: collapse;
               margin: 25px 0;
               font-size: 0.9em;
               font-family: sans-serif;
               min-width: 400px;
               box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); 
               text-align: center;
               align-items: center;
               margin-left:auto; 
               margin-right:auto;

           }  
           table th{  
               padding: 12px 15px;
               border-bottom: 1px solid #dddddd;
               background-color: #f3f3f3;
               border-bottom: 2px solid #009879;
               font-weight: bold;
               color: indigo;
               text-align: center;
               align-items: center;
               margin-left:auto; 
               margin-right:auto;


           }  
           table td{  
               padding: 12px 15px;  
               border-bottom: 1px solid #dddddd;
               background-color: #f3f3f3;
               border-bottom: 2px solid #009879;
               font-weight: bold;
               color: #009879;
               text-align: center;
               align-items: center;
               margin-left:auto; 
               margin-right:auto;
           }  
           table tr:nth-child(odd){  
                background-color: #797676;  
           }  
      </style>  
 </head>  
 <body>  
 <div class="container">  
     <!-- <form action="affectationP.php" method="POST" style="
     margin-top: -121px; 
     margin-bottom: 254px; 
    color: indigo;
    font-size: 25px;">
          <label>add patient:</label>
          <input type="text" name="cin"/>
          <input type="submit" value="submit"/>
     </form> -->
      <table border="1">  
           <tr>  
                 <th>First name</th>   
                 <th>last name</th>   
                <th>Email</th>    
                <th>action</th>  
                <!-- <th>Temperature</th>  
                <th>Glucose</th>
                <th>Heartrate</th> -->
    

           </tr>  
           <?php   
                if ($num>0 ) {  
                     while($data=mysqli_fetch_assoc($connect)){  
                         $userid= $data['id'];
                          echo "  
                               <tr>  
                               <td>".$data['FN']."</td>  
                               <td>".$data['LN']."</td>
						 <td>".$data['email']."</td> 
						 <td><a href='?user_id=$userid'>Check your patient Vital Sings</a></td> 

                               </tr>  
                          ";   
                              
                     }  
                }  else{
                    echo '<div class="alert" role="alert ">
		    <p style="color:indigo;font-size:25px;text-align:center;">You have no patient yet.</p>
	          </div>';
                }
           ?>  
      </table>  
 </div>  
 <?php
 if(isset($_GET['user_id'])){
$id = $_GET['user_id'];
 $query1="select * from vs where vsuser='$id'"  ;
 $connect1=mysqli_query($conn,$query1);
$num1=mysqli_num_rows($connect1);
?>
<div>
     
</div width="50%"><table border="1">  
           <?php   
                if ($num1>0 ) {  
                    ?>
                    
               <tr>   
                <th>Temperature</th>  
                <th>Glucose</th>
                <th>Heartrate</th>
    

           </tr>  
                    <?php
           
                     while($data1=mysqli_fetch_assoc($connect1)){  
                          echo "  
                               <tr>  
                               <td>".$data1['temp']."</td>  
                               <td>".$data1['gluc']."</td>
						 <td>".$data1['bmp']."</td> 

                               </tr>  
                          ";   }
                    //  }  <td>".$data1['gluc']."</td>
               
           ?>  
      </table></div>  
      <?php 
       } else{
          // echo '<div class="alert" role="alert ">'
          // <p   style="text-align:center;">This patient haven't checked yet </p>
          echo '<div class="alert" role="alert ">
		    <p style="color:indigo;font-size:25px;text-align:center;">This patient had not checked yet</p>
	          </div>';
      } 
 }
 
 ?>
 </body>  
 </html>  