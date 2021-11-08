<?php

function sortPartiesCmp($a, $b) {
    if ($a['votes'] == $b['votes']) return 0;
    else return ($a['votes'] > $b['votes']) ? -1 : 1;
}
class Dhondt {
    //Se declaran públicos para poder asignarlos manualmente.
    public $seats = 0,$min = 0,$blankVotes = 0;

    //Se declaran privados para que no los pueda modificar nadie.
    private $votes = 0,$parties = array();

    //Ingestamos en el array cada partido con sus votos.
    public function addParty($id,$img,$acronym,$distrio_name,$ent,$votes) {
        $this->parties[] = array('id'=>$id,'img'=>$img,'acronym'=>$acronym,'district'=>$distrio_name,'ent'=>$ent,'votes'=>$votes,'seats'=>0,'ok'=>true);
        //Sumamos los votos totales.
        $this->votes += $votes;
    }
    public function process() {
        //Sumamos el total de votos en blanco con los votos totales distribuidos a los partidos.
        $this->totalVotes = ($this->blankVotes+$this->votes);

        //Calculamos el mínimo de votos que necesita un partido para obtener un escaño en base al 3%
        $minVotes = $this->totalVotes*$this->min/100;

        //Si el partido no llega al mínimo de votos, el "semaforo" se pone en rojo.
        foreach($this->parties as $p) { 
            if($p['votes'] <= $minVotes) $p['ok'] = false; 
        }

        //Recorremos tantos escaños tengamos para esa comunidad
        for($i = 0;$i<$this->seats;$i++) {
            foreach($this->parties as $id=>$p) { 
                if($p['ok'] && $p['votes'] / (1+$p['seats']) >@ $max[1]) 
                    $max = array($id,$p['votes']/(1+$p['seats'])); 
            }
            $this->parties[$max[0]]['seats']++;
            $max = array();
        }

        //Ordenamos los partidos en base a sus escaños.
        usort($this->parties, "sortPartiesCmp");
    }
    public function getParties() {
        return $this->parties;
    }
}

?>