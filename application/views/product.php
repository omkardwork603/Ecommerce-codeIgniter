


<?php 


if ($this->session->userdata('pro_id')!='') {
    $pro_id = $this->session->userdata('pro_id');
    # code...
}else{

$this->session->set_userdata('pro_id',mt_rand(11111,99999));
   
}

 ?>


<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/tocly/layouts/5.3.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Nov 2023 08:52:23 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Dashboard | Tocly - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->


        <base href="http://localhost/CI_all_project/ecommerce_codeigniter/">
            
        <?php $this->load->view('links'); ?>

    </head>


                <?php $this->load->view('header'); ?>


            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <?php if($this->session->flashdata('succMsg')){?>
                        <div class="alert alert-success">
                            <?=$this->session->flashdata('succMsg')?>
                        </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('errMsg')){?>
                        <div class="alert alert-success">
                            <?=$this->session->flashdata('errMsg')?>
                        </div>
                    <?php } ?>

                        <!-- END ROW -->

                        <div class="row">
                           

                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                                <h4 class="card-title mb-0 flex-grow-1">Product</h4>
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                
                                            </div>
                                            <div class="card-body">
                                                
                                        <?=form_open_multipart()?>                                            
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                         <input type="number" class="form-control" id="" name="pro_id" readonly    
                                                          value="<?=set_value('pro_id',$pro_id)?>"  placeholder="product name">
                                                        <label for="floatingFirstnameInput">Product ID</label>
                                                    </div>
                                                    <?=form_error('pro_id')?>
                                                </div>




                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" onchange="get_categories(this.value)" name="category" id="floatingSelectGrid">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach($categories as $value) { ?>
                                                                <option value="<?=$value->cate_id?>"><?=$value->cate_name?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingSelectGrid">Category</label>
                                                    </div>
                                                <?=form_error('category')?>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select subcat" name="sub_category" id="floatingSelectGrid">
                                                            <option value="" selected>Select</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Sub Category</label>
                                                    </div>
                                                <?=form_error('sub_category')?>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="pro_name"   placeholder="">
                                                        <label for="floatingFirstnameInput">Product Name</label>
                                                    </div>
                                                    <?=form_error('pro_name')?>
                                                </div>




                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="brand"   placeholder="">
                                                        <label for="floatingFirstnameInput">Product Brand</label>
                                                    </div>
                                                    <?=form_error('brand')?>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" name="featured" id="floatingSelectGrid">
                                                            <option value="" selected>Select</option>
                                                            <option value="1">Deal of the Month</option>
                                                            <option value="0">New Arrival</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Featured</label>
                                                    </div>

                                                <?=form_error('featured')?>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-select" name="highlights" id="floatingSelectGrid">
                                                        </textarea>
                                                        <label for="floatingSelectGrid">HighLights</label>
                                                    </div>
                                                    <?=form_error('highlights')?>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-select" name="desc" id="floatingSelectGrid">
                                                        </textarea>
                                                        <label for="floatingSelectGrid">Description</label>
                                                    </div>
                                                    <?=form_error('desc')?>
                                                </div>

                                                <!-- new 3 -->



                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-select" name="meta_keywords" id="floatingSelectGrid">
                                                        </textarea>
                                                        <label for="floatingSelectGrid">Meta Keywords</label>
                                                    </div>
                                                <?=form_error('meta_keywords')?>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-select" name="meta_title" id="floatingSelectGrid">
                                                        </textarea>
                                                        <label for="floatingSelectGrid">Meta Title</label>
                                                    </div>
                                                <?=form_error('meta_title')?>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-select" name="meta_desc" id="floatingSelectGrid">
                                                        </textarea>
                                                        <label for="floatingSelectGrid">Meta Description</label>
                                                    </div>
                                                <?=form_error('meta_desc')?>
                                                </div>

                                                <!-- new 3 -->


                                                


                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="" name="stock"   placeholder="">
                                                        <label for="floatingFirstnameInput">Product Stock</label>
                                                    </div>
                                                    <?=form_error('stock')?>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="" name="mrp"   placeholder="">
                                                        <label for="floatingFirstnameInput">Product MRP</label>
                                                    </div>
                                                    <?=form_error('mrp')?>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="" name="selling_price"   placeholder="">
                                                        <label for="floatingFirstnameInput">Product Selling Price</label>
                                                    </div>
                                                    <?=form_error('selling_price')?>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" id="" name="pro_main_image" placeholder="">
                                                        <label for="floatingSelectGrid">Product Image</label>
                                                    </div>

                                                    <?=form_error('pro_main_image')?>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" id="" name="gallery_image" placeholder="">
                                                        <label for="floatingSelectGrid">Product Gallery Image</label>
                                                    </div>

                                                    <?=form_error('gallery_image')?>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" name="status" id="floatingSelectGrid">
                                                            <option value="" selected>Select</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactive</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Status</label>
                                                    </div>

                                                <?=form_error('status')?>
                                                </div>

                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        <?=form_close()?>
                                            
                                    </div>
                                        </div>
                                    </div>

                                   
                                </div>
                            </div>

                            

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
               

                <?php $this->load->view('footer'); ?>