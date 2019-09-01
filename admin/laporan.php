<br><div class="panel panel-primary">
	<div class="panel-heading" style="font-size:25px; text-align:center; background-color: #217693;">Laporan</div>
	
	<div class="panel-body">
		<div class="row">
			<div id="print">
			<div class="col-md-12">
				<div class="thumbnail">
					<div class="caption" style="color:grey; text-align:center;">
						<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail">
					<div class="caption" style="color:grey; text-align:center;">
						<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail">
					<div class="caption" style="color:grey; text-align:center;">
						<div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
				</div>
			</div>

			</div>

		 <ul class="pager">
			<li ><input type="submit" class="btn btn-info" value="Print Report" onclick="PrintElem('#print')"></li>
		</ul> 
		
	</div>
</div>

<script src="../js/highcharts.js"></script>
<script src="../js/data.js"></script>
<script src="../js/drilldown.js"></script>
<script type="text/javascript">

function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=600,width=800');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }




	// Create the chart
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Total Jumlah yang sudah di ambil'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total Jumlah'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> of total<br/>'
  },

  series: [
    {
      name: "Surat",
      colorByPoint: true,
      data: [
        <?php foreach ($pengajuan->getDataJenis() as $key => $value) {
        	$jml = $pengajuan->getJumlahSudahDiambil($value['id_jenis']);
        ?>
        {
          name: "<?= $value['nama_jenis']?>",
          y: <?= $jml['jml']?>
        },
    <?php }?>
      ]
    }
  ]
});


	// Create the chart
Highcharts.chart('container2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Total Jumlah yang sudah selesai'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total Jumlah'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> of total<br/>'
  },

  series: [
    {
      name: "Surat",
      colorByPoint: true,
      data: [
        <?php foreach ($pengajuan->getDataJenis() as $key => $value) {
        	$jml = $pengajuan->getJumlahSudahSelesai($value['id_jenis']);
        ?>
        {
          name: "<?= $value['nama_jenis']?>",
          y: <?= $jml['jml']?>
        },
    <?php }?>
      ]
    }
  ]
});

	// Create the chart
Highcharts.chart('container3', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Total Jumlah yang belum selesai'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total Jumlah'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> of total<br/>'
  },

  series: [
    {
      name: "Surat",
      colorByPoint: true,
      data: [
        <?php foreach ($pengajuan->getDataJenis() as $key => $value) {
        	$jml = $pengajuan->getJumlahBelumSelesai($value['id_jenis']);
        ?>
        {
          name: "<?= $value['nama_jenis']?>",
          y: <?= $jml['jml']?>
        },
    <?php }?>
      ]
    }
  ]
});

</script>