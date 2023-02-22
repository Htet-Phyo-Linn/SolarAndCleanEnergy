<?php require_once "views/partials/heading.php"; ?>
<?php
session_start();
sessionCheck();

?>
    
    <h1>Profile page</h1>

<table class="table">
	<thead>
		<tr>
        	<th>Username</th>
        	<th>Email</th>
        	<th>Phone Number</th>
    	</tr>
	</thead>
  <tbody>
    <?php foreach($userDetail['uInfo'] as $user): ?>
    	<tr>
        	<td><?php echo $user['userName']; ?></td>
        	<td><?php echo $user['email']; ?></td>
        	<td><?php echo $user['phNo']; ?></td>
    	</tr>
    <?php endforeach; ?>

	<!-- <form method="post">
		<button type="submit" name="edit">Edit</button>
	</form> -->

  </tbody>


  
                    <!-- Vertically Centered Modal -->
                    <div class="col-lg-4 col-md-6">
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                           Change Info
                        </button>
<form method="POST">
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Change Info</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input
                                    name="userName"
                                      type="text"
                                      id="nameWithTitle"
                                      class="form-control"
                                      placeholder="Enter Name"
                                    />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Email</label>
                                    <input
                                    name="email"
                                      type="text"
                                      id="emailWithTitle"
                                      class="form-control"
                                      placeholder="xxxx@gmail.com"
                                    />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Phone Number</label>
                                    <input
                                    name="phNo"
                                      type="text"
                                      id="dobWithTitle"
                                      class="form-control"
                                      placeholder="09"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
    					</div>
</form>
                        </div>
                      </div>
                    </div>

</table>


