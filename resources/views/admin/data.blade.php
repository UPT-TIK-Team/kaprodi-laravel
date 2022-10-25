<div class="row">
  <div class="col-md">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Suara Masuk</span>
        <span class="info-box-number">
          <?php
          if (($sudahMemilih && $jumlahPemilih) > 0) {
            $hasil  = ($sudahMemilih / $jumlahPemilih) * 100;
            echo substr($hasil, 0, 4) . '<small>%</small>';
          } else {
            echo "0<small>%</small>";
          }
          ?>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-table"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pemilih</span>
        <span class="info-box-number">
          <?php
          if ($jumlahPemilih > 0) {
            echo $jumlahPemilih . "<small> Orang</small>";
          } else {
            echo "0 <small> Orang</small>";
          }
          ?>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Sudah Memlih</span>
        <span class="info-box-number">
          <?php
          if ($sudahMemilih > 0) {
            echo $sudahMemilih . "<small> Orang</small>";
          } else {
            echo "0 <small> Orang</small>";
          }
          ?>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Belum Memilih</span>
        <span class="info-box-number">
          <?php
          if ($belumMemilih > 0) {
            echo $belumMemilih . "<small> Orang</small>";
          } else {
            echo "0 <small> Orang</small>";
          }
          ?>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bar-chart"></i> Grafik Perolehan Suara</h3>
        <div class="input-group mb-3">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">Pilih Prodi</button>
          <ul class="dropdown-menu" style="height:20rem; overflow: scroll;">
            <?php foreach ($seluruhProdi as $prodi) : ?>
            <li><a class="dropdown-item" href="<?= base_url("/admin/index?prodi=") . base64_encode($prodi['nama']) ?>">
                <?= $prodi['nama'] ?>
              </a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
            <div class="chart">
              <div id="chart" style="height: 300px;"></div>
            </div>
          </div>
          <div class="col-md-4"><br>
            <div class="progress-group">
              <span class="progress-text">Suara Masuk</span>
              <?php
              if (($sudahMemilih && $jumlahPemilih) > 0) {
                $hasil  = ($sudahMemilih / $jumlahPemilih) * 100;
                echo "<span class='progress-number'><b>" . substr($hasil, 0, 4) . "</b>%</span>
                      <div class='progress sm'>
                        <div class='progress-bar progress-bar-aqua' style='width: " . substr($hasil, 0, 4) . "%''></div>
                      </div>";
              } else {
                echo "<span class='progress-number'><b>0</b>%</span>
                      <div class='progress sm'>
                        <div class='progress-bar progress-bar-aqua' style='width: 0%''></div>
                      </div>";
              }
              ?>
            </div><br>
            <div class="progress-group">
              <span class="progress-text">Jumlah Pemilih</span>
              <?php
              if ($jumlahPemilih > 0) {
                echo "<span class='progress-number'><b>" . $jumlahPemilih . "</b> Orang</span>";
              } else {
                echo "<span class='progress-number'><b>0</b> Orang</span>";
              }
              ?>
              <div class="progress sm">
                <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
              </div>
            </div><br>
            <div class="progress-group">
              <span class="progress-text">Sudah Memilih</span>
              <?php
              if ($sudahMemilih > 0) {
                echo "<span class='progress-number'><b>" . $sudahMemilih . "</b>/" . $jumlahPemilih . " Orang</span>";
              } else {
                echo "<span class='progress-number'><b>0</b> Orang</span>";
              }
              ?>
              <div class="progress sm">
                <?php
                if (($sudahMemilih && $jumlahPemilih) > 0) {
                  $hasil  = ($sudahMemilih / $jumlahPemilih) * 100;
                  echo "<div class='progress-bar progress-bar-green' style='width: " . substr($hasil, 0, 4) . "%''></div>";
                } else {
                  echo "<div class='progress-bar progress-bar-green' style='width: 0%''></div>";
                }
                ?>
              </div>
            </div><br>
            <div class="progress-group">
              <span class="progress-text">Belum Memilih</span>
              <?php
              if ($belumMemilih > 0) {
                echo "<span class='progress-number'><b>" . $belumMemilih . "</b>/" . $jumlahPemilih . " Orang</span>";
              } else {
                echo "<span class='progress-number'><b>0</b> Orang</span>";
              }
              ?>
              <div class="progress sm">
                <?php
                if (($belumMemilih && $jumlahPemilih) > 0) {
                  $hasil  = ($belumMemilih / $jumlahPemilih) * 100;
                  echo "<div class='progress-bar progress-bar-red' style='width: " . substr($hasil, 0, 4) . "%''></div>";
                } else {
                  echo "<div class='progress-bar progress-bar-red' style='width: 0%''></div>";
                }
                ?>
              </div>
            </div><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('#chart').highcharts({
      chart: {
        type: 'column'
      },
      title: {
        text: ''
      },
      xAxis: {
        type: 'category'
      },
      yAxis: {
        title: {
          text: ''
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
            format: '{point.y}'
          }
        }
      },

      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}'
      },

      series: [{
        name: 'Calon',
        colorByPoint: true,
        data: [
          <?php foreach ($perolehanSuara as $data) : ?> {
              name: "<?= $data['nama']; ?>",
              y: <?= $data['total_suara']; ?>,
            },
          <?php endforeach; ?>
        ]
      }]
    });
  });
</script>