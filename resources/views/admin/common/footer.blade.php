<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> {{ config('constants.adminconst.adminVersion', 'Panart') }}
    </div>
    <strong>Copyright &copy; {{date('Y')}} - {{date('Y', strtotime('+1 years'))}} <a href="{{url('')}}">{{ config('constants.adminconst.admin_author', 'Panart') }}</a>.</strong> All rights
    reserved.
  </footer>

<script>
  $(document).ready(function(){
    //$('#example1').DataTable()


    $("#slug").on('change keyup paste',function(){
    var str = $(this).val().toLowerCase();

    $(this).val(str.replace(/ /g, '-'));
     })
})

  $(document).on("click",".actinact",function(){

        var current_ele = $(this);
        var current_id = $(this).attr('data-id');
        var current_val = $(this).attr('data-value');
        var current_tb = $(this).attr('data-tbl');
      
        $.ajax({
            type: "get",
            url:"{{ url('backend/statusupdate')}}/"+current_id+"/"+current_val+"/"+current_tb, 
            success: function( result ) {
                var obj = jQuery.parseJSON(result);
                $("#parentactive-"+current_id).html(obj.html);
            }
        });
      });
  $(document).ready(function(){
      
      $(".deleteconfirm").click(function(e){
        var conf = confirm("Are you really want to delete?");
        return conf;
      });
      
  });
</script>