<?php

class NewsLetterDAO {

    function save($nome, $email, $redirect) {
        include('../connection/config.php');
        include('ADMIN'.'/connection/config.php');
        if ( ($nome !== null && $nome !== '') && $email !== null && $email !== ''){
            $result = $this->findByNomeEmail($email);
            if ($result !== null){
                echo "<script>window.location='".$redirect."?return=error&description=already';</script>";
            }else{
                 $sql = "INSERT INTO newsletter VALUES ('$email', '$nome', 1)";
                 if ($conn->query($sql) == TRUE) {
                     $conn->close();
                     echo "<script>window.location='".$redirect."?return=sucess';</script>";
                 }else{
                     echo "<script>window.location='".$redirect."?return=error';</script>";
                 }
            }
        }
    }
    
    function update($email, $icexportado){
        include('../connection/config.php');
        $sql = "UPDATE newsletter SET icexportado = $icexportado WHERE email = '$email'";
         if ($conn->query($sql) == TRUE) {
             $conn->close();
         }
    }

    function findByNomeEmail($email) {
        include('../connection/config.php');
        include('ADMIN'.'/connection/config.php');
        $newsletter = null;
        $sql = "SELECT * FROM newsletter WHERE email = '$email'" ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $newsletter = $result->fetch_assoc();
        }
        $conn->close();
        return $newsletter;
    }
    
    function findByNotExported(){
        include('../connection/config.php');
        $sql = "SELECT * FROM newsletter WHERE icexportado = 2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $newsletters = $result->fetch_assoc();
        }
        $conn->close();
        return $newsletters;
    }

}
?>

