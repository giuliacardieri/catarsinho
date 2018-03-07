$( document ).ready(function(){
	$('.modal').modal();

  $('ul.tabs').tabs();

  /* signup */
  $('.signup-form').on('submit', function(e){
    e.preventDefault();
      $.ajax({
          type: 'POST',
          url: $('.signup-form').data('href'),
          data: $('.signup-form').serialize(),
          success: function() {
            console.log('cadastro efetuado com sucesso :D');
            $.get( $('.btn--signup').data('href'), function(data) {
				      $('.login-content').html(data);
				    });
            $.get( $('.tabs-wrapper').data('href'), function(data) {
				      $('.tabs-wrapper').html(data);
				    });
          }
      });
  });

  /* login */
	$('.btn--login').on('click', function() {
		$('.login-form').submit();
	});

  $('.login-form').on('submit', function(e){
    e.preventDefault();
      $.ajax({
          type: 'POST',
          url: $('.login-form').data('href'),
          data: $('.login-form').serialize(),
          success: function() {
            console.log('login efetuado com sucesso :D');
            $.get( $('.btn--login').data('href'), function(data) {
				      $('.login-content').html(data);
				    });
            $.get( $('.tabs-wrapper').data('href'), function(data) {
				      $('.tabs-wrapper').html(data);
				    });
          }
      });
  });	

  /* logout */
  $('.nav-wrapper').on('click', '.btn--logout', function(e) {
  	e.preventDefault();
    $.get( $('.btn--logout').attr('href'), function(data) {
      $('.login-content').html(data);
			$('.tabs-wrapper').html('');
      console.log('logout efetuado com sucesso :D');
    });
    $('a.tab--all_projects').trigger('click');
  });

  /* add project */
  $('.add-form').on('submit', function() {
  	console.log('submitted!');
  	$(this).ajaxSubmit({
  		success: function() {
  			console.log('projeto adicionado com sucesso :D');
        $.get( $('.btn--add').data('href'), function(data) {
		      $('.cards-wrapper').html(data);
  			});
      }
  	});
  	return false;
  });

  /* edit project */
  $('.cards-wrapper').on('click', '.btn--edit', function(e) {
  	e.preventDefault();
    $.get( $(this).data('href'), function(data) {
      $('.modalEdit-content').html(data);
      $('input#title_edit, textarea#description_edit').characterCounter();
      Materialize.updateTextFields();
  		$('#modalEdit').modal('open');
    });
  });

  $('.edit-form').on('submit', function() {
  	console.log('edit form submitted!');
  	$(this).ajaxSubmit({
  		success: function() {
  			console.log('projeto atualizado com sucesso :D');
        $.get( $('.btn--edit-project').data('href'), function(data) {
		      $('.cards-wrapper').html(data);
  			});
      }
  	});
  	return false;
  });

  /* delete project */
  $('.cards-wrapper').on('click', '.btn--delete', function(e) {
  	e.preventDefault();
    $.get( $(this).data('href'), function(data) {
      $('#modalDelete').html(data); 
      $('.modal').modal();
  		$('#modalDelete').modal('open');
    });
  });

  $('#modalDelete').on('click', '.btn--delete-project', function(e) {
    e.preventDefault();
    var project_id = ($(this).attr('href')).split('/');
    $.ajax({
      type: 'POST',
      url: $(this).attr('href'),
      data: { id : project_id[project_id.length - 1]} ,
      success: function(data){
        $.get( $('.tab--user_projects').attr('href'), function(data) {
          $('.cards-wrapper').html(data);
        });
      }
     })
  });

  /* change project views */
  $(document).on('click', 'a.tab--all_projects', function(e) {
  	e.preventDefault();
  	$('.tab a').removeClass('active');
  	$(this).addClass('active');
    $.get( $('.tab--all_projects').attr('href'), function(data) {
      $('.cards-wrapper').html(data);
      console.log('Todos os projetos');
    });
  });

  $(document).on('click', 'a.tab--user_projects', function(e) {
  	e.preventDefault();
  	$('.tab a').removeClass('active');
  	$(this).addClass('active');
    $.get( $('.tab--user_projects').attr('href'), function(data) {
      $('.cards-wrapper').html(data);
      console.log('Projetos do usuário');
    });
  });

  /* visualize project */
  $('.cards-wrapper').on('click', '.card-content, .card-image', function() {
    $.get( $(this).parent().data('href'), function(data) {
      $('#modalVisualize').html(data); 
      $('.modal').modal();
      $('#modalVisualize').modal('open');
    });
  });

});