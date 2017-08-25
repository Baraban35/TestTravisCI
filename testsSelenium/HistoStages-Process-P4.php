<?php
class Example extends PHPUnit_Extensions_Selenium2TestCase
{
  protected function setUp()
  {
    $this->setBrowser("chrome");
    $this->setBrowserUrl("http://localhost");
  }

  public function testMyTestCase()
  {
    $this->url("/TravauxCollab/Elrohir/histoStages/accueil.php");
    $this->byCssSelector("a[title*=P4]")->click();
    // $this->waitUntil(10000);
    // vérification du titre du tableau en le désignant par le DOM
    self::assertEquals($this->byCssSelector("table caption")->text(),"Activités professionnelles du processus P4");
    $str = $this->byCssSelector("table tr:nth-child(2) td")->text();
    self::assertStringStartsWith("D4.1",$this->byCssSelector("table tr:nth-child(1) td")->text());
    self::assertStringStartsWith("D4.2",$this->byCssSelector("table tr:nth-child(12) td")->text());
  }
  
  protected function tearDown() {
      $this->stop();
  }
}
?>