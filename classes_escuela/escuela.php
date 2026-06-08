<?php



class Alumno {
    // propiedades -> atributos
    private string $nombre;
    private string $apellido;
    private int $edad;
    private int $codigo_alumno;

    // funciones = acciones -> métodos

    public function __construct(string $nombre, string $apellido, int $edad) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    public function nombre_completo () {
        return "<br>Te llamas " . $this->nombre . " " . $this->apellido . " y tienes ". $this->edad . "<br>";
    }

    // setters & getters
    public function set_nombre ($nombre) {
        $this->nombre = $nombre;
    }
    public function set_apellido ($apellido) {
        $this->apellido = $apellido;
    }

    public function get_nombre () {
        return $this->nombre;
    }

}

// Instancia de la clase Alumno = OBJETO
$alumno_1 = new Alumno("Maria", "Pou", 24);
echo $alumno_1->nombre_completo();

$alumno_1->set_nombre('Joan') ;
$alumno_1->set_apellido("Garcia");
echo $alumno_1->nombre_completo();

// Instancia de la clase Alumno = OBJETO
$alumno_2 = new Alumno("Peter", "Jones", 22);
echo $alumno_2->nombre_completo();
echo "<br> El alumno 2 se llama ".$alumno_2->get_nombre();




