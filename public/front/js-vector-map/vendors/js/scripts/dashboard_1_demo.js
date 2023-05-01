$(function() {
    var a = {
            labels: ["Sunday", "Munday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: "Data 1",
                borderColor: 'rgba(52,152,219,1)',
                backgroundColor: 'rgba(52,152,219,1)',
                pointBackgroundColor: 'rgba(52,152,219,1)',
                data: [29, 48, 40, 19, 78, 31, 85]
            },{
                label: "Data 2",
                backgroundColor: "#DADDE0",
                borderColor: "#DADDE0",
                data: [45, 80, 58, 74, 54, 59, 40]
            }]
        },
        t = {
            responsive: !0,
            maintainAspectRatio: !1
        },
        e = document.getElementById("bar_chart").getContext("2d");
    new Chart(e, {
        type: "line",
        data: a,
        options: t
    });

    // World Map

    var mapData = []


    var countryDataForMap = []
    var countDataForMap = []
    var countryCodeDataForMap = []
    var latitudeDataForMap = []
    var longitudeDataForMap = []

    var Markers =[]

    axios.get('http://127.0.0.1:8000/countryTrackingForMap').then(function (res){
            mapData.push(res.data);
        for (let i=0; i< res.data.length ; i++){
            let v = {latLng: [parseInt(res.data[i]['latLng']), parseInt(res.data[i]['lonLng'])] , name: res.data[i]['name']+":"+parseInt(res.data[i]['count']) }
            Markers.push(v)
        }
    }).catch(function (err){
    })

    console.log(Markers)

  $('#world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    regionStyle: {
        initial: {
            fill: '#DADDE0',
        }
    },
    showTooltip: true,
    onRegionTipShowx: function(e, el, code){
        el.html(el.html()+' (Visits - '+mapData[code]+')');
    },
    markerStyle: {
      initial: {
        fill  : '#3498db',
        stroke: '#333'
      }
    },
   // markers: Markers
    markers: [
        {latLng:[23, 90],name:"BD"},
        {latLng:[40,-73],name:"US"},
    ]
  });





      var xaDeviceValues = [];
    var yaDeviceValues = [];

    axios.get('http://127.0.0.1:8000/getAllDevice').then(function (res){
        for (let i=0; i< res.data.length ; i++){
            xaDeviceValues.push(res.data[i]['device']);
            yaDeviceValues.push(res.data[i]['count']);
        }
    }).catch(function (err){
    })

  var doughnutData = {
      labels:xaDeviceValues,
      datasets: [{
          data: [30, 5, 2],
          backgroundColor: [
              'rgb(41,177,64)',
              'rgb(11,172,127)',
              'rgb(42,85,193)'
          ],
          hoverOffset: 4
      }]
  } ;
  var doughnutOptions = {
      responsive: true,
      legend: {
        display: false
      },
  };


  var ctx4 = document.getElementById("doughnut_chart").getContext("2d");
  new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});


});


