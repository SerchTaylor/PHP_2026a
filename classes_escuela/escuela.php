<?php

// Evitar la conversión de tipos:
declare(strict_types=1);

class Curso
{
    // private string $nombre;
    // private string $lenguaje;
    // private int $duracion;
    private float $precio_hora;

    // Desde PHP v8 : promoted properties
    public function __construct(private string $nombre, private string $lenguaje, private int $duracion = 60) {}

    public function mostrar_info()
    {
        $info = "<br>Nombre: " . $this->nombre . "<br>Lenguaje: " . $this->lenguaje . "<br>Duración: " . $this->duracion . "<hr><br>";
        return $info;
    }

    public function set_precio ($precio_hora = 20) {
        $this->precio_hora = $precio_hora;
    }
}

$curso_PHP = new Curso("Curso básico de backend", "PHP");
echo $curso_PHP->mostrar_info();

$curso_Javascript = new Curso("Curso básico de Javascript", "Javascript", 90);
echo $curso_Javascript->mostrar_info();

$curso_HTML = new Curso("Curso básico de HTML", "HTML", 45);
// echo $curso_HTML->mostrar_info();

// $curso_2 = new Curso (2, "PHP");
// echo $curso_2->mostrar_info();



class Alumno
{
    // propiedades -> atributos
    private string $nombre;
    private string $apellido;
    private int $edad;
    private int $codigo_alumno;
    private array $cursos_matriculados;

    // funciones = acciones -> métodos

    public function __construct(string $nombre, string $apellido, int $edad)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    public function nombre_completo()
    {
        return "<br>Te llamas " . $this->nombre . " " . $this->apellido . " y tienes " . $this->edad . "<br>";
    }

    // setters & getters
    public function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function set_apellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function get_nombre()
    {
        return $this->nombre;
    }

    public function matricular_curso(Curso $curso)
    {
        $this->cursos_matriculados[] = $curso;
    }

    public function mostrar_expediente() {
        $expediente = "<br>Nombre : ".$this->nombre_completo()."<br>";
        foreach ($this->cursos_matriculados as $curso) {
            $expediente .= $curso->mostrar_info();
        }
        return $expediente;
    }

    public function pagar_cursos(){

    }
}

// Instancia de la clase Alumno = OBJETO
$alumno_1 = new Alumno("Maria", "Pou", 24);
// echo $alumno_1->nombre_completo();

$alumno_1->matricular_curso($curso_PHP);
$alumno_1->matricular_curso($curso_HTML);
echo $alumno_1->mostrar_expediente();


$alumno_1->set_nombre('Joan');
$alumno_1->set_apellido("Garcia");
echo $alumno_1->nombre_completo();

// Instancia de la clase Alumno = OBJETO
$alumno_2 = new Alumno("Peter", "Jones", 22);
echo $alumno_2->nombre_completo();
echo "<br> El alumno 2 se llama " . $alumno_2->get_nombre();
