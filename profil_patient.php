<?php
session_start();
?>
<?php




if((!isset($_SESSION['email'])) && (!isset($_SESSION['password'])) ){
	
	header("Location: index.php");
     // exit();
}






if(isset($_POST['logout'])){
	session_destroy();
	header("Location: index.php");
	exit();

}


?>







<?php   
 $conn=mysqli_connect("localhost","root","","iotbd"); //database connection  


$id = $_SESSION['id'];
 $query="select * from users where id ='$id'";  
$query1="select * from vs where vsuser ='$id'  ";

  $connect=mysqli_query($conn,$query); 
 $connect1=mysqli_query($conn,$query1); 
  $num=mysqli_num_rows($connect); //check in database any data have or not  
 $num1=mysqli_num_rows($connect1); //check in database any data have or not 
 
 //get user
 $user=mysqli_fetch_assoc($connect);
     
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
         <title>IoT-Medical</title>
 <div>
	<form method="post">

	     <!-- <button class="logout " type="submit" name="logout">logout</button> -->
	</form>
     <nav>
           <ul>
               <li>	     <form method="post">

<button class="logout " type="submit" name="logout">logout</button>
</form>
               </li>
               <li><h1 style="color: rgb(75,30,130) ;">E-health Is More than just an electronic record</h1></li>
          </ul>   
      </nav>
</div>    
      <meta charset="utf-8">  
      <title>patient</title>  
      <style type="text/css">
            
           *{  
                padding: 0;  
                margin: 0;  
           }
           body{  
                width: 100%;  
                min-height: 100vh;  
                    background-color:violet ;   
                    background-image: url(https://defisante.defimedia.info/wp-content/uploads/2017/07/Background-mainslider2.jpg);
   
                } 
                
           
           .center{
                height: 10%;
                background-color: #9ed1d7;
                color: white;
                padding-bottom: 1.5ex;
                padding-top: 1.5ex;
                text-align: center;
                font-size: 200%;
                margin: 0.5ex;


           }
           .logout {
                    float: right;
                    box-sizing: border-box;
                    width: 10%;
                    padding: 13px 31px 12px 23px;
                    background: border-box;
                    color: green;
                    border-radius: 23px;
                    text-align: center;
                    border: solid 5px;
                    border-style: double;
                    font-size: medium;
                    }
                    
            
           .container{  
                max-width: 900px;  
                margin: 100px auto;  
                width: 100%;  
                /* font-size: large; */
                font-size: 500;

              }          
              

           
          

           table{  
                border-collapse: collapse;  
                width: 100%; 
                background-color: red;
                font-size: 1.2em;  
                font-family: Arial, Helvetica, sans-serif;
           }  
           table th{  
                background-color: #009879;  
                color: white;  
                padding: 10px;  
                font-family: Arial, Helvetica, sans-serif;
                font-size: 1.2em;  
               
           }  
           table td{  
                padding: 12px;  
                color: #009879;
                font-size: 1.2em;  
                text-align: center;  
                background-color: white; 
                font-family: Arial, Helvetica, sans-serif;
                border-bottom: 2px solid #009879;


           }  
           table tr:nth-child(odd){  
               background-color: green; 
               font-size: 1.2em;  

           }  
      </style>  
 </head>  
 <body>  
     
     <!-- <h1 style="font-family:Arial;">E-health Is More than just an electronic record</h1>       -->



 <div class="container">  
     

     <div class="center">
            <?php 
            echo "Welcome ";
            echo $user["FN"]." ";
            echo $user["LN"];
            echo "  Here is you Vital Signs"
            ?>
     </div>
      <table border="1">  
           <tr>  
                <th>Temperature</th>  
                <th>Glucose</th>   
                <th>Heartrate</th> 

           </tr>  
           <?php   
                if ($num1>0) {       
                    // &&($data=mysqli_fetch_assoc($connect))
                     while(($data1=mysqli_fetch_assoc($connect1))){  
                              //echo $data  ;
                              
                              // <td>".$data['FN']."</td>
                              // <td>".$data['LN']."</td>
                          echo "  
                               <tr>  

						 <td>".$data1['temp']."</td>  
                                
						 <td>".$data1['bmp']."</td>
   
                               <td>".$data1['gluc']."</td>
                                
                               </tr>  
                          ";  
                     }  
                      
                }else{
                    echo '<div class="alert" role="alert ">
                    <p style="color:indigo;font-size:25px;text-align:center;
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    ">you have no vital signs.</p>
                     </div>';

                }  
           ?>  
      </table>  
 </div>  
 </body>  
 </html>