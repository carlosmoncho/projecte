<?php
namespace BatoiPOP;
class Producte{
    private $id;
    private $name;
    private $features;

    public function __construct($id, $name, $features)
    {
        $this->id = $id;
        $this->name = $name;
        $this->features = $features;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFeatures()
    {
        return $this->features;
    }

}
