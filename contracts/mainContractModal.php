<style>
    .control-label {
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 700;
    }
    .profile-user-img{
        width:100px;
        height:100px;
    }
</style>
<!--EMPLOYEE İNSERT MODAL -->
  <div class="modal fade" id="myContracts" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="employeeInsert" method="post" class="form-horizontal" action="">

      <!-- Modal content-->
      <div class="modal-content" >

        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["contracts"];?></h4>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 200px;overflow-y: scroll; ">


							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="contracts"><?php echo $dil["contracts"];?></label>
								<div class="col-sm-6">
								<select   name="contracts"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["contracts"];?>" >
									<option value="1">Əmək müqaviləsi</option>
									<option value="2">Əmək müqaviləsinə əlavə</option>
									<option value="2">Hərbi uçot vərəqəsi</option>
								</select>
								</div>
							</div>




                    </div>
				</div>

		</div>
        <div class="modal-footer">

		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php echo $dil["save"];?></button><button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>

        </div>
		</form>
      </div>

    </div>
  </div>
