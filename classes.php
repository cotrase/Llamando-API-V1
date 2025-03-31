<?php

declare(strict_types=1);

class SuperHero
{
  // promoted properties -> PHP 8
  public function __construct(
    private string $name,
    public array $powers,
    public string $planet
  ) {
  }

  public function attack(): string
  {
    return "¡$this->name ataca con sus poderes!";
  }

  public function show_all(): array
  {
    return get_object_vars(object: $this);
  }

  public function description(): string
  {
    $powers = implode(separator: ", ", array: $this->powers);

    return "$this->name es un superhéroe que viene de $this->planet y tiene los siguientes poderes: $powers";
  }

  public static function random()
  {
    $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
    $powers = [
      ["Superfuerza", "Volar", "Rayos láser"],
      ["Superfuerza", "Super agilidad", "Telarañas"],
      ["Regeneración", "Superfuerza", "Garras de adamantium"],
      ["Superfuerza", "Volar", "Rayos láser"],
      ["Superfuerza", "Super agilidad", "Cambio de tamaño"],
    ];
    $planets = ["Asgard", "HulkWorld", "Krypton", "Tierra"];

    $name = $names[array_rand(array: $names)];
    $power = $powers[array_rand(array: $powers)];
    $planet = $planets[array_rand(array: $planets)];

    return new self(name: $name, powers: $power, planet: $planet);
  }
}

// estático
$hero = SuperHero::random(); // método estático
echo $hero->description();
