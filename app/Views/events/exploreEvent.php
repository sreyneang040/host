<?= $this->include('layouts/navbar') ?>

<br>
<div class="container ">
            
        <!-- form -->
        <form>
            <div class="form-row">

                <div class="form-group col-md-5">
                    <div class="form-group">
                        <i class="large material-icons form-control-feedback">search</i>
                        <input type="text" class="form-control search_event" id="searchEvent" placeholder="Search">
                    </div>
                </div>

                <div class="col-md-2 mt-2">
                    <span>Not too far from</span>
                </div>

                <div class="form-group col-md-5">
                    <div class="form-group">
                        <select name="" id="" class="form-control search_event">
                            <option>cambodia</option>
                            <option>cambodia</option>
                            <option>cambodia</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Event you join only
                </label>
                </div>
            </div>
        </form>
        <!-- end form -->
</div>



<div class="container mt-5">
<ul class="nav nav-tabs">
    <li class="nav-item event ">
      <a class="nav-link active" href="#menu1">CARDS</a>
    </li>
    <li class="nav-item calendar">
      <a class="nav-link" href="#menu2">CALENDAR</a>
    </li>
</ul>
<br>
<div class="tab-content">
    <div id="menu1" class="container tab-pane active"><br>
    <?php foreach($eventData as $values) :?>
        <?php               
            $date = date('Y-m-d');          
        ?>
        <?php  if ($values['end_date'] >= $date): ?>
       
        <?php $date = new DateTime($values['start_date']);?>
        <?= date_format($date, 'l/d/F/Y'); ?>
        
        <div class="card mt-4 card-explore" id="event" data-toggle="modal" data-target="#exampleModalCenter">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <br>
                        <br>
                        <?php $date = new DateTime($values['start_time']);?>
                        <?= date_format($date, 'g:i A'); ?>
                    </div>
                    <div class="col-sm-4"  data-toggle="modal"  data-target="#eventDetail">
                        <p><?= $values['name']; ?></p>
                        <h2><?= $values['title']; ?></h2>
                        <span>4 member going</span>
                    </div>
                    <div class="col-sm-3" data-toggle="modal"  data-target="#eventDetail">
                        <br>
                        <div class="text-center" data-toggle="modal"  data-target="#eventDetail">
                        <img src="images/event_image/<?= $values['image']; ?>" class="rounded img-explore" alt=""> 
                        </div>
                    </div>
                    <div class="col-sm-2" data-toggle="modal">
                        <br>
                        <button class="btn btn-sm btn btn-danger mt-4 "  id="quit1" >
                            <i class="fa fa-times-circle"></i>
                            <b>Quit</b>
                        </button>

                        <button class="btn btn-sm btn btn-success mt-4 "  id="quitjoin" >
                            <i class="fa fa-times-circle"></i>
                            <b>Join</b>
                        </button>
                    </div>

                </div>
            </div>   
        </div>         
    <?php endif; ?>
<?php endforeach; ?>

<!-- The Modal -->
<div class="modal fade" id="eventDetail">
    <div class="modal-dialog">
    <div class="modal-content">
<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title text-warning">Event Detail</h4>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-4">
<!-- <div class="card" style="width: 125px; margin-top: 15px; height: 125px"> -->
    <img class="rounded-circle mt-5" style="width: 140px; height: 125px" src="">
<!-- </div> -->
</div>
<div class="col-8">
    <p class="category text-primary"></p>
    <p class="category text-primary"><?= $values['name']; ?></p>
    <h4 class="title"><strong><?= $values['title']; ?></strong></h4>
<div class="row">
    <i class="material-icons">location_on</i>
    <p> </p>
</div>

<div class="row">
    <i class="material-icons">account_circle</i>
    <p>16 members</p>
</div>

<div class="row">
    <i class="material-icons">account_circle</i>
<p></p>
<!-- <p>Organized by: Seiha</p> -->
</div>

<div class="row">
    <i class="material-icons">alarm</i>
    <p><?php $date = new DateTime($values['start_time']);?>
       <?= date_format($date, 'g:i A'); ?></p>
</div>
    <a href="" id="hide" class="btn btn-success float-right"><i class="fa fa-check-circle" style="color:white"></i>Join</a>
</div>
</div>
<hr>

</div>
    <div class="container">
        <textarea cols="55" rows="5">  </textarea>
    </div>
</div>



<script>
$(document).ready(function() {
      $("#searchEvent").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#event ").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>