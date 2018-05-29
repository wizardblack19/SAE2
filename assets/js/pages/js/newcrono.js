
$(function() {

    Dropzone.autoDiscover = false;

    // Add data for multiple examples
    var car_data = [
        {car: "Mercedes G 500", year: 2009, price_usd: 32500, price_eur: 32500, share: 0.64},
        {car: "Chevrolet Camaro", year: 2011, price_usd: 42400, price_eur: 42400, share: 0.37},
        {car: "Dodge Charger", year: 2010, price_usd: 24900, price_eur: 24900, share: 0.33},
        {car: "Hummer H3", year: 2006, price_usd: 54000, price_eur: 54000, share: 0.15},
        {car: "Chevrolet Tahoe", year: 2012, price_usd: 29300, price_eur: 29300, share: 0.27},
        {car: "Toyota Land Cruiser", year: 2011, price_usd: 54500, price_eur: 54500, share: 0.43},
        {car: "Nissan GTR", year: 2010, price_usd: 44900, price_eur: 44900, share: 0.35},
        {car: "Porsche Cayenne", year: 2013, price_usd: 35000, price_eur: 35000, share: 0.63},
        {car: "Volkswagen Touareg", year: 2012, price_usd: 41000, price_eur: 41000, share: 0.15},
        {car: "BMW X5", year: 2014, price_usd: 48800, price_eur: 48800, share: 0.35}
        ];

    // Dropdown type
    // ------------------------------
    // Years selection
    var years = ['Imagen .xls', '2006'],
        year,
        yearData = [];
    while (year = years.shift()) {
        yearData.push([
            [year]
        ]);
    }

/*
var
    $$ = function(id) {
      return document.getElementById(id);
    },
    container = $$('cronograma'),
    exampleConsole = $$('example1console'),
    autosave = $$('autosave'),
    load = $$('load'),
    save = $$('save'),
    autosaveNotification,
    hot;



    // Define element
    var hot_dropdown = document.getElementById('cronograma');
    // Initialize with options
    var hot_dropdown_init = new Handsontable(hot_dropdown, {
        startRows: 10,
        startCols: 6,
        colWidths: [150,150,150 ],
        colHeaders: ['Actividad', 'Descripción', 'Rúbrica', 'Pag', 'Fecha', 'Pts','File'],
        stretchH: 'all',
        rowHeaders: true,
        columns: [
            {},
            {},
            {},
            {},
            {},
            {},
            {                
                type: 'dropdown',
                source: yearData}


        ],



    afterChange: function (change, source) {
      if (source === 'loadData') {
        return; //don't save this change
      }
      if ($('#autosave').prop('checked')) {
        return;
      }
      clearTimeout(autosaveNotification);
      

$("#example1console").html(JSON.stringify({data: change}));//alert(JSON.stringify({change}));



      },











    });

*/


let unidad = unidad => cargarcookie();



var
  $container = $("#cronograma"),
  $console = $("#exampleConsole"),
  $parent = $container.parent(),
  autosaveNotification,
  hot;

hot = new Handsontable($container[0], {
        startRows: 10,
        startCols: 6,
        colWidths: [150,150,150 ],
        colHeaders: ['Actividad', 'Descripción', 'Rúbrica', 'Pag', 'Fecha', 'Pts','File'],
        stretchH: 'all',
        rowHeaders: true,
        columns: [
            {},
            {},
            {},
            {},
            {},
            {},
            {                
                type: 'dropdown',
                source: yearData}


        ],
  afterChange: function (change, source) {
    var data;

    if (source === 'loadData' || $('#autosave').prop('checked')) {
      return;
    }
    data = change[0];

    // transform sorted row to original row
    //data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

    clearTimeout(autosaveNotification);
    $.ajax({
      url: 'core.php?l=SaveIndividualCrono',
      dataType: 'json',
      type: 'POST',
      data: {changes: change, unidad: unidad}, // contains changed cells' data
      success: function () {
        $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');

        autosaveNotification = setTimeout(function () {
          $console.text('Changes will be autosaved');
        }, 1000);
      }
    });
  }
});

$parent.find('button[name=load]').click(function () {
  $.ajax({
    url: 'php/load.php',
    dataType: 'json',
    type: 'GET',
    success: function (res) {
      var data = [], row;

      for (var i = 0, ilen = res.cars.length; i < ilen; i++) {
        row = [];
        row[0] = res.cars[i].manufacturer;
        row[1] = res.cars[i].year;
        row[2] = res.cars[i].price;
        data[res.cars[i].id - 1] = row;
      }
      $console.text('Data loaded');
      hot.loadData(data);
    }
  });
}).click(); // execute immediately

$('button[name=save]').click(function () {
  $.ajax({
    url: 'core.php?l=SaveIndividualCrono',
    data: {data: hot.getData()}, // returns all cells' data
    dataType: 'json',
    type: 'POST',
    success: function (res) {
      if (res.result === 'ok') {
        $console.text('Data saved');
      }
      else {
        $console.text('Save error');
      }
    },
    error: function () {
      $console.text('Save error');
    }
  });
});

$parent.find('button[name=reset]').click(function () {
  $.ajax({
    url: 'php/reset.php',
    success: function () {
      $parent.find('button[name=load]').click();
    },
    error: function () {
      $console.text('Data reset failed');
    }
  });
});

$parent.find('input[name=autosave]').click(function () {
  if ($(this).is(':checked')) {
    $console.text('Changes will be autosaved');
  }
  else {
    $console.text('Changes will not be autosaved');
  }
});





























    // Handsontable type
    // ------------------------------


    // Multiple files
    $("#files_multiple").dropzone({
        paramName: "file", // The name that will be used to transfer the file
        dictDefaultMessage: 'Arrastre sus archivos <span>o CLICK AQUÍ</span>',
        maxFilesize: 5 // MB
    });






    $('#save').click(function () {
        var handsontable1 = $hot_dropdown.data('cronograma');
        //$('#items').val(JSON.stringify(handsontable1.getData()));
       alert(JSON.stringify(handsontable1.getData()));


    });







/*
var
    $$ = function(id) {
      return document.getElementById(id);
    },
    container = $$('cronograma'),
    exampleConsole = $$('example1console'),
    autosave = $$('autosave'),
    load = $$('load'),
    save = $$('save'),
    autosaveNotification,
    hot;

  hot = new Handsontable(container, {
    startRows: 10,
    startCols: 6,
    rowHeaders: true,
    colHeaders: true,
    afterChange: function (change, source) {
      if (source === 'loadData') {
        return; //don't save this change
      }
      if (!autosave.checked) {
        return;
      }
      clearTimeout(autosaveNotification);
      ajax('scripts/json/save.json', 'GET', JSON.stringify({data: change}), function (data) {
        exampleConsole.innerText  = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
        autosaveNotification = setTimeout(function() {
          exampleConsole.innerText ='Changes will be autosaved';
        }, 1000);
      });
    }
  });

  Handsontable.Dom.addEvent(load, 'click', function() {
    ajax('load.json', 'GET', '', function(res) {
      var data = JSON.parse(res.response);

      hot.loadData(data.data);
      exampleConsole.innerText = 'Data loaded';
    });
  });

  Handsontable.Dom.addEvent(save, 'click', function() {
    // save all cell's data
    ajax('scripts/json/save.json', 'GET', JSON.stringify({data: hot.getData()}), function (res) {
      var response = JSON.parse(res.response);

      if (response.result === 'ok') {
        exampleConsole.innerText = 'Data saved';
      }
      else {
        exampleConsole.innerText = 'Save error';
      }
    });
  });

  Handsontable.Dom.addEvent(autosave, 'click', function() {
    if (autosave.checked) {
      exampleConsole.innerText = 'Changes will be autosaved';
    }
    else {
      exampleConsole.innerText ='Changes will not be autosaved';
    }
  });



*/








});


