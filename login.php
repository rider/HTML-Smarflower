   <?php  
    session_start();  
    $username = $_POST['name'];  
    $password = md5($_POST['pwd']);  
    $mysqli=mysqli_connect('localhost','usuario_mysql','password_mysql','nombre_bd');  
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";  
    $result = mysqli_query($mysqli,$query)or die(mysqli_error());  
    $num_row = mysqli_num_rows($result);  
    $row=mysqli_fetch_array($result);  
    if( $num_row >=1 ) {  
    echo 'true';  
    $_SESSION['pass']=$row['password'];  
        }  
        else{  
            echo 'false';  
        }  
?>  