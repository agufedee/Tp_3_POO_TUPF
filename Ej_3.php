<?php
require 'tablas.php';
class Componente
{
    public function __construct(public string $nombre, public string $tipo, public string $accion)
    {
    }

    public function obtener_valores()
    {
        return [
            $this->nombre,
            $this->tipo,
            $this->accion
        ];
    }

    public function obtener_atributos()
    {
        return ['Nombre', 'Tipo', 'Acción'];
    }
}

class Software extends Componente
{
    public function __construct(string $nombre, string $accion)
    {
        parent::__construct($nombre, 'Software', $accion);
    }
}

class Hardware extends Componente
{
    public function __construct(string $nombre, string $accion)
    {
        parent::__construct($nombre, 'Hardware', $accion);
    }
}

$tabla = new Tabla();

// Añadir encabezado principal
$tipo_contenido = new Fila(['<h2>Componentes Intervinientes y sus Acciones</h2>']);
$tabla->agregar_fila($tipo_contenido);

// Crear una fila para los encabezados
$encabezados = ['Nombre', 'Tipo', 'Acción'];
$encabezado_fila = new Fila($encabezados);
$encabezado_fila->cambiar_a_titulo(true);
$tabla->agregar_fila($encabezado_fila);

// Definir los componentes y sus acciones
$componentes = [
    new Hardware('Botón', 'Dispara su evento click'),
    new Software('Programa', 'Carga datos necesarios'),
    new Software('Sistema Operativo', 'Solicita un pedido a un recurso de la computadora'),
    new Hardware('Disco Duro', 'Busca el recurso'),
    new Hardware('Memoria RAM', 'Carga el recurso'),
    new Software('Recurso', 'Recibe los datos, se ejecuta y lee los datos enviados'),
    new Hardware('Recurso Externo', 'Hace un pedido a un recurso externo de la computadora'),
    new Software('Servidor', 'Recibe y procesa datos'),
    new Hardware('Motor de Base de Datos', 'Recibe y comprueba permisos, busca datos solicitados'),
    new Software('Programa', 'Procesa datos y muestra una imagen en pantalla'),
    new Hardware('Pantalla', 'Muestra “Hola mundo!”')
];

// Añadir los componentes a la tabla
foreach ($componentes as $componente) {
    $tabla->agregar_fila(new Fila($componente->obtener_valores()));
}

$tabla->mostrar_en_pantalla();
