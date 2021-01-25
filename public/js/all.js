if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

$("#Nome").keyup(function(){

	$(this).val($(this).val().toUpperCase());
});

$(function () {

  $(".my-status").each(function () {
    var $el = $(this);
    var op = $el.text();
    switch (op) {
      case 'ativo':
        $el.html('<i class="fas fa-circle fa-small-size text-success" data-toggle="tooltip" data-placement="right" title="Ativo"></i> <span class="display">ativo</span>');
        break;
      case 'inativo':
        $el.html('<i class="fas fa-circle fa-small-size text-warning" data-toggle="tooltip" data-placement="right" title="Inativo"></i> <span class="display">inativo</span>');
        break;
      case 'bloqueado':
        $el.html('<i class="fas fa-circle fa-small-size text-danger" data-toggle="tooltip" data-placement="right" title="Bloqueado"></i> <span class="display">bloqueado</span>');
        break;
      default:
        break;
    }
  });

});

var cargo = $('select[name="id_cargo"] option');
$('select[name="id_setor"]').on('change', function () {
    var setor = this.value;
    var novoSelect = cargo.filter(function () {
        return $(this).data('position') == setor;
    });
    $('select[name="id_cargo"]').html(novoSelect);
});

$(document).ready(function() {
  $('#my-modal').modal('show');
});

$("form").submit(function() {

  function fieldCollection() {
    var x = document.forms[0];
    var txt = "";
    var i;
    for (i = 0; i < x.length; i++) {
      if (x.elements[i].value=="" || x.elements[i].value==0) {
        txt = txt + x.elements[i].id + "<br>";
      }
    }
    return txt;
  }

  var idForm = document.forms[0].id;

  switch (idForm) {
    case 'form-user-create':
      var txt = fieldCollection();
      var modal = txt > 0 || txt != "" ? true : false;
      var page = "href=\"\" data-dismiss=\"modal\"";
      break;
    case 'form-user-edit':
      var txt = fieldCollection();
      var modal = txt > 0 || txt != "" ? true : false;
      var page = "href=/user_edit/"+$("#Matrícula").val();
      break;        
    default:
      break;
  }

  if (modal == true) {

    var mensagem = '<span>Preencha todos os campos!<br><br>'+txt+'</span><br>';
    var janela = '<div class="modal fade" id="modal-warning" role="dialog"><div class="modal-dialog modal-dialog-centered" role="document">';
    janela += '<div class="modal-content"><div class="modal-header bg-warning"><h5 class="modal-title" id="modalLabel">Atenção</h5>';
    janela += '</div><div class="modal-body"><pre>';
    janela += mensagem;
    janela += '</pre></div><div class="modal-footer"><a class="btn btn-warning px-5" '+page+'>OK</a></div></div></div></div>';

    $("#modal-message").html(janela);

    $("#modal-warning").modal("show");

    return false;
  }
});


$("#btn-print").click(function(){
  window.print();
});


$("#btn-report").click(function () {

  var header = '<!DOCTYPE html><html lang="pt-br"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">';
  header += '<meta name="viewport" content="width=device-width, initial-scale=1"><title>SyntheticX</title><meta name="description" content="">';
  header += '<link rel="manifest" href="site.webmanifest"><link rel="apple-touch-icon" href="/images/icon.png">';
  header += '<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">';
  header += '<link rel="stylesheet" href="/css/normalize.css">';
  header += '<link rel="stylesheet" href="/css/report_print.css">';
  header += '<link rel="stylesheet" href="/fonts/fontawesome/css/all.css">';
  header += '</head><body><page size="A4" layout="landscape">';

  var content = $("#div-my-table").html();

  var footer = '</page><div id="page-content-footer" class="bg-secondary border-top fixed-bottom">';
  footer += '<h6 class="text-dark text-center pt-2">SyntheticX &copy; Estênio Mariano 2019</h6></div>';
  footer += '<script src="/js/popper.min.js"></script>';
  footer += '<script src="/js/jquery-3.4.1.min.js"></script>';
  footer += '<script src="/bootstrap/js/bootstrap.min.js"></script>';
  footer += '<script src="/js/jquery.tablesorter.min.js"></script>';
  footer += '<script src="/js/jquery.tablesorter.pager.js"></script>';
  footer += '<script src="/js/all.js"></script>';
  footer += '</body></html>';

  var page = header + content + footer;

  var w = window.open('', '_blank');
  w.document.write(page);
});


