<?php
/*
 * Les tests selenium s'appuient sur une API qui dialogue avec un serveur 
 * selenium indépendant qui instancie et pilote les navigateurs sur demande.
 * Ce serveur selenium est écrit en java et nécessite donc l'installation d'une jvm.
 * L'exécution de ce serveur se lance comme suit :
 * C:\Logiciels\2017-2018>java -jar selenium-server-standalone-2.53.1.jar -Dwebdriv
er.chrome.driver=chromedriver.exe

 * Le fichier .jar et le pilote de chrome se trouvent ici dans le même répertoire
 * Ils sont à télécharger à partir du site de référence de selenium
 * Choisir la dernière version de numéro majeur 2
 * http://selenium-release.storage.googleapis.com/index.html?path=2.53/
 * https://sites.google.com/a/chromium.org/chromedriver/downloads

 */
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