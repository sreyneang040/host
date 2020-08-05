


<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">
 <div class="container">
    <div class="row"> 
        <div class="col-12">
            <form action="">
                <div class="form-group">
                  <i class="large material-icons form-control-feedback">search</i>
                  <input type="text" class="form-control search_event" placeholder="Search" name="search">
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <h1>All events</h1>
    <table class="table table-borderless mt-3">
    <thead>
      <tr>
        <th>Organizer</th>
        <th>City</th>
        <th>Title</th>
        <th>Category</th>
        <th>Start date</th>
        <th class="hide">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="info">
        <td>Jack</td>
        <td>Vancouver</td>
        <td>Soccer Competition</td>
        <td>Sport</td>
        <td>25/05/2005</td>
        <td class="deleteEvent"><a href="" data-toggle="modal" data-target="#removeEvent" title="Delete event!" 
         data-placement="right"><i class="material-icons text-danger">delete</i></a>
        </td>
      </tr>
      <tr class="info">
        <td>Ronan</td>
        <td>Vancouver</td>
        <td>Piano</td>
        <td>Music</td>
        <td>25/05/2005</td>
        <td class="deleteEvent"><a href="" data-toggle="modal" data-target="#removeEvent" title="Delete event!" 
         data-placement="right"><i class="material-icons text-danger">delete</i></a>
        </td>
      </tr>
      <tr class="info">
        <td>Seiha</td>
        <td>Paris</td>
        <td>Poker</td>
        <td>Games</td>
        <td>25/05/2005</td>
        <td class="deleteEvent"><a href="" data-toggle="modal" data-target="#removeEvent" title="Delete event!" 
         data-placement="right"><i class="material-icons text-danger">delete</i></a>
        </td>
      </tr>
 
    </tbody>
  </table>
    </div>
 </div>




<!-- The Modal Remove Event-->
<div class="modal mt-5" id="removeEvent">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Remove itme ?</h4>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body mt-2">
                    Are you sure you want to remove selected item ?
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="" class="text-uppercase text-dark">DON'T REMOVE</a>
                    <a href="" class="text-uppercase text-warning">REMOVE</a>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end Modal Remove Category-->

</div>


