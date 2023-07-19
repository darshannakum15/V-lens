<?php
    $conn = mysqli_connect('localhost','root','','v_lens_db');
    if(isset($_POST['ctus_send']))
    {
        $name = $_POST['ctus_name'];
        $email = $_POST['ctus_email'];
        $msg = $_POST['ctus_msg'];


        $request = "insert into ctus(name, email, msg) values('$name','$email','$msg')";
        // $b = "create table  if not exits ctus (name varchar2(20),email varchar2(20),msg varchar2(20))";
        mysqli_query($conn,$request);
        // mysqli_query($conn,$b);
        echo "Thanks for contacting us! We will reply to your message very soon ! - V-Lens";
        
    }
    else
    {
        echo "Something went wrong ! Try again !";
    }
?>
<br><br>
<a href="ContactUs.php" ><button>Back To V-lens</button></a>
