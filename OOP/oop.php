<?
header('Content-Type: text/html; charset=utf-8');
class Person{
  private $name;
  private $lastname;
  private $age;
  private $mother;
  private $father;
  
  function __construct($name,$lastname,$age,$mother=null,$father=null){
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
  }
  public function getName(){return $this->name;}
	public function getLastname(){return $this->lastname;}
	public function getAge(){return $this->age;}
	public function getMother(){return $this->mother;}
	public function getFather(){return $this->father;}
	public function getInfo(){
	  return "
	    Меня зовут: ".$this->name."<br>
	    Мою маму зовут: ".$this->mother->name."<br>
	    Моих бабушку дедушку по маменой линии зовут: ".$this->getMother()->getMother()->getName()." и ".$this->getMother()->getFather()->getName()."<br>
	    Моего папу зовут: ".$this->getFather()->getName()."<br>
	    Моих бабушку дедушку по папеной линии зовут: ".$this->getFather()->getMother()->getName()." и ".$this->getFather()->getFather()->getName();
	}
}
$egor = new person("Егор","Петров",71);
$oksana = new person("Оксана","Петрова",69);
$ivan = new person("Иван","Иванов",72);
$elena = new person("Елена","Иванова",68);
$oleg = new person("Олег","Петров",41,$oksana,$egor);
$olga = new person("Ольга","Петрова",41,$elena,$ivan);
$igor = new person("Игорь","Петров",12,$olga,$oleg);
echo $igor->getInfo();
?>
