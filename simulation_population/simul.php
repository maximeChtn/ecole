<?php
    require "People.php";
    require "Population.php";
    require "Meet.php";
    

    $meet=new Meet();
    



    
    //récupérer premier people dans population au hazard
    
    
    for ($i=1;$i<1000;$i++){
        $meet->meet();
    }
    echo "resultat : ".$meet->stat();
    

    


    function display($pops)
    {
        foreach ($pops as $pop) {
            echo $pop->getName()."<br/>";
            foreach ($pop->getPeoples() as $people) {
                echo "<span style='margin-left:20px'>".$people->getRich()."</span>last ; ".$people->getLastMeet()."<br/>";
            }
            echo "     ";
            echo "<br/>";
        }
    }

    