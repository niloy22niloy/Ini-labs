<?php
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function makeSound() {
        return "Animal sound";
    }

    public function getName() {
        return $this->name;
    }
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof! Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}

class Cow extends Animal {
    public function makeSound() {
        return "Moo!";
    }
}


$animals = [
    new Dog("Tommy"),
    new Cat("Mini"),
    new Cow("Humba")
];

foreach ($animals as $animal) {
    echo $animal->getName() . " says: " . $animal->makeSound() . "<br>";
}


?>
