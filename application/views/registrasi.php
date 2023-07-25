<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-6 col-md-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bikin Akun</h1>
                                    </div>
                                    <form method="post" action="<?php echo base_url('registrasi/index')?>" class="user">
                                <div class="form-group">
                                    <input type="text" autofocus class="form-control form-control-user" id="exampleInputEmail"placeholder="Nama" name="nama">
                                    <?php echo form_error('nama','<div class="text-danger small ml-2">','</div>');?>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Username" name="username">
                                        <?php echo form_error('username','<div class="text-danger small ml-2">','</div>');?>
                                </div>
                                <div class="form-group">                                        
                                    <input type="password" class="form-control form-control-user"id="exampleInputPassword" placeholder="Password" name="password">
                                    <?php echo form_error('password','<div class="text-danger small ml-2">','</div>');?>
                
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                                <hr>
                              
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                                    <hr>
                                   
                                    <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login');?>">Sudah Punya Akun </a>
                            </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</html>

