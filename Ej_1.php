<?php
include 'tablas.php';
class Elementos
{
    public $atributos = ['Titulo', 'Autor', 'Pais de Origen', 'Tamaño en Mb', 'Año de Publicacion', 'Idioma', 'Formato'];
    public $titulo;
    public $autor;
    public $pais_origen;
    public $tamaño_mb;
    public $año_publicacion;
    public $idioma;
    public $formato;

    public function __construct(string $titulo = '', string $autor = '', int $año_publicacion, string $pais_origen = '', string $idioma = '', int $tamaño_mb, string $formato = '')
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->año_publicacion = $año_publicacion;
        $this->pais_origen = $pais_origen;
        $this->idioma = $idioma;
        $this->tamaño_mb = $tamaño_mb;
        $this->formato = $formato;
    }
    public function obtener_valores()
    {
        return [
            $this->titulo,
            $this->autor,
            $this->pais_origen,
            $this->tamaño_mb,
            $this->año_publicacion,
            $this->idioma,
            $this->formato
        ];
    }
}

class Canciones extends Elementos
{
    public $atributos_propios = ['Género', 'Reproducciones', 'Album'];
    public $genero;
    public $reproducciones;
    public $album;


    public function __construct(string $titulo = '', string $autor = '', int $año_publicacion = 0, string $pais_origen = '', string $idioma = '', int $tamaño_mb = 0, string $formato = '', string $genero = '', int $reproducciones = 0, string $album = '')
    {
        parent::__construct($titulo, $autor, $año_publicacion, $pais_origen, $idioma, $tamaño_mb, $formato);
        $this->genero = $genero;
        $this->reproducciones = $reproducciones;
        $this->album = $album;
        $this->atributos = array_merge($this->atributos, $this->atributos_propios);
    }
    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->genero,
            $this->reproducciones,
            $this->album
        ]);
    }
}
class Libros extends Elementos
{
    public $atributos_propios = ['Editorial', 'Genero', 'Precio'];
    public $editorial;
    public $genero;
    public $precio;
    public function __construct(string $titulo, string $autor, int $año_publicacion, string $pais_origen, string $idioma, int $tamaño_mb, string $formato = '', string $editorial, string $genero, int $precio)
    {
        parent::__construct($titulo, $autor, $año_publicacion, $pais_origen, $idioma, $tamaño_mb, $formato);
        $this->editorial = $editorial;
        $this->genero = $genero;
        $this->precio = $precio;
        $this->atributos = array_merge($this->atributos, $this->atributos_propios);
    }
    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->editorial,
            $this->genero,
            $this->precio
        ]);
    }
}
class Fotos extends Elementos
{
    public $atributos_propios = ['Dispositivo', 'Color', 'Resolucion'];
    public $dispositivo;
    public $color;
    public $resolucion;

    public function __construct(string $titulo, string $autor, int $año_publicacion, string $pais_origen, string $idioma, int $tamaño_mb, string $formato = '', string $dispositivo, bool $color, string $resolucion)
    {
        parent::__construct($titulo, $autor, $año_publicacion, $pais_origen, $idioma, $tamaño_mb, $formato);
        $this->dispositivo = $dispositivo;
        $this->color = $color;
        $this->resolucion = $resolucion;
        $this->atributos = array_merge($this->atributos, $this->atributos_propios);
    }
    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->dispositivo,
            $this->color,
            $this->resolucion
        ]);
    }
}
class Videos extends Elementos
{
    public $atributos_propios = ['Duración', 'Reproducciones', 'Relacion-Aspecto'];

    public $duracion;
    public $reproducciones;
    public $relacion_aspecto;

    public function __construct(string $titulo, string $autor, int $año_publicacion, string $pais_origen, string $idioma, int $tamaño_mb, string $formato = '', string $duracion, int $reproducciones, string $relacion_aspecto)
    {
        parent::__construct($titulo, $autor, $año_publicacion, $pais_origen, $idioma, $tamaño_mb, $formato);
        $this->duracion = $duracion;
        $this->reproducciones = $reproducciones;
        $this->relacion_aspecto = $relacion_aspecto;
        $this->atributos = array_merge($this->atributos, $this->atributos_propios);
    }
    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->duracion,
            $this->reproducciones,
            $this->relacion_aspecto
        ]);
    }
}
class Juegos extends Elementos
{
    public $atributos_propios = ['Plataforma', 'Modo-Juego', 'Requerimiento-RAM'];

    public $plataforma;
    public $modo_juego;

    public $requerimento_ram_mb;

    public function __construct(string $titulo, string $autor, int $año_publicacion, string $pais_origen, string $idioma, int $tamaño_mb, string $formato = '', string $plataforma, string $modo_juego, int $requerimento_ram_mb)
    {
        parent::__construct($titulo, $autor, $año_publicacion, $pais_origen, $idioma, $tamaño_mb, $formato);
        $this->plataforma = $plataforma;
        $this->modo_juego = $modo_juego;
        $this->requerimento_ram_mb = $requerimento_ram_mb;
        $this->atributos = array_merge($this->atributos, $this->atributos_propios);
    }
    public function obtener_valores()
    {
        return array_merge(parent::obtener_valores(), [
            $this->plataforma,
            $this->modo_juego,
            $this->requerimento_ram_mb
        ]);
    }
}


//?Instancias de clases

$tabla = new Tabla();

