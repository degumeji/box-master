<?php 
      if(!isset($_SESSION['user'])){
          echo '
              <script>
                  $(document).ready(function (){
                      window.open("index.html","_self");
                  });
              </script>
              ';
              die();      
      }
  ?>