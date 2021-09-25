<?php
class Telefon{
    private $id;
    private $model;
    private $ram;
    private $procesor;
    private $baterija;
    private $kamera;
    private $cena;
    private $slika;
    private $marka_id;

    public function __construct( $id, $procesor, $baterija, $kamera,  $model,  $ram, $cena, $slika, $marka_id)
    {
        $this->id=$id;
        $this->model=$model;
        $this->ram=$ram;
        $this->procesor=$procesor;
        $this->baterija=$baterija;
        $this->kamera=$kamera;
        $this->cena=$cena;
        $this->slika=$slika;
        $this->marka_id=$marka_id;
    }

    function getId(){
        return $this->id;
    }
    function getmodel(){
        return $this->model;
    }
    function getRam(){
        return $this->ram;
    }
    function getProcesor(){
        return $this->procesor;
    }
    function getBaterija(){
        return $this->baterija;
    }
    function getKamera(){
        return $this->kamera;
    }
    function getcena(){
        return $this->cena;
    }
    function getslika(){
        return $this->slika;
    }
    function getMarka(){
        return $this->marka_id;
    }

}

?>