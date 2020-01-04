/* Morris.js Charts */
  // Sales chart

  $(function () {

    // AREA CHART
    var area = new Morris.Area({
        element: 'chart-container',
        resize: true,
        data: $.parseJSON(MyFunction()),
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        lineColors: ['#a0d0e0', '#3c8dbc'],
        hideHover: 'auto'
    });

   
});

//   function MyFunction(JUMLAH_PL, BULAN) {                                               
//     $.ajax({
//         type: "GET",
//         url: "http://localhost:51028/api/dhpl/2",
//         data: "{ y: '" + BULAN+ "',item1: '" + JUMLAH_PL + "'}",
//         contentType: "application/json; charset=utf-8",
//         dataType: "json",
//         async: "true",
//         cache: "false",
//         success: function (msg) {
//             // On success    
//             data = msg.d;            
//         },
//         Error: function (x, e) {
//             // On Error
//             alert(e);
//         }
//     });
// }

// var data = JSON.parse('{{ $pl }}');
    
//     new Morris.Bar({
//         // ID of the element in which to draw the chart.
//         element: 'pl_chart',
//         data: data,
//         xkey: 'JumlahPL',
//         ykeys: ['BULAN'],
//         labels: ['TOTAL']
//     });




  var area = new Morris.Area({
    element   : 'revenue-chart',
    resize    : true,
    data      : [
      { y: '2011 Q1', item1: 2666, item2: 2666 },
      { y: '2011 Q2', item1: 2778, item2: 2294 },
      { y: '2011 Q3', item1: 4912, item2: 1969 },
      { y: '2011 Q4', item1: 3767, item2: 3597 },
      { y: '2012 Q1', item1: 6810, item2: 1914 },
      { y: '2012 Q2', item1: 5670, item2: 4293 },
      { y: '2012 Q3', item1: 4820, item2: 3795 },
      { y: '2012 Q4', item1: 15073, item2: 5967 },
      { y: '2013 Q1', item1: 10687, item2: 4460 },
      { y: '2013 Q2', item1: 8432, item2: 5713 }
    ],
    xkey      : 'y',
    ykeys     : ['item1', 'item2'],
    labels    : ['Item 1', 'Item 2'],
    lineColors: ['#a0d0e0', '#3c8dbc'],
    hideHover : 'auto'
  });