<?= $this->include('layouts/navbar') ?>

<div class="container mt-3">
 <div class="container">
    <div class="row"> 
        <div class="col-12">
            <form action="">
                <div class="form-group">
                  <i class="large material-icons form-control-feedback">search</i>
                  <input type="text" class="form-control search_event" placeholder="Search" onkeyup="myFunction()" id="search">
                </div>
            </form>
        </div>
    </div>
 </div>
 <!-- alert message success if user correctly information-->
 <?php if(session()->get('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" >
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    <?= session()->get('success') ?>
        </div>
<?php endif ?>
<?php if(session()->get('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
	    	<button type="button" class="close" data-dismiss="alert">&times;</button>
		    <?= session()->get('error')->listErrors() ?>
	</div>
<?php endif ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6">
            <h2 class="title-category">Categories</h2>
        </div>
        <div class="col-sm-6">
            <a type="button" class="btnCreateCategory btn btn-warning btn-md text-white font-weight-bolder float-right" data-toggle="modal" data-target="#addCategory">
                <i class="material-icons float-left" data-toggle="tooltip" title="Create Category!" data-placement="left">add</i>&nbsp;Create
            </a>
        </div>
    </div>
  
    <div class="row mt-5"​​​​​ ​​​​>
        <div class="col-sm-12 table-responsive">
            <table class="table table-hover table-borderless" id="table">
                 <?php foreach ($showCategory as $value):?>
                    <tbody>
                        <tr class='edit_hover_class'>
                            <td class="hide"><?= $value['category_id'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td  style="display:flex;justify-content:flex-end">
                            
                                <a href="" data-toggle="modal" data-target="#updateCategory"><i class="material-icons text-info editdata" data-toggle="tooltip" title="Edit Category!" data-placement="right">edit</i></a>
                                <a href="" data-toggle="modal" data-target="#removeCategory"><i class="material-icons text-danger deletedata" data-toggle="tooltip" title="Delete Category!" data-placement="right">delete</i></a>

                            </td>
                        </tr>
                    </tbody>

                <?php endforeach; ?>
            </table>
        </div>
    </div>

        <!--  end table for show category -->

        <!-- The Modal Create Category-->
        
        <div class="modal mt-3" id="addCategory">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <form action="<?= base_url("insertCategory")?>" method="post">
                            <input type="text" class="form-control" placeholder="Enter Category Name" name="name" id="name" >
                            <br>
                            <div class="float-right">
                                <a href="" class="text-uppercase text-dark">DISCARD</a>
                                <button type="submit" class="btn text-warning btn-link">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal create category -->


         <!-- The Modal Update Category-->
         <div class="modal mt-5" id="updateCategory">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="<?= base_url("updateCategory")?>" method="post">
                            <input type="hidden" id="update_id" name = "update_id" >
                            <input type="text" id="edit" class="form-control" placeholder="Enter Category Name" name="name">
                            <br>
                            <div class="float-right">
                                <a href="" class="text-uppercase text-dark">DISCARD</a>
                                <input type="submit" value="UPDATE" class="createBtn text-warning">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal update category -->


        <!-- The Modal Remove Category-->
        <div class="modal mt-5" id="removeCategory">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Remove Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <p>Are you sure you want to remove selected item ?</p>
                        <form action="<?= base_url(("admincontroller/deleteCategory"))?>" method="post">
                            <input type="hidden" id="delete_id" name = "delete_id" >
                            <br>
                            <div class="float-right">
                                <a href="" class="text-uppercase text-dark">DISCARD</a>
                                <button type="submit" class="btn text-warning btn-link">REMOVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal Remove Category-->
    </div>
</div>
</div>
