<?php
    class Population 
    {
        private $name;
        private $peoples;
        private $savePeople;
        private $saveIndex;
        public $selectedPeopleA;
        public $selectedPeopleB;

//12345 nouvelle branche
        public function __construct($name) 
        {
            $this->name=$name;
            for ($i=0;$i<10;$i++) {
                $this->peoples[$i]= new People(0);
                
            }
        }

        public function selectPeopleA()
        {
            $this->selectedPeopleA=$this->peoples[rand(0,count($this->peoples)-1)];
            return $this->selectedPeopleA;
        }
        public function selectPeopleB()
        {
            $this->selectedPeopleB=$this->peoples[rand(0,count($this->peoples)-1)];
            return $this->selectedPeopleB;
        }

        public function sumRich()
        {
            $tot = 0;
            foreach($this->peoples as $people) {
                $tot+=$people->getRich();
            }
            return $tot;
            
        }
        public function extractPeople($i)
        {
            $this->savePeople=$this->peoples[$i];
            $this->saveIndex=$i;
            unset($this->peoples[$i]);
        }
        
        public function restorePeople()
        {
            $newPeoples=[];
            for ($i=0;$i<$this->saveIndex;$i++){
                array_push($newPeoples,$this->peoples[$i]);
            }
            array_push($newPeoples,$this->savePeople);
            for($i=$this->saveIndex+1;$i<10;$i++){
                array_push($newPeoples,$this->peoples[$i]);
            }
            //var_dump($newPeoples);
            $this->peoples=$newPeoples;
            
            return $this;
        }

        
        public function getName()
        {
            return $this->name;
        }
        public function getPeople($i)
        {
            return $this->peoples[$i];
        }
        public function getPeoples() 
        {
            return $this->peoples;
        }

        
    }