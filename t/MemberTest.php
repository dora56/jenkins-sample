<?php
require_once dirname (__FILE__)  . '/../classes/Member.php';

class MemberTest extends PHPUnit_Framework_TestCase {
  private $target = null;
  public function setup () {
    $this->target = new Member ( );
  }

  public function testFillByFacebook () {
    $this->assertTrue(false);
    $facebook = $this->getMockBuilder ( 'Facebook' )
      ->disableOriginalConstructor ()
      ->setMethods ( array ( 'api' ) )
      ->getMock();

    $facebook->expects ( $this->once() ) -> method ( 'api' )
      ->with ( $this->equalTo ( '/me' ) )
      ->will ( $this->returnValue ( (object)array (
        'id' => '1234',
        'name' => 'Takeshi Ishida',
        'email' => 'ishida.tak@gmail.com',
      )));
    $this->target->setFacebook ( $facebook );
    $this->target->fillByFacebook ();
    $this->assertEquals ( 'Takeshi Ishida', $this->target->getName () );
    $this->assertEquals ( 'ishida.tak@gmail.com', $this->target->getMailAddress () );
    $this->assertEquals ( '1234', $this->target->getFacebookID () );
  }
}
