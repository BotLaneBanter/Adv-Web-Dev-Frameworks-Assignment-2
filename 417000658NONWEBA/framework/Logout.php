<?php 

namespace QuwisSystem\Framework;

class Logout{

  public function logOutUser()
{
    $session = new SessionManager();
    //$session->create();
    $session->remove('Email');
    $session->destroy();
    header('Location: index.php');
}


}

?>