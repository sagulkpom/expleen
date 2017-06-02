<?php
// added in v4.0.0
session_start();
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1245122205506251','6987249a1900f5e4a2d084ce1a9bae4b' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://expleen.com/facebook/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response

  $graphObject = $response->getGraphObject();
      $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
      $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
      $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
  /* ---- Session Variables -----*/
  include '../config.php'; 
      $w_stmt = $con->prepare("SELECT `id`,`email` from `flowchart_users` WHERE email=?");        
            $w_stmt->bind_param('s',  $fbid);
            $w_stmt->execute();
            $w_stmt->store_result();
            $w_total=mysqli_stmt_num_rows($w_stmt);
            $w_stmt->bind_result($id,$email);
if($w_total == 1){
  $w_stmt->fetch();
        $_SESSION['id']=$id;
        $_SESSION['name'] = $fbfullname;
      $_SESSION['email'] =  $fbid;
}else{
  $query = "insert into `flowchart_users`(name,email,password,type) values('$fbfullname','$fbid','$fbid','Facebook')";        
           $res=mysqli_query($con,$query); 
            $_SESSION['id']=mysqli_insert_id($con);
            $_SESSION['name'] = $fbfullname;
      $_SESSION['email'] =  $fbid;
}
    /* ---- header location after session ----*/
  header("Location: ../my_flowchart.php");
} else {
   $loginUrl = $helper->getLoginUrl( array('scope' => 'email'));
 header("Location: ".$loginUrl);
}
?>