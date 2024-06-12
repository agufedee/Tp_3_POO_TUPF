<?php
require 'tablas.php';
class Componente
{
    public function __construct(public string $nombre, public string $marca, public string $modelo, public int $precio)
    {
    }

    public function obtener_valores()
    {
        return [
            $this->nombre,
            $this->marca,
            $this->modelo,
            $this->precio
        ];
    }

    public function obtener_atributos()
    {
        return ['Nombre', 'Marca', 'Modelo', 'Precio'];
    }
}

class CPU extends Componente
{
    public function __construct($marca, $modelo, $precio, public int $nucleos, public int $hilos, public int $frecuencia_base)
    {
        parent::__construct('CPU', $marca, $modelo, $precio);
    }

    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->nucleos,
            $this->hilos,
            $this->frecuencia_base,
        ]);
    }

    public function obtener_atributos()
    {
        return array_merge(parent::obtener_atributos(), ['Núcleos', 'Hilos', 'Frecuencia Base']);
    }
}

class RAM extends Componente
{
    public function __construct($marca, $modelo, $precio, public string $capacidad, public string $frecuencia)
    {
        parent::__construct('RAM', $marca, $modelo, $precio);
    }

    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->capacidad,
            $this->frecuencia
        ]);
    }

    public function obtener_atributos()
    {
        return array_merge(parent::obtener_atributos(), ['Capacidad', 'Frecuencia']);
    }
}

class GPU extends Componente
{
    public function __construct($marca, $modelo, $precio, public string $memoria)
    {
        parent::__construct('GPU', $marca, $modelo, $precio);
    }

    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->memoria
        ]);
    }

    public function obtener_atributos()
    {
        return array_merge(parent::obtener_atributos(), ['Memoria']);
    }
}

class SSD extends Componente
{
    public function __construct($marca, $modelo, $precio, public string $capacidad, public string $tipo)
    {
        parent::__construct('SSD', $marca, $modelo, $precio);
    }

    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->capacidad,
            $this->tipo
        ]);
    }

    public function obtener_atributos()
    {
        return array_merge(parent::obtener_atributos(), ['Capacidad', 'Tipo']);
    }
}

class PSU extends Componente
{
    public function __construct($marca, $modelo, $precio, public string $potencia, public string $certificacion)
    {
        parent::__construct('PSU', $marca, $modelo, $precio);
    }

    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->potencia,
            $this->certificacion
        ]);
    }

    public function obtener_atributos()
    {
        return array_merge(parent::obtener_atributos(), ['Potencia', 'Certificación']);
    }
}
$tabla = new Tabla();

// Añadir encabezado principal
$tipo_contenido = new Fila(['<h2>Componentes Internos de la Computadora</h2>']);
$tabla->agregar_fila($tipo_contenido);

// Crear una fila para los encabezados
$componentes = [
    new CPU('AMD', 'Ryzen 5 5600X', 200, 6, 12, 3700),
    new RAM('Corsair', 'Vengeance LPX 16GB', 75, '16GB', '3200 MHz'),
    new GPU('NVIDIA', 'GeForce RTX 3060', 350, '12GB'),
    new SSD('Samsung', '970 EVO Plus', 150, '1TB', 'NVMe'),
    new PSU('Corsair', 'RM750x', 100, '750W', '80+ Gold')
];

// Añadir fila de encabezados
$encabezados = $componentes[0]->obtener_atributos();
foreach ($componentes as $componente) {
    $atributos = $componente->obtener_atributos();
    $encabezados = array_unique(array_merge($encabezados, $atributos));
}
$encabezado_fila = new Fila($encabezados);
$encabezado_fila->cambiar_a_titulo(true);
$tabla->agregar_fila($encabezado_fila);

// Añadir los componentes a la tabla
foreach ($componentes as $componente) {
    $tabla->agregar_fila(new Fila($componente->obtener_valores()));
}

$tabla->mostrar_en_pantalla();

