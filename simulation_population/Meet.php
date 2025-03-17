<?php
    class Meet extends Population
    {
        private $pops;
        private $populationA;
        private $populationB;

        public function __construct() {
            $this->pops[1] = new Population("bads");
            $this->pops[2] = new Population("goods");
            $this->pops[3] = new Population("resents");
        }

        public function stat() {
            foreach($this->pops as $pop){
                echo "Population: ".$pop->getName()." Richesse : ".$pop->sumRich()."<br/>";
            }
        }


        public function meet(){
            $this->populationA = $this->pops[rand(1,3)];
            $this->populationB = $this->pops[rand(1,3)];
            /*
            foreach($this->populationA->getPeoples() as $index => $people) {
                echo $this->populationA->getName()."  ".$index."=>".$people->getIndex()." ";
            }
            */
            //Sélection du premier people dans peoples
            $this->populationA->selectPeopleA();
            //echo "PeopleA selectionné : ".$this->populationA->selectedPeopleA->getIndex();
            $this->populationA->extractPeople($this->populationA->selectedPeopleA->getIndex());
            //echo "<br/>";
            /*
            foreach($this->populationA->getPeoples() as $index=> $people) {
                echo $this->populationA->getName()."  ".$index."=>".$people->getIndex()." ";
            }
            echo "<br/>";
            */
            $this->populationA->restorePeople();
            /*
            foreach($this->populationA->getPeoples() as $index => $people) {
                echo $this->populationA->getName()."  ".$index."=>".$people->getIndex()." ".$people->getRich();
            }
            echo "<br/>";
            */
            $this->populationB->selectPeopleB();
            /*
            foreach($this->populationB->getPeoples() as $index => $people) {
                echo $this->populationB->getName()."  ".$index."=>".$people->getIndex()." ".$people->getRich();
            }
            */
            //echo "<br/>";
            //echo "PeopleB selectionné : ".$this->populationB->selectedPeopleB->getIndex();

            switch ($this->populationA->getName()) {
                case "goods":
                    switch ($this->populationB->getName()){
                        case "goods":
                            //echo $this->getMeeting()."goods vs goods <br/>";
                            $this->populationA->selectedPeopleA->moveRich("+");
                            $this->populationB->selectedPeopleB->moveRich("+");
                            break;
                        case "bads":
                            //echo $this->getMeeting()."goods vs bads <br/>";
                            $this->populationA->selectedPeopleA->moveRich("-");
                            $this->populationB->selectedPeopleB->moveRich("+");
                            break;
                        case "resents":
                            //echo $this->getMeeting()."goods vs resents <br>";
                            $this->populationA->selectedPeopleA->moveRich("+");
                            $this->populationB->selectedPeopleB->moveRich("+");
                            break;
                        default:
                        die("Erreur fatale nom populationB inconu"); 
                    }
                    break;
                case "bads":
                    switch ($this->populationB->getName()){
                        case "goods":
                            //echo $this->getMeeting()."badds vs goods <br/>";
                            $this->populationA->selectedPeopleA->moveRich("-");
                            $this->populationB->selectedPeopleB->moveRich("+");
                            break;
                        case "bads":
                            //echo $this->getMeeting()."bads vs bads <br/>";
                            $this->populationA->selectedPeopleA->moveRich("-");
                            $this->populationB->selectedPeopleB->moveRich("-");
                            break;
                        case "resents":
                            if ($this->populationB->selectedPeopleB->getLastMeet() && $this->populationA->selectedPeopleA->getIndex()==$this->populationB->selectedPeopleB->getLastMeet()->getIndex()) {
                                $this->populationA->selectedPeopleA->moveRich("-");
                                $this->populationB->selectedPeopleB->moveRich("+");
                                
                            }
                            else {
                                $this->populationA->selectedPeopleA->moveRich("+");
                                $this->populationB->selectedPeopleB->moveRich("-");
                            }
                            //echo $this->getMeeting()."bads vs resents <br>";
                            
                            break;
                        default:
                        die("Erreur fatale nom populationB inconu"); 
                    }
                    break;
                case "resents":
                    switch ($this->populationB->getName()){
                        case "goods":
                            //echo $this->getMeeting()."resents vs goods <br/>";
                            $this->populationA->selectedPeopleA->moveRich("+");
                            $this->populationB->selectedPeopleB->moveRich("+");
                            break;
                        case "bads":
                            //echo $this->getMeeting()."resents vs bads <br/>";
                            if ($this->populationA->selectedPeopleA->getLastMeet() && $this->populationB->selectedPeopleB->getIndex()==$this->populationA->selectedPeopleA->getLastMeet()->getIndex()) {
                                $this->populationA->selectedPeopleA->moveRich("+");
                                $this->populationB->selectedPeopleB->moveRich("-");
                                
                            }
                            else {
                                $this->populationA->selectedPeopleA->moveRich("-");
                                $this->populationB->selectedPeopleB->moveRich("+");
                            }
                            break;
                        case "resents":
                            //echo $this->getMeeting()."resents vs resents <br>";
                            $this->populationA->selectedPeopleA->moveRich("+");
                            $this->populationB->selectedPeopleB->moveRich("+");
                            break;
                        default:
                        die("Erreur fatale nom populationB inconu"); 
                    }
                    break;
                default:  
                    die("Erreur fatale nom populationA inconu");    
            }
            $this->populationA->selectedPeopleA->setLastMeet($this->populationB->selectedPeopleB);
            $this->populationB->selectedPeopleB->setLastMeet($this->populationA->selectedPeopleA);
            foreach($this->populationA->getPeoples() as $index => $people) {
                //echo $this->populationA->getName()."  ".$index."=>".$people->getIndex()." ".$people->getRich();
            }
            //echo $this->populationA->selectedPeopleA->getIndex()."last meeting : ".$this->populationA->selectedPeopleA->getLastMeet()->getIndex()."<br/>";
            //echo "<br/>";
            foreach($this->populationB->getPeoples() as $index => $people) {
                //echo $this->populationB->getName()."  ".$index."=>".$people->getIndex()." ".$people->getRich();
            }
            //echo "<br/>";
            
            
        }
        public function getMeeting() {
            return $this->populationA->selectedPeopleA->getIndex()."<=>".$this->populationB->selectedPeopleB->getIndex();
        }
    }

