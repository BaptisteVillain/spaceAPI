<?php 

    // Messages
    $error_messages = array();

    // Form sent
    if(!empty($_POST))
    {

      
        // Retrieve data
        $email  = $_POST['email'];
        
      
      // name errors
        if(empty($email))
            $error_messages['Email'] = 'should not be empty';
          
      
      
      if(empty($error_messages))
{
  
$prepare = $pdo->prepare("INSERT INTO mail (email) VALUES (:email)" );
$prepare->bindValue('email', $_POST['email']);

$prepare->execute();
  
}
      
    }

    // No data sent
    else
    {
        // Default values
        $_POST['email'] = '';
    }
?>
