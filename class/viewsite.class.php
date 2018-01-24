<?php

class viewsite {


    public function starthead()
        {
            echo'

                <!doctype html>
                <html lang="en">
                    <head>
                        <title>Magazyn 2</title>

                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                                
                        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
                        <link rel="stylesheet" type="text/css" href="/css/tablebootstrap.css">
                   
                        <script src="/js/jquery.1.12.4.js"></script>
                        <script src="/js/jquery.dataTables.js"></script>
                        <script src="/js/datatables.bootstrap.js"></script>

                     
                    </head>
                <body>
                <div class="container">


                ';


        }




     public function endhead()
        {

            echo'

              </div> <!-- /container -->  
              
               <footer class="container">
                     <p>&copy; Magazyn 2 Tusonic 2018</p>
               </footer>
               
        <!-- JAVA SCRIPT START  -->
              
               <script>
                 $(document).ready(function() {
            $(\'#table-full\').DataTable( {
                "pagingType": "full_numbers"
                       } );
                          } );
                </script>

        <!-- JAVA SCRIPT END  -->
 
                   
                     
                </body>
                </html>
                
            ';

        }


}