//?Canciones
$cancion1 = new Canciones('chau', 'NTVG', 2011, 'Uruguay', 'español', 8.2, 'digital', 'rock', 5000000, 'Por lo Menos hoy');
$cancion2 = new Canciones('mariposa tecknicolor', 'Fito Páez', 2011, 'Argentina', 'español', 8.2, 'digital', 'pop/rock', 5000000, 'Circo Beat');
$cancion3 = new Canciones('Mejor que Ayer', 'Diego Torres', 2011, 'Argentina', 'español', 8.2, 'digital', 'pop', 5000000, 'Mejor que Ayer');
//Fila de 
$tipo_contenido = new Fila(['','','','','Canciones','','','','']);
$tipo_contenido->cambiar_a_titulo(true);
$tabla->agregar_fila($tipo_contenido);

$encabezado = new Fila($cancion1->atributos);
$encabezado->cambiar_a_titulo(true);
$tabla->agregar_fila($encabezado);

$tabla->agregar_fila(new Fila($cancion1->obtener_valores()));
$tabla->agregar_fila(new Fila($cancion2->obtener_valores()));
$tabla->agregar_fila(new Fila($cancion3->obtener_valores()));


//?LIBROS
$libro1 = new Libros('Biblia', 'Dios', 1960, '', 'español', 0, 'fisico/papel', 'Reina Valera', 'espiritual', 10000);
$libro2 = new Libros('Harry Potter 1', 'J.K. Rowling', 1997, 'Inglaterra', 'ingles', 0, 'fisico/papel', 'Salamandra', 'fantasia', 14799);
$libro3 = new Libros('divergente', 'Veronica Roth', 2011, 'EE.UU', 'ingles', 0, 'fisico/papel', 'pepe', 'fantasia', 15000);

$tipo_contenido = new Fila(['','','','','Libros','','','','']);
$tipo_contenido->cambiar_a_titulo(true);
$tabla->agregar_fila($tipo_contenido);

$encabezado = new Fila($libro1->atributos);
$encabezado->cambiar_a_titulo(true);
$tabla->agregar_fila($encabezado);

$tabla->agregar_fila(new Fila($libro1->obtener_valores()));
$tabla->agregar_fila(new Fila($libro2->obtener_valores()));
$tabla->agregar_fila(new Fila($libro3->obtener_valores()));

//?FOTOS
$foto1 = new Fotos('arcoiris', 'NTVG', 2011, 'Uruguay', 'español', 3, 'digital', 'Nikon d5', true, '720x1080');
$foto2 = new Fotos('cielo azul', 'fedee', 2014, 'españa', 'español', 4.5, 'digital', 'xiaomi M9t', true, '600x600');
$foto3 = new Fotos('distraccion', 'pedro', 2000, 'peru', 'español', 8, 'impresa', 'sony', false, '2440x720');

$tipo_contenido = new Fila(['','','','','Fotos','','','','']);
$tipo_contenido->cambiar_a_titulo(true);
$tabla->agregar_fila($tipo_contenido);

$encabezado = new Fila($foto1->atributos);
$encabezado->cambiar_a_titulo(true);
$tabla->agregar_fila($encabezado);

$tabla->agregar_fila(new Fila($foto1->obtener_valores()));
$tabla->agregar_fila(new Fila($foto2->obtener_valores()));
$tabla->agregar_fila(new Fila($foto3->obtener_valores()));

//?VIDEOS
$video1 = new Videos('pepe', 'NTVG', 2011, 'Uruguay', 'español', 8.2, 'digital', '3min', 80000, '1:1');
$video2 = new Videos('pedro', 'NTVG', 2011, 'Uruguay', 'español', 7.2, 'digital', '3min', 500, '16:9');
$video3 = new Videos('chau', 'NTVG', 2011, 'Uruguay', 'español', 8.2, 'digital', '3min', 1000, '4:3');

$tipo_contenido = new Fila(['','','','','VIdeos','','','','']);
$tipo_contenido->cambiar_a_titulo(true);
$tabla->agregar_fila($tipo_contenido);

$encabezado = new Fila($video1->atributos);
$encabezado->cambiar_a_titulo(true);
$tabla->agregar_fila($encabezado);

$tabla->agregar_fila(new Fila($video1->obtener_valores()));
$tabla->agregar_fila(new Fila($video2->obtener_valores()));
$tabla->agregar_fila(new Fila($video3->obtener_valores()));


//?JUEGOS
$juego1 = new Juegos('Fifa', 'EA', 1993, 'Japón', 'japones', 35, 'cartucho', 'Multiplataforma', 'historia/multijugador', 32);
$juego2 = new Juegos('Contra', 'Konami', 1987, 'Japón', 'japones', 10, 'cartucho', 'Arcade', 'historia', 16);
$juego3 = new Juegos('Pacman', 'NTVG', 2011, 'Uruguay', 'español', 5, 'digital', 'arcade', 'historia', 16);

$tipo_contenido = new Fila(['','','','','Libros','','','','']);
$tipo_contenido->cambiar_a_titulo(true);
$tabla->agregar_fila($tipo_contenido);

$encabezado = new Fila($juego1->atributos);
$encabezado->cambiar_a_titulo(true);
$tabla->agregar_fila($encabezado);

$tabla->agregar_fila(new Fila($juego1->obtener_valores()));
$tabla->agregar_fila(new Fila($juego2->obtener_valores()));
$tabla->agregar_fila(new Fila($juego3->obtener_valores()));

// Mostrar la tabla en pantalla
$tabla->mostrar_en_pantalla();
