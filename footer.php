  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="http://www.rahathr.az"><?php echo $company_name ; ?></a></strong>
    Bütün Hüquqları Qorunur
    <div class="float-right d-none d-sm-inline-block">
      <b>Versiya</b> 1.0.1
    </div>
  </footer>
  
   <div class="modal fade" id="modalCompanySelect"  >
        <div class="modal-dialog  modal-lg">
          <div class="modal-content bg-success">
     
            <div class="modal-body" style="background-image: url('dist/img/modalback.jpg'); background-repeat: no-repeat;
  background-size: cover;  ">
         <br>
		 
		 <div class="callout callout-danger">
		 
		 <h5 style  ="color:black ;">Davam  etmək  üçün  bir  şirkət  seçin</h5>
		 	<form id="companyselect" method="post" class="form-horizontal" action="">
 			 <select  onchange="this.form.submit()" name="company_id_name" id='company_select_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"  >
			   <option value="9999"><?php echo $dil["selectone"];?></option>
			  <?php
                   $result_company = $db->query($sql_employee_company);
                   if ($result_company->num_rows > 0) {
                       while($row_company= $result_company->fetch_assoc()) {
                           ?>
                           <option  value="<?php echo $row_company['id']; ?>" ><?php echo $row_company['company_name'];  ?></option>
                       <?php } }?>
             </select>
			  </form>
                </div>

		<br>	  
            </div>
  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	