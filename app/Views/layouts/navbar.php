<?= $this->extend('layouts/main')?>
<?= $this->section('content') ?>
<!-- user login show menu -->
<?php if(session()->get('isLoggedIn')) :?>
<nav class="navbar navbar-expand-sm navbar-light bg-warning">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
  <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("explore")?>">Explor event<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url("yourEvents")?>">Your event</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url("event")?>">Events</a>
          <a class="dropdown-item" href="<?= base_url("category")?>">Categories</a>
      </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- Get first name display in menu -->
            <?= $getUser['first_name'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profile">Profile</a>
          <a class="dropdown-item" href="<?= base_url("logout")?>">Logout</a>
      </div>
      </li>
    </ul>
    
  </div>
</nav>
<div class="container">

  <!-- The Modal -->
  <div class="modal fade" id="profile">
    <div class="modal-dialog modal-md">
      <div class="modal-content">    
        <!-- Modal body -->
       <div class="modal-header">
        <h4>Edit profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
        <div class="modal-body">
        <form  action="<?= base_url("updateProfile")?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
              <input type="hidden" name="id" value="<?= $getUser['id'] ?>" id="id">
                <input type="text" class="form-control" name="first_name" value="<?= $getUser['first_name'] ?>" placeholder="Enter first name" id="first_name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="last_name" value="<?= $getUser['last_name'] ?>" placeholder="Enter last name" id="last_name" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" value="<?= $getUser['email'] ?>" placeholder="Enter first name" id="email" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password"  placeholder="Enter password" id="password" required>
              </div>
              <div class="form-group">
                  <input type="date" name="date_of_birth" placeholder="Date Of Birth" value="<?= $getUser['date_of_birth'] ?>" class="form-control" id="date_of_birth" required>
              </div>  
              <div class="form-group">
                    <select class="form-control" name="city" id="city">
                      <option disabled selected>Choose Cities</option>
                      <?php foreach($dataJson as $values) :?>
                        <option ><?=  $values['city'].'  ,  '.$values['country'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="gender">Gender: </label>
                      <input type="radio" name="gender"  <?php if($getUser['gender']=="Male"){?> checked="checked" <?php } ?> value="Male" required >Male
                      <input type="radio" name="gender" <?php if($getUser['gender']=="Female"){?> checked="checked" <?php } ?> value="Female" required>Female
                        </div>
              
            </div>
            
            <div class="col-sm-4">
              <img src="/images/profile/<?= $getUser['profile'] ?>" id="images-profile" class="rounded-circle" alt="Add Profile" width="120" height="120" ><br><br><br>
                <div class="row">
                  <div class="image-upload" id="images-profile">
                    <input id="input-profile" type="file" name="profile">
                    <label for="input-profile">
                      <i class="material-icons text-primary">edit</i> &nbsp;
                    </label>  
                      <a href=""><i id="remove" class="material-icons text-danger">delete</i></a>
                  </div>
                </div>
              <div class="btnUpdateProfile">
                  <a data-dismiss="modal"  class="closeModal event">DISCARD</a>&nbsp;
                  <input type="submit"  value="UPDATE" class="updateProfile event text-warning">
              </div> 
            </div> 
          </div>
        </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?= $this->endSection() ?>