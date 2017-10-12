<html lang="en">
<!-- laravel/resources/views/app.blade.php  -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale-1">
  <title>Laravel Ajax Crud</title>

  <link rel="stylesheet"  href="/css/bootstrap.min.css">
  <link rel="stylesheet"  href="/css/font-awesome.min.css">

</head>
<body>
  <div  class="container">
    @yield('content')
  </div>

  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>


  <script type="text/javascript">
//dialog popup ajax dengan modal & function untuk edit
  $(document).on('click', '.edit-modal', function() {
  $('#footer_action_button').text(" Update");
  $('#footer_action_button').addClass('glyphicon-check');
  $('#footer_action_button').removeClass('glyphicon-trash');
  $('.actionBtn').addClass('btn-success');
  $('.actionBtn').removeClass('btn-danger');
  $('.actionBtn').addClass('edit');
  $('.modal-title').text('Edit');
  $('.deleteContent').hide();
  $('form-horizontal').show();
  $('#fid').val($(this).data('id'));
  $('#judulyogiawx').val($(this).data('judulyogiaw'));
  $('#deskripsiyogiawx').val($(this).data('deskripsiyogiaw'));
  $('#myModal').modal('show');
  });
      $('.modal-footer').on('click','.edit', function() {
      $.ajax({
        type: 'post',
        url: '/editItemyogi',
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('#fid').val(),
          'judulyogiaw': $('#judulyogiawx').val(),
          'deskripsiyogiaw': $('#deskripsiyogiawx').val()
        },
        success: function(data) {
         $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.judulyogiaw + "</td><td>" + data.deskripsiyogiaw + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-judulyogiaw='" + data.judulyogiaw + "' data-deskripsiyogiaw ='" + data.deskripsiyogiaw  + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-judulyogiaw='" + data.judulyogiaw + "' data-deskripsiyogiaw='" + data.deskripsiyogiaw + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
     }
      });
    });

//tambah
          $("#addyogi").click(function(){
            $.ajax({
                type: 'post',
                url: '/addItemyogi',
                data: {
                  '_token' : $('input[name=_token]').val(),
                  'judulyogiaw' : $('input[name=judulyogiaw]').val(),
                  'deskripsiyogiaw' : $('input[name=deskripsiyogiaw]').val()
                },
                success: function(data){
                  if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.error.judulyogiaw);
                    $('.error').text(data.error.deskripsiyogiaw);
                  } else {
                    $('.error').remove();
                    $('#table').append("<tr class='item" + data.id + "'><td>"+ data.id +"</td><td>"+ data.judulyogiaw +"</td><td>"+ data.deskripsiyogiaw +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-judulyogiaw='"+ data.judulyogiaw +"' data-deskripsiyogiaw='" + data.deskripsiyogiaw + "'><span class='glyphicon glyphicon-edit'></span> Edit</button><button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-judulyogiaw='"+ data.judulyogiaw +"' data-deskripsiyogiaw='"+ data.deskripsiyogiaw +"'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                  }
                },
            });
            $('#judulyogiawx').val('');
            $('#deskripsiyogiawx').val('');
            $('input[type="text"],textarea').val('');
          });

//dele
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Delete");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Delete');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.judulyogiaw').html($(this).data('judulyogiaw'));
$('#myModal').modal('show');
});
    $('.modal-footer').on('click','.delete', function() {
    $.ajax({
      type: 'post',
      url: '/deleteItemyogi',
      data: {
        '_token': $('input[name=_token]').val(),
        'id': $('.id').text()
      },
      success: function(data) {
        $('.item' + $('.id').text()).remove();
      }
    });
  });
  </script>
</body>
</html>
