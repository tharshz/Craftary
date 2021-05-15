<!-- Jquery JS-->
<script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.j')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/select2.min.js')}}">
    <script src="{{asset('admin/js/bootbox.min.js')}}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></script>
    
    <script>
        $(document).on("click","#delete",function(e){
            e.preventDefault();
            var link =$(this).attr("href");
            bootbox.confirm("Do you really want to delete this ?",function(confirmed){
                if (confirmed)
                {
                    window.location.href = link;
                };
            });
        });

    </script>

    <!-- Main JS-->
    <script src="{{asset('admin/js/main.js')}}"></script>
    <script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });   
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</script>
 
    