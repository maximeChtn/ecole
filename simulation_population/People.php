<?php
    class People
    {
        private $rich=20;
        private $lastMeet;
        private $index;
        
        public function __construct($i)
        {
            $this->index=$i;
        }


        public function __toString()
        {
            return $this->lastMeet->getName();
        }
        public function moveRich($sens){
            $moveRich=rand(1,5);
            switch($sens){
                case "+":
                    $this->rich+=$moveRich;
                    break;
                case "-":
                    $this->rich-=$moveRich;
                    break;
            }
        }

        public function getRich()
        {   
            return $this->rich; 
        }
        public function setLastMeet($people)
        {
            $this->lastMeet=$people;
        }
        public function getLastMeet()
        {
            return $this->lastMeet;
        }
        public function getIndex()
        {
            return $this->index;
        }
        public function setIndex($i)
        {
            $this->index=$i;
        }
    }