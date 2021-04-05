 @extends('layouts.main')
 @section('content')
 <script>
$(document).ready(function() {
    $("#sidebarCollapse").on('click', function() {
        $("#sidebar").toggleClass('active');
    });
});
 </script>
 <div id="content-page" class="content-page">
     <div class="container-fluid">
         <div class="row">
             <div class="col-sm-12">
                 <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                        
                         </div>
                     </div>
                 
                 </div>
             </div>
         </div>
     </div>
 </div>

 @endsection