$(function () {

  // **********************************
  //  Description of ALL pager options
  // **********************************
  var pagerOptions = {

    // target the pager markup - see the HTML block below
    container: $(".pager"),

    // use this url format "http:/mydatabase.com?page={page}&size={size}&{sortList:col}"
    ajaxUrl: null,

    // modify the url after all processing has been applied
    customAjaxUrl: function (table, url) { return url; },

    // ajax error callback from $.tablesorter.showError function
    // ajaxError: function( config, xhr, settings, exception ) { return exception; };
    // returning false will abort the error message
    ajaxError: null,

    // add more ajax settings here
    // see http://api.jquery.com/jQuery.ajax/#jQuery-ajax-settings
    ajaxObject: { dataType: 'json' },

    // process ajax so that the data object is returned along with the total number of rows
    ajaxProcessing: null,

    // Set this option to false if your table data is preloaded into the table, but you are still using ajax
    processAjaxOnInit: true,

    // output string - default is '{page}/{totalPages}'
    // possible variables: {size}, {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
    // also {page:input} & {startRow:input} will add a modifiable input in place of the value
    // In v2.27.7, this can be set as a function
    // output: function(table, pager) { return 'page ' + pager.startRow + ' - ' + pager.endRow; }
    //output: '{startRow:input} – {endRow} / {totalRows} rows',
    //output: 'de {startRow} at&eacute; {endRow} / {totalRows} registros',
    output: 'Página {page} de {totalPages} &nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;&nbsp; {totalRows} registros localizados',

    // apply disabled classname (cssDisabled option) to the pager arrows when the rows
    // are at either extreme is visible; default is true
    updateArrows: true,

    // starting page of the pager (zero based index)
    page: 0,

    // Number of visible rows - default is 10
    //size: 10,
    size: 7,

    // Save pager page & size if the storage script is loaded (requires $.tablesorter.storage in jquery.tablesorter.widgets.js)
    savePages: true,

    // Saves tablesorter paging to custom key if defined.
    // Key parameter name used by the $.tablesorter.storage function.
    // Useful if you have multiple tables defined
    storageKey: 'tablesorter-pager',

    // Reset pager to this page after filtering; set to desired page number (zero-based index),
    // or false to not change page at filter start
    pageReset: 0,

    // if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
    // table row set to a height to compensate; default is false
    fixedHeight: true,

    // remove rows from the table to speed up the sort of large tables.
    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
    removeRows: false,

    // If true, child rows will be counted towards the pager set size
    countChildRows: false,

    // css class names of pager arrows
    cssNext: '.next', // next page arrow
    cssPrev: '.prev', // previous page arrow
    cssFirst: '.first', // go to first page arrow
    cssLast: '.last', // go to last page arrow
    cssGoto: '.gotoPage', // select dropdown to allow choosing a page

    cssPageDisplay: '.pagedisplay', // location of where the "output" is displayed
    cssPageSize: '.pagesize', // page size selector - select dropdown that sets the "size" option

    // class added to arrows when at the extremes (i.e. prev/first arrows are "disabled" when on the first page)
    cssDisabled: 'disabled', // Note there is no period "." in front of this class name
    cssErrorRow: 'tablesorter-errorRow' // ajax error information row

  };

  $("#my-table")

    // Initialize tablesorter
    // ***********************
    .tablesorter({
      //theme: 'blue',
      //widthFixed: true,
      //widgets: ['zebra', 'filter']
    })

    // bind to pager events
    // *********************
    .bind('pagerChange pagerComplete pagerInitialized pageMoved', function (e, c) {
      var msg = '"</span> event triggered, ' + (e.type === 'pagerChange' ? 'going to' : 'now on') +
        ' page <span class="typ">' + (c.page + 1) + '/' + c.totalPages + '</span>';
      $('#display')
        .append('<li><span class="str">"' + e.type + msg + '</li>')
        .find('li:first').remove();
    })

    // initialize the pager plugin
    // ****************************
    .tablesorterPager(pagerOptions);

  // Add two new rows using the "addRows" method
  // the "update" method doesn't work here because not all rows are
  // present in the table when the pager is applied ("removeRows" is false)
  // ***********************************************************************
  var r, $row, num = 50,
    row = '<tr><td>Student{i}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td><td><button type="button" class="remove" title="Remove this row">X</button></td></tr>' +
      '<tr><td>Student{j}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td><td><button type="button" class="remove" title="Remove this row">X</button></td></tr>';
  $('button:contains(Add)').click(function () {
    // add two rows of random data!
    r = row.replace(/\{[gijmr]\}/g, function (m) {
      return {
        '{i}': num + 1,
        '{j}': num + 2,
        '{r}': Math.round(Math.random() * 100),
        '{g}': Math.random() > 0.5 ? 'male' : 'female',
        '{m}': Math.random() > 0.5 ? 'Mathematics' : 'Languages'
      }[m];
    });
    num = num + 2;
    $row = $(r);
    $('table')
      .find('tbody').append($row)
      .trigger('addRows', [$row]);
    return false;
  });

  // Delete a row
  // *************
  $('table').delegate('button.remove', 'click', function () {
    var t = $('table');
    // disabling the pager will restore all table rows
    // t.trigger('disablePager');
    // remove chosen row
    $(this).closest('tr').remove();
    // restore pager
    // t.trigger('enablePager');
    t.trigger('update');
    return false;
  });

  // Destroy pager / Restore pager
  // **************
  $('button:contains(Destroy)').click(function () {
    // Exterminate, annhilate, destroy! http://www.youtube.com/watch?v=LOqn8FxuyFs
    var $t = $(this);
    if (/Destroy/.test($t.text())) {
      $('table').trigger('destroyPager');
      $t.text('Restore Pager');
    } else {
      $('table').tablesorterPager(pagerOptions);
      $t.text('Destroy Pager');
    }
    return false;
  });

  // Disable / Enable
  // **************
  $('.toggle').click(function () {
    var mode = /Disable/.test($(this).text());
    $('table').trigger((mode ? 'disable' : 'enable') + 'Pager');
    $(this).text((mode ? 'Enable' : 'Disable') + 'Pager');
    return false;
  });
  $('table').bind('pagerChange', function () {
    // pager automatically enables when table is sorted.
    $('.toggle').text('Disable Pager');
  });

  // clear storage (page & size)
  $('.clear-pager-data').click(function () {
    // clears user set page & size from local storage, so on page
    // reload the page & size resets to the original settings
    $.tablesorter.storage($('table'), 'tablesorter-pager', '');
  });

  // go to page 1 showing 10 rows
  $('.goto').click(function () {
    // triggering "pageAndSize" without parameters will reset the
    // pager to page 1 and the original set size (10 by default)
    // $('table').trigger('pageAndSize')
    //$('table').trigger('pageAndSize', [1, 10]);
    $('table').trigger('pageAndSize', [1, 7]);
  });

});