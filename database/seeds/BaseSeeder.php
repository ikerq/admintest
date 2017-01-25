<?php

use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;

/**
 *	Esta clase abstracta se encargará de ser una clase genérica que procesará
 *	los multiples datos de prueba. Sus métodos hijos de tipo "abstract" serán
 *	implementados obligatoriamente desde la clase hija declarándolos con los
 *	mismos parámetros pero siendo un método "public".
 */
abstract class BaseSeeder extends Seeder
{
    protected static $total = 50;
    protected static $pool = array();

    public function run()
    {
        $this->createMultiple($this->total);
    }
    /**
     * Crea multiples registros
     * el paremtro $total recibira un numero de registros a procesar.
     */
    protected function createMultiple($total, array $customValues = array())
    {
        for ($i = 1; $i <= $total; ++$i) {
            $this->create($customValues);
        }
    }

    /**
     * Se encarga de instanciar el modelo
     * metodo abstracto que deberá ser declarado en su clase hija obligatoriamente.
     */
    abstract public function getModel();

    /**
     * Recibe un arreglo de valores aleatorios ($faker) o personalizados ($customValues)
     * metodo abstracto que deberá ser declarado en su clase hija obligatoriamente.
     */
    abstract public function getDummyData(Generator $faker, array $customValue = array());

    /**
     * Metodo encargado de crear el registro en BD.
     */
    protected function create(array $customValues = array())
    {
        // Se envia el $customValues porque posiblemente se requiera traer valores personalizados
        // tal como el createAdmin, ademas de los valores del Faker
        $values = $this->getDummyData(Faker::create(), $customValues);

        // array_merge se encarga de hacer un merge entre dos arreglos de los
        // valores aleatorios del faker mas los valores personalizados.
        $values = array_merge($values, $customValues);

        return $this->addToPool($this->getModel()->create($values));

        // Este es el metodo create del ORM eloquent que se encuentra instaciado en la clase hija
        // Es el equivalente a decir User::create(['col1' => 'valor 1', 'col2' => 'valor 2'])
    }
    /**
     * Se encarga de crear registros de prueba desde otro seeder, asignado a la variable $seeder.
     */
    protected function createFrom($seeder, array $customValues = array())
    {
        $seeder = new $seeder();

        return $seeder->create($customValues);
    }

    /**
     * Se encarga de extraer un item aleatorio desde los modelos cargados anteriormente
     * segun se haya determinado en el llamado del seeder hijo, ejemplo:
     * $this->getRandom('User')->id ... extraera aleatoriamente un id creado en User.
     */
    protected function getRandom($model)
    {
        // Primero se verifica que este el modelo cargado en el
        // pool de lo contrario se arrojara una excepción
        if (!$this->collectionExist($model)) {
            throw new Exception("The $model collection does not exist");
        }

        return static::$pool[$model]->random();
    }

    /**
     * Se encarga de almacenar todos los modelos cargados en un pool
     * IMPORTANTE! Este método puede dejar sin memoria.
     */
    protected function addToPool($entity)
    {
        // ReflectionClass: una clase que obtiene mas separado la informacion de la clase
        // a partir de un objeto
        $reflection = new ReflectionClass($entity);
        $class = $reflection->getShortName();
        // get_class: Obtiene el namespace apartir de un objeto
        // ejemplo "TeachMe\Entities\User" namespace completo
        // $class = get_class($entity);
        // dd($class);

        if (!$this->collectionExist($class)) {
            //instancia la clase Collection muy practica que trae laravel
            static::$pool[$class] = new Collection();
        }
        //Se carga mediante "add()" el modelo que no estaba cargado al ir ejecutando los seeders
        static::$pool[$class]->add($entity);

        return $entity;
    }

    /**
     * Devuelve un true o false si existe o no la clase en el pool.
     */
    protected function collectionExist($class)
    {
        return isset(static::$pool[$class]);
    }
}
