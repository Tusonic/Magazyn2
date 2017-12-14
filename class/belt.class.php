<?php

class belt extends conf  {

    public function test1()
    {
        echo 'tomek11';
    }

    public function test2()
    {
        echo 'tomek22';
    }


    public function viewbelt()
    {

        $stmt = $this->pdo->prepere('select * from belt');
        $stmt->execute();


        echo' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Type</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';
    }
}
