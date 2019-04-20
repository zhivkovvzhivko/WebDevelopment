<?php
spl_autoload_register();

class Citizen implements IPerson, IIdentifiable, IBirthable
{

	/**
	 * string $id
	 */
	private $id;

	/**
	 * string $name
	 */
	private $name;

	/**
	 * int $age
	 */
	private $age;

	/**
	 * int $age
	 */
	private $birthDate;

	public function __construct(string $name, int $age, string $id, string $birthDate){
		$this->setName($name);
		$this->setAge($age);
		$this->setId($id);
		$this->setBirthdate($birthDate);
	}

    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge()
    {
    	return $this->age;
    }

    public function setAge($age): void
    {
    	$this->age = $age;
    }

    public function setId(string $id): void
    {
    	$this->id = $id;
    }

    public function getId(): string
    {
    	return $this->id;
    }

    public function getBirthdate(): string
    {
    	return $this->birthDate;
    }

    public function setBirthdate(string $birthDate): void
    {
    	$this->birthDate = $birthDate;
    }

    public function __toString()
    {
    	return "{$this->getName()}, {$this->getAge()}, {$this->getId()}, {$this->getBirthdate()}";
    }
}

$citizen = new Citizen('Pesho', 43, '7706126789', '12.06.1977');
echo $citizen;

