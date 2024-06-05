<?php
class Celda {
    public $titulo;
    public $valor;

    function __construct($valor = '', bool $titulo = false) {
        $this->valor = $valor;
        $this->titulo = $titulo;
    }
}

class Fila {
    public $celdas = [];

    public function __construct(array $valores) {
        $this->generar_celdas($valores);
    }

    private function generar_celdas($valores) {
        foreach ($valores as $valor) {
            $this->celdas[] = new Celda($valor);
        }
    }

    public function cambiar_a_titulo(bool $cambiar) {
        foreach ($this->celdas as $celda) {
            $celda->titulo = $cambiar;
        }
    }
}

class Tabla {
    public $filas = [];

    public function agregar_fila(Fila $fila) {
        $this->filas[] = $fila;
    }

    public function mostrar_en_pantalla() {
        $tabla = '<table border=1 width =100% style="table-layout:fixed">';
        foreach ($this->filas as $fila) {
            $tabla .= '<tr>';
            foreach ($fila->celdas as $celda) {
                if ($celda->titulo) {
                    $tabla .= "<th>{$celda->valor}</th>";
                } else {
                    $tabla .= "<td>{$celda->valor}</td>";
                }
            }
            $tabla .= '</tr>';
        }
        $tabla .= '</table>';
        echo $tabla;
    }
}

