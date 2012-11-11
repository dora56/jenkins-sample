<?php
require_once dirname (__FILE__) . '/../vendor/facebook/facebook.php';
class Member {
  private $facecbook = null;
  private $name = null;
  private $email = null;
  private $facebookID = null;

  public function __construct ( $fb = null ) {
    $this->setFacebook ( $fb );
  }

  public function setFacebook ( $fb ) {
    $this->facebook = $fb;
  }

  public function getName () {
    return $this->name;
  }

  public function getFacebookID () {
    return $this->facebookID;
  }

  public function getMailAddress () {
    return $this->email;
  }
  public function fillByFacebook () {
    $me = $this->facebook->api ( '/me' );
    $this->name = $me->name;
    $this->facebookID = $me->id;
    $this->email = $me->email;
  }
}
