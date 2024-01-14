<?= $this->extend('master/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- cuaca -->
        <div class="row justify-content-around">
            <div class="col-lg-9 col-6">
                <!-- small card -->
                <?php if ($is) : ?>

                    <div class="small-box bg-dark">
                        <div class="inner">

                            <img class="border rounded-top border-top-0 border-bottom-0 border-right-0 border-secondary pl-3 pt-2" src="<?= esc($weather['current']['condition']['icon']) ?>" alt="" srcset="">
                            <p class="border rounded-bottom border-top-0 border-bottom-0 border-right-0 border-secondary text-bold text-uppercase pl-4 pb-2"><?= esc($weather['current']['condition']['text']) ?></p>

                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <!-- small card -->
                                    <div class="small-box bg-dark border-top border-secondary shadow">
                                        <div class="col inner">
                                            <div class="row">
                                                <div class="col-12 col-md-4 col-lg-2">
                                                    <h3><?= esc($weather['current']['temp_c']) ?>℃</h3>

                                                    <p>Celcius</p>
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-2">
                                                    <h3><?= esc($weather['current']['temp_f']) ?>℉</h3>

                                                    <p>Fahrenheit</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon mx-5">
                                            <i class="fa fa-thermometer-three-quarters text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Info boxes -->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="info-box border-top border-secondary shadow">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-search-location"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Search</span>
                                            <span class="info-box-number">
                                                <?= esc($weather['location']['name']) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="info-box mb-3 border-top border-secondary shadow">
                                        <?php if (esc($weather['current']['is_day'])) : ?>
                                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-sun text-warning"></i></span>
                                        <?php else : ?>
                                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-moon text-warning"></i></span>
                                        <?php endif; ?>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Day</span>
                                            <span class="info-box-number">
                                                <?php if (esc($weather['current']['is_day'])) echo 'Daylight';  ?>
                                                <?php if (!esc($weather['current']['is_day'])) echo 'Night';  ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix hidden-md-up"></div>

                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="info-box mb-3 border-top border-secondary shadow">
                                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-map-marker-alt"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Region, Country</span>
                                            <span class="info-box-number"><?= esc($weather['location']['country']) . ', ' . esc($weather['location']['region']) ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="info-box mb-3 border-top border-secondary shadow">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-globe"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Timezone</span>
                                            <span class="info-box-number"><?= esc($weather['location']['tz_id']) ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <form action="weather" method="POST">
                            <?= csrf_field() ?>
                            <div class="input-group input-group-sm px-2 pb-2">
                                <input type="input" name="location" class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-sm fa-search"></i> Location</button>
                                </span>
                            </div>
                        </form>
                    </div>
                <?php else : ?>
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <!-- Info boxes -->
                            <div class="col-12 mt-3">
                                <div class="info-box border-top border-secondary shadow">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-search-location"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Search</span>
                                        <span class="info-box-number">
                                            <?= esc($location) ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <form action="/weather" method="POST">
                            <?= csrf_field() ?>
                            <div class="input-group input-group-sm px-2 pb-2">
                                <input type="input" name="location" class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-sm fa-search"></i> Location</button>
                                </span>
                            </div>
                        </form>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <!-- cuaca -->
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>