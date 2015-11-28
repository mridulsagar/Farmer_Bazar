	<section id="product_area" class="top_area">
				
				
							<div class="container">
					
						
							<div class="form_aside col-xs-0 col-sm-0 col-md-6 col-lg-6 ">
							
							<p> কৃষি কাজ নয় আধুনিক কৃষি কাজই আমাদের লক্ষ্য <br>
							এগিয়ে যাছেচ বাংলাদেশ <br>
							কৃষির উন্নতি দেশের উন্নতি<br>
							ডিজিটাল দেশের ডিজিটাল কৃষক<br>
							</p>
							</div>
							<div class="form_area login col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
							
							
								
								<table class="tabledesign">
								<br>
								<h3> নতুন পণ্য যোগ করুন</h3>
								<tr>
								  <td><p></p> </td>
								  <td>
								  <select onchange="yesnoCheck(this);"  id="category_type" name="category_type" class="custom_input" >
								  <option  value="" >---Select---</option>
								  <option  value="seed">Seed</option>
								  <option value="oil">Oil</option>
								  </select>
								  </td>
								</tr>
								
								
								<tr>
								  <td><p id="seed_sub" style="display:none">Seed Sub</p></td>
								  <td>
								  <select id="seed_sub_type" style="display:none" name="seed_sub_type" class="custom_input" >
								  <option  value="" >---Select---</option>
								  <option  value="rice">Rice</option>
								  <option value="gom">Gom</option>
								  </select>
								  </td>
								</tr>
								
								<tr>
								 <td><p id="oil_sub" style="display:none">Oil Sub</p></td>
								  <td>
								  <select id="oil_sub_type" style="display:none"  name="oil_sub_type" class="custom_input" >
								  <option  value="" >---Select---</option>
								  <option  value="soya">Soya</option>
								  <option value="sorisa">Sorisa</option>
								  </select>
								  </td>
								</tr>
								 
								  
								  <tr>
								  <td><p>Price Range</p> </td>
								  <td><input class="custom_input" id="price_range" type="text" name="price_range" placeholder="35-40 TK">
								  </td>
								  
								  </tr>
								  
								  
								  <tr>
								  <td> <p>District</p> </td>
								  <td> <select name="district" id="district-list" class="custom_input"> 
								  <option value="sylhet">Sylhet</option>
								  <option value="sunamgonj">Sunamgonj</option>
								  <option value="hobigonj">Hobigonj</option>
								  <option value="moulovibazar">Moulovibazar</option>
								  </select>
								  
								 </td>
								  
								 </tr>
				
								  <tr>
								  <td> <p>Expire Date</p> </td>
								  <td> <input class="custom_input" id="expire_date"  type="text" name="expire_date" value="<?php echo date('d-m-Y')?>" data-uk-datepicker="{format:'DD-MM-YYYY',minDate:0}" placeholder="dd-mm-yyyy" readonly>
								 </td>
								  
								 </tr>
									
									
								<tr>
								  <td> <p>User Type</p> </td>
								  <td> <input class="custom_input" id="u_id" type="text" name="u_id" value="<?php if(!empty($_SESSION['user_id']))echo $_SESSION['user_id'];?>"placeholder="user id">
								 </td>
								  
								 </tr>
								  
								<tr>
								  <td></td>
								  <td> <input type="button" class="btn btn-default btn_book" name="submit" value="Enter" onclick="validProduct()"> </td>
								</tr>
								 
								 
								<tr><td></td><td id="flash"></td></tr>
								  
								<tr><td></td><td id="errorMessage"></td></tr>
								
								
								</table>
							
							
							
							
							
							</div>
				
				
						</div>
				</div>
		

		
		</section>
		

		

