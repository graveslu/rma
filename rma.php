<?php
/*
Template Name: RMA
*/
?>
<?php get_header();

function get_client_ip()
{
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if (isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}
date_default_timezone_set('America/Toronto');
$date = date('Y-m-d H:i:s');
$ip = get_client_ip();

?>
<div id="content-wrap">
	<div id="inner-content-left">
		<h1>RMA Request Form</h1>
		<p>Please read the following carefully, for an overview of the material repair process, before submitting this form.</p>
		<p>For service or repair, please complete the below Return Material Authorization (RMA) web form request.</p>
		<p>Note: You'll need to provide a valid working email address, which you have direct access to, in order to complete your RMA submission request.</p>
		<p>Once Gem Systems has received you RMA request, we will review, approve and provide an official RMA #, along with shipping instructions, via the email address you provided with this submission.</p>
		<p>After receiving your shipment, we will reviewed and provide a Repair Estimate.</p>
		<p>The repair will begin once the Repair Estimate is approved via a P.O., and we will provide you with an Order Acknowledgement (including shipping/insurance costs) for prepayment. </p>
		<p>Units will be shipped back to you only after final payment is received.</p>
		<strong>Please do not include any confidential information in the form (credit cards, passwords, etc).</strong>
		<p></p>
		<a href="<?php echo get_template_directory_uri(); ?>/pdf/GemSytems-RMA-TermsAndConditions.PDF">Please click here for RMA/Repair Terms and conditions.</a>


		<div class="form-wrap">
			<form enctype="multipart/form-data" name="rmaForm" id="rmaForm" method="post" style="margin:0px; padding:0px;" action="<?php bloginfo('stylesheet_directory'); ?>/php/rma.php" onsubmit="return validateForm();">
				<input type="hidden" name="hidformname" value="quotations" />
				<input type="hidden" name="hidformsubjct" value="RMA Form" />
				<input type="hidden" name="ip" value="<?php echo $ip; ?>">
				<input type="hidden" name="date" value="<?php echo $date; ?>">
				<div class="table-form">
					<table width="100%" border="0" cellspacing="0" cellpadding="5" class="table-property">

						<tr>
							<td colspan="2">


								<b>GEM Systems Contact</b>
							</td>
						</tr>
						<tr>
							<td>
								Name
							</td>
							<td>
								<input name="gemname" id="gemname" type="text" class="input-field" title="GEM Contact Name" />

							</td>
						</tr>



						<tr>
							<td colspan="2">
								<hr>
								<b>Contact Details</b>
							</td>
						</tr>
						<tr>
							<td>
								First Name<span>*</span>
							</td>
							<td>
								<input name="fname" id="firstname" type="text" class="input-field" title="First Name" />
							</td>
						</tr>
						<tr>
							<td>
								Last Name<span>*</span>
							</td>
							<td>
								<input name="lname" id="lastname" type="text" class="input-field" title="Last Name" />
							</td>
						</tr>
						<tr>
							<td>
								Company<span>*</span>
							</td>
							<td>
								<input name="company" id="company" type="text" class="input-field" title="Company" />
							</td>
						</tr>
						<tr>
							<td>
								Email Address<span>*</span>
							</td>
							<td>
								<input name="email" id="email" type="email" class="input-field" title="Email" />
							</td>
						</tr>
						<tr>
							<td>
								Confirm Email Address<span>*</span>
							</td>
							<td>
								<input name="confirm_email" id="confirm_email" type="confirm_email" class="input-field" title="Confirm Email" />
							</td>
						</tr>
						<tr>
							<td>
								Telephone<span>*</span>
							</td>
							<td>
								<input name="telephone" id="telephone" type="tel" class="input-field" title="Telephone" />
							</td>
						</tr>


						<tbody id="billing">
							<tr>
								<td style="padding-right: 0;" colspan="2">
									<hr>
									<b>Billing Address</b>
								</td>
							</tr>
							<tr>
								<td>
									Street Address<span>*</span>
								</td>
								<td>
									<input name="billstreetaddress" id="billstreetaddress" type="text" class="input-field" title="Street Address" />
								</td>
							</tr>
							<tr>
								<td>
									Address Line 2
								</td>
								<td>
									<input name="billaddress2" id="billaddress2" type="text" class="input-field" title="Address Line 2" />
								</td>
							</tr>
							<tr>
								<td>
									City
								</td>
								<td>
									<input name="billcity" id="billcity" type="text" class="input-field" title="City" />
								</td>
							</tr>
							<tr>
								<td>
									State / Province / Region
								</td>
								<td>
									<input name="billstate" id="billstate" type="text" class="input-field" title="State" />
								</td>
							</tr>
							<tr>
								<td>
									ZIP / Postal Code<span>*</span>
								</td>
								<td>
									<input name="billzip" id="billzip" type="text" class="input-field" title="Zip" />
								</td>
							</tr>
							<tr>
								<td>
									Country<span>*</span>
								</td>
								<td>
									<select name="billcountry" id="billcountry">
										<option>Select country</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Aland Islands">Aland Islands</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Antarctica">Antarctica</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Benin">Benin</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
										<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Bouvet Island">Bouvet Island</option>
										<option value="Brazil">Brazil</option>
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option value="Brunei Darussalam">Brunei Darussalam</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Cote D'Ivoire">Cote D'Ivoire</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Curacao">Curacao</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="French Guiana">French Guiana</option>
										<option value="French Polynesia">French Polynesia</option>
										<option value="French Southern Territories">French Southern Territories</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Grenada">Grenada</option>
										<option value="Guadeloupe">Guadeloupe</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guernsey">Guernsey</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-Bissau">Guinea-Bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
										<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
										<option value="Honduras">Honduras</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Isle of Man">Isle of Man</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japan">Japan</option>
										<option value="Jersey">Jersey</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
										<option value="Korea, Republic of">Korea, Republic of</option>
										<option value="Kosovo">Kosovo</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macao">Macao</option>
										<option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
										<option value="Moldova, Republic of">Moldova, Republic of</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Netherlands Antilles">Netherlands Antilles</option>
										<option value="New Caledonia">New Caledonia</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Niue">Niue</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="Northern Mariana Islands">Northern Mariana Islands</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Pitcairn">Pitcairn</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Reunion">Reunion</option>
										<option value="Romania">Romania</option>
										<option value="Russian Federation">Russian Federation</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Saint Barthelemy">Saint Barthelemy</option>
										<option value="Saint Helena">Saint Helena</option>
										<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										<option value="Saint Lucia">Saint Lucia</option>
										<option value="Saint Martin">Saint Martin</option>
										<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
										<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Senegal">Senegal</option>
										<option value="Serbia">Serbia</option>
										<option value="Serbia and Montenegro">Serbia and Montenegro</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Singapore">Singapore</option>
										<option value="Sint Maarten">Sint Maarten</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
										<option value="South Sudan">South Sudan</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syrian Arab Republic">Syrian Arab Republic</option>
										<option value="Taiwan, Province of China">Taiwan, Province of China</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
										<option value="Thailand">Thailand</option>
										<option value="Timor-Leste">Timor-Leste</option>
										<option value="Togo">Togo</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad and Tobago">Trinidad and Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="United Arab Emirates">United Arab Emirates</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="United States">United States</option>
										<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Viet Nam">Viet Nam</option>
										<option value="Virgin Islands, British">Virgin Islands, British</option>
										<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
										<option value="Wallis and Futuna">Wallis and Futuna</option>
										<option value="Western Sahara">Western Sahara</option>
										<option value="Yemen">Yemen</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="padding-right: 0;" colspan="2">
									<hr>
								</td>
							</tr>
						</tbody>
						<tbody class="instrumentgroup" id="instrumentgroup1">
							<tr>
								<td colspan="2">
									<b>Instrument</b>
								</td>
							</tr>
							<tr>
								<td>
									Instrument Type<span>*</span>
								</td>
								<td>
									<input name="instrument1" id="instrument1" type="text" class="input-field" title="Instrument Type(1)" />
								</td>
							</tr>
							<tr>
								<td>
									Serial Number<span>*</span>
								</td>
								<td>
									<input name="serial1" id="serial1" type="text" class="input-field" title="Serial Number(1)" />
								</td>
							</tr>
							<tr>
								<td>
									Instrument Problem<span>*</span>
									<br><i>Please provide a detailed description and attach any supporting documentation, as applicable. Note that a PO is required to process your repair.</i>
								</td>
								<td>
									<textarea name="problem1" id="problem1" style="resize:none;overflow:auto;" title="Instrument Problem(1)" cols="" rows=""></textarea>
								</td>
							</tr>
							<tr>
								<td>
									Repair Requirements<span>*</span>
								</td>
								<td>
									<input type="checkbox" id="fixonly1" name="fixonly1" value="fixonly" checked>
									<label for="fixonly1">Fix the provided equipment to the specification stated below</label>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="checkbox" id="missing1" name="missing1" value="missing" checked>
									<label for="missing1">Supply any missing components to bring back up to standard (as would be shipped new)</label>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="checkbox" id="upgrade1" name="upgrade1" value="upgrade" checked>
									<label for="upgrade1">Upgrade firmware to latest version available</label>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="checkbox" id="upgradeGPS1" name="upgradeGPS1" value="upgradeGPS" checked>
									<label for="upgradeGPS1">Upgrade GPS to latest version available</label>
								</td>
							</tr>
							<tr>
								<td style="vertical-align:top;">Repair Comment</td>
								<td>
									<textarea name="requirements1" id="requirements1" style="resize:none;overflow:auto;" title="Repair Comment(1)" cols="" rows=""></textarea>
								</td>
							</tr>
							<tr>
								<td>
									Pre-Authorized Repair Limit ($ CAD)<span>*</span>
								</td>
								<td>
									<input name="repair_limit1" id="repair_limit1" type="text" class="input-field" title="Repair Limit (1)">
								</td>
							</tr>
							<tr>
								<td colspan="2" style="padding: 0 0 5px 0;">
									<i class="iRight">Note that a minimum evaluation charge of $125 CAD will apply per unit on out of warranty units.</i>
								</td>
							</tr>
							<tr>
							<td style="padding-right: 0;" colspan="2">
								<hr>
							</td>
						</tr>
							<tr>
								<td>
									<p>Please attach any documentation that may help with resolving the issue.</p>
								</td>
								<td>
									<label class="file" id="file1" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
										<input type="file" id="attachments1" name="attachments1[]" onchange="fileCheck(event)" multiple>
										<span class="file-custom" id="file-custom1"></span>
									</label>

									<br>
									<div class="popup_img" onclick="popup_imgFileTypes()"><a>Click here to view allowed file types</a>
										<span class="popup_imgtext" id="popup_imgFileTypes">
											<br><b>Images: </b>
											jpg, jpeg, png, webp, tif, tiff, gif, bmp, dib, heif, heic, ind, indd, indt, psd, svg, svgz, ai, eps, pdf, raw, arw, cr2, nrw, k25
											<br><b>Documents: </b>
											txt, rtf, doc, docx, wpd, msg, eml, wps, odt
											<br><b>Spreadsheets: </b>
											xls, xlsx, 123, ods</span>
									</div>
									<i class="iRight">Max. file size: 10 MB.</i>

								</td>
							</tr>

						</tbody>
						<tr>
							<td></td>
							<td>
								<button type="button" onclick="addInstrument()">Add Instrument</button>
								<button type="button" onclick="deleteInstrument($('.instrumentgroup:last').attr('id'))">Remove Instrument</button>
							</td>
						</tr>
						<tr>
							<td style="padding-right: 0;" colspan="2">
								<hr>
							</td>
						</tr>
						<tr>
							<td>
								Is the return shipping address the same as the billing address?
							</td>
							<td>
								<select id="shipping_billing" name="shipping_billing" onclick="shippingBilling()">
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
							</td>
						</tr>
						<tbody id="shippingAddress">
							<tr>
								<td style="padding-right: 0;" colspan="2">
									<hr>
									<b>Return Shipping Address</b>
								</td>
							</tr>
							<tr>
								<td>
									First Name<span>*</span>
								</td>
								<td>
									<input name="shipfname" id="shipfirstname" type="text" class="input-field" title="First Name" />
								</td>
							</tr>
							<tr>
								<td>
									Last Name<span>*</span>
								</td>
								<td>
									<input name="shiplname" id="shiplastname" type="text" class="input-field" title="Last Name" />
								</td>
							</tr>
							<tr>
								<td>
									Company<span>*</span>
								</td>
								<td>
									<input name="shipcompany" id="shipcompany" type="text" class="input-field" title="Company" />
								</td>
							</tr>
							<tr>
								<td>
									Email Address<span>*</span>
								</td>
								<td>
									<input name="shipemail" id="shipemail" type="email" class="input-field" title="Email" />
								</td>
							</tr>
							<tr>
								<td>
									Telephone<span>*</span>
								</td>
								<td>
									<input name="shiptelephone" id="shiptelephone" type="tel" class="input-field" title="Telephone" />
								</td>
							</tr>
							<tr>
								<td>
									Street Address<span>*</span>
								</td>
								<td>
									<input name="shipstreetaddress" id="shipstreetaddress" type="text" class="input-field" title="Street Address" />
								</td>
							</tr>
							<tr>
								<td>
									Address Line 2
								</td>
								<td>
									<input name="shipaddress2" id="shipaddress2" type="text" class="input-field" title="Address Line 2" />
								</td>
							</tr>
							<tr>
								<td>
									City
								</td>
								<td>
									<input name="shipcity" id="shipcity" type="text" class="input-field" title="City" />
								</td>
							</tr>
							<tr>
								<td>
									State / Province / Region
								</td>
								<td>
									<input name="shipstate" id="shipstate" type="text" class="input-field" title="State" />
								</td>
							</tr>
							<tr>
								<td>
									ZIP / Postal Code<span>*</span>
								</td>
								<td>
									<input name="shipzip" id="shipzip" type="text" class="input-field" title="Zip" />
								</td>
							</tr>
							<tr>
								<td>
									Country<span>*</span>
								</td>
								<td>
									<select name="shipcountry" id="shipcountry">
										<option>Select country</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Aland Islands">Aland Islands</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Antarctica">Antarctica</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Benin">Benin</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
										<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Bouvet Island">Bouvet Island</option>
										<option value="Brazil">Brazil</option>
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option value="Brunei Darussalam">Brunei Darussalam</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Cote D'Ivoire">Cote D'Ivoire</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Curacao">Curacao</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="French Guiana">French Guiana</option>
										<option value="French Polynesia">French Polynesia</option>
										<option value="French Southern Territories">French Southern Territories</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Grenada">Grenada</option>
										<option value="Guadeloupe">Guadeloupe</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guernsey">Guernsey</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-Bissau">Guinea-Bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
										<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
										<option value="Honduras">Honduras</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Isle of Man">Isle of Man</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japan">Japan</option>
										<option value="Jersey">Jersey</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
										<option value="Korea, Republic of">Korea, Republic of</option>
										<option value="Kosovo">Kosovo</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macao">Macao</option>
										<option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
										<option value="Moldova, Republic of">Moldova, Republic of</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Netherlands Antilles">Netherlands Antilles</option>
										<option value="New Caledonia">New Caledonia</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Niue">Niue</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="Northern Mariana Islands">Northern Mariana Islands</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Pitcairn">Pitcairn</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Reunion">Reunion</option>
										<option value="Romania">Romania</option>
										<option value="Russian Federation">Russian Federation</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Saint Barthelemy">Saint Barthelemy</option>
										<option value="Saint Helena">Saint Helena</option>
										<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										<option value="Saint Lucia">Saint Lucia</option>
										<option value="Saint Martin">Saint Martin</option>
										<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
										<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Senegal">Senegal</option>
										<option value="Serbia">Serbia</option>
										<option value="Serbia and Montenegro">Serbia and Montenegro</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Singapore">Singapore</option>
										<option value="Sint Maarten">Sint Maarten</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
										<option value="South Sudan">South Sudan</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syrian Arab Republic">Syrian Arab Republic</option>
										<option value="Taiwan, Province of China">Taiwan, Province of China</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
										<option value="Thailand">Thailand</option>
										<option value="Timor-Leste">Timor-Leste</option>
										<option value="Togo">Togo</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad and Tobago">Trinidad and Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="United Arab Emirates">United Arab Emirates</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="United States">United States</option>
										<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Viet Nam">Viet Nam</option>
										<option value="Virgin Islands, British">Virgin Islands, British</option>
										<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
										<option value="Wallis and Futuna">Wallis and Futuna</option>
										<option value="Western Sahara">Western Sahara</option>
										<option value="Yemen">Yemen</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="padding-right: 0;" colspan="2">
									<hr>
								</td>
							</tr>
						</tbody>
						<tr>
							<td>
								Do you want Gem Systems to handle the return shipping?<span>*</span>
							</td>
							<td style=" height: 85px; ">
								&nbsp; <input type="radio" id="html" name="ShippingHandledByGem" value="yes" checked="">
								&nbsp; <label for="html">Gem System handle the shipping (Shipping Costs included in invoiced to customer)</label><br>
								&nbsp; <input type="radio" id="css" name="ShippingHandledByGem" value="no">
								&nbsp; <label for="css">Customer to handle shipping/Documentation and will provide AWB/shipping documentation to Gem Systems</label>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding: 0 0 20px 0;">
								<i class="iRight">Please note that there will be an administrative charge if the return shipping is paid by GEM Systems.</i>
							</td>
						</tr>
						<tr>
							<td>
								Would you like the return shipment to be insured?<span>*</span>
							</td>
							<td>
								<select id="insured_shipping" name="insured_shipping">
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding: 0 0 5px 0;">
								<i class="iRight">GEM Systems is not responsible for insuring your instrument while in transit (ie. Loss/Damage/Theft). We recommend that you consider purchasing optional insurance when sending to Gem Systems, and for the return shipment.</i>
							</td>
						</tr>
						<tr>
							<td style="padding-right: 0;" colspan="2">
								<hr>
							</td>
						</tr>
						<tr>
							<td>
								US EIN Number
							</td>
							<td>
								<input name="ein" id="ein" type="text" class="input-field" title="EIN Number">
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding: 0 0 5px 0;">
								<i class="iRight">Mandatory for all US shipments</i>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								Additional Comments
							</td>
							<td>
								<textarea name="comments" id="comments" style="resize:none;overflow:auto;" title="Additional Comments" rows="" cols=""></textarea>
							</td>
						</tr>
						<tr>
							<td>
							</td>
							<td>
								<div id="captcha_div_quat" style="width:320px;">
									<?php include(ABSPATH . "wp-content/themes/gemsystems/captcha_code_quat.php"); ?>
								</div>
							</td>
						</tr>
						<tr>
							<td>
							</td>
							<td colspan="5" align="left" valign="top">
								<button type="button" onclick="validateForm();" id="submit_rma">Send</button>
								<div style="display:none; height:30px; padding:0px; float:left; font-size:12px; text-align:right; color:#000000;" id="wait_btn3">
									<img src="/images/wait.gif" style="margin:0px 0px 0px 0px;" />
									&nbsp;Please wait...
								</div>
							</td>
						</tr>
					</table>
				</div>
				<input type="hidden" name="captcha_hid_quat" id="captcha_hid_quat">
			</form>
		</div>
	</div>
</div>
<br clear="all" />
</div>
<?php get_footer(); ?>
<style>
	.popup_img {
		position: relative;
		display: inline-block;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	#inner-content-left a {
		font-size: 10px;
	}

	#inner-content-left .form-wrap .table-form .table-property .popup_img .popup_imgtext a {
		color: #48494b;
	}

	.popup_img .popup_imgtext {
		visibility: hidden;
		width: 260px;
		background-color: #eeeeee;
		color: #000;
		text-align: center;
		border: 1px solid #dad9d9;
		padding: 8px 0;
		position: absolute;
		z-index: 100;
		bottom: 125%;
		left: 50%;
		margin-left: -133px;
	}

	.popup_img .popup_imgtext::after {
		content: "";
		position: absolute;
		top: 100%;
		left: 50%;
		margin-left: -5px;
		border-width: 5px;
		border-style: solid;
		border-color: #dad9d9 transparent transparent transparent;
	}

	.popup_img .show {
		visibility: visible;
		padding: 0px 4px 12px 5px;
		-webkit-animation: fadeIn 1s;
		animation: fadeIn 1s;
		color: #48494b !important;
	}

	@-webkit-keyframes fadeIn {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	#rmaForm hr {
		margin-right: 0 !important;
	}

	#rmaForm .delete-instrument {
		position: absolute;
		top: -6px;
		right: -18px;
		cursor: pointer;
	}

	#rmaForm .file {
		position: relative;
		display: inline-block;
		cursor: pointer;
		height: 2rem;
		width: calc(100% + 5px);
	}

	#rmaForm .file-custom:after {
		content: "Choose file...";
	}

	#rmaForm .file-custom:before {
		position: absolute;
		top: -0.075rem;
		right: -0.075rem;
		bottom: -0.075rem;
		z-index: 6;
		display: block;
		content: "Browse";
		padding: 5px;
		line-height: 1.5;
		color: #555;
		background-color: #eee;
		border: 0.075rem solid #ddd;
		border-radius: 0 0.25rem 0.25rem 0;
	}

	#rmaForm .file input {
		width: 100%;
		height: 2rem;
		margin: 0;
		filter: alpha(opacity=0);
		opacity: 0;
	}

	#rmaForm .file-custom {
		position: absolute;
		top: 0;
		right: 0;
		left: 0;
		z-index: 5;
		padding: 5px;
		line-height: 1.5;
		color: #555 !important;
		background-color: #fff;
		border: .075rem solid #ddd;
		border-radius: .25rem;
		box-shadow: inset 0 .2rem .4rem rgba(0, 0, 0, .05);
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
</style>
<script>
	function popup_imgFileTypes() {

		var popup_img = document.getElementById("popup_imgFileTypes");
		popup_img.classList.toggle("show");
	}

	function dragOverHandler(event) {
		/* !!! Possibly superfluous !!! */

		// Prevent default behavior (Prevent file from being opened)
		event.preventDefault();
	}

	function dropHandler(event) {
		// Prevent default behavior (Prevent file from being opened)
		event.preventDefault();

		if (event.dataTransfer.items) {
			fileCheck(event);
		}
	}

	function addInstrument() {
		let topRow = '<tr><td><b>Instrument 1</b></td>';
		topRow += '<td style="padding:0;position:relative;"><div class="delete-instrument" onclick="deleteInstrument(event.target.closest(\'tbody\').getAttribute(\'id\'))">&#10060;</div></td></tr>'
		let index = $('.instrumentgroup').length + 1;
		if (index < 11) {
			let instrumentgroup1 = $("#instrumentgroup1");
			if (index === 2) {
				instrumentgroup1.find("tr:first").remove()
				instrumentgroup1.prepend(topRow);
			}
			let newinstrument = instrumentgroup1.clone();
			newinstrument.attr("id", "instrumentgroup" + index);
			newinstrument.prepend('<tr><td style="padding-right: 0;" colspan="2"><hr></td></tr>');
			newinstrument.find("input, textarea, label, span, tr:eq(1) td:eq(0)").each(function() {
				$(this).replaceWith($(this).attr("outerHTML").replace(/1/g, index));
			});
			$(".instrumentgroup:last").after(newinstrument);
		}
	}

	function tester() {
		$.get("<?php echo get_template_directory_uri(); ?>/php/rma_email.php", "delete", function(result) {
			alert("wp_rma_email wiped");
		})
	}

	function deleteInstrument(id) {
		if ($(".instrumentgroup").length > 1) {
			// Loop through the css rules to remove custom text from custom file input
			for (i = 0; i < document.styleSheets[0].cssRules.length; i++) {
				if (document.styleSheets[0].cssRules[i].selectorText === ("#" + $("#" + id).find(".file-custom").attr("id") + "::after")) {
					document.styleSheets[0].deleteRule(i);
				}
			}

			// Remove instrument group
			$("#" + id).remove();

			// If first instrument group has a leading hr remove hr
			if ($("#" + $(".instrumentgroup").attr("id") + " tr:first td:first hr").length === 1) {
				$("#" + $(".instrumentgroup").attr("id") + " tr:first").remove();
			}

			// Renumber instrument groups
			$(".instrumentgroup").each(function(i) {
				let oldNum = $(this).attr("id").slice(-1);
				let newNum = i + 1;
				let cssRule;
				let attachments;
				let fileNames;

				if (oldNum != newNum) {
					$(this).find("input, textarea, label, label:has(span) span, td:has(b) b").each(function() {
						if ($(this).is("b")) {
							$(this).html($(this).html().replace(oldNum, newNum));
						}
						if ($(this).attr("name")) {
							$(this).attr("name", $(this).attr("name").replace(oldNum, newNum));
						}
						if ($(this).attr("id")) {
							$(this).attr("id", $(this).attr("id").replace(oldNum, newNum));
						}
						if ($(this).attr("title")) {
							$(this).attr("title", $(this).attr("title").replace(oldNum, newNum));
						}
					})
					$(this).attr("id", $(this).attr("id").replace(oldNum, newNum));
					for (j = 0; j < document.styleSheets[0].cssRules.length; j++) {
						if (document.styleSheets[0].cssRules[j].selectorText === ("#file-custom" + oldNum + "::after")) {
							cssRule = document.styleSheets[0].cssRules[j];
							document.styleSheets[0].deleteRule(j);
							document.styleSheets[0].insertRule(cssRule.cssText.replace(oldNum, newNum));
							attachments = document.getElementById("attachments" + newNum).files;
							for (k = 0; k < attachments.length; k++) {
								if (fileNames) {
									fileNames += ", " + attachments[k].name;
								} else {
									fileNames = attachments[k].name;
								}
							}
							$("#file-custom" + newNum).attr("data-after", fileNames);
						}
					}
				}
			})

			// If only one instrument group remains change Instrument n to Instrument
			if ($(".instrumentgroup").length === 1) {
				$("#" + $(".instrumentgroup").attr("id") + " tr:first").html('<td colspan="2"><b>Instrument</b></td>');
			}
		}
	}

	function fileCheck(event) {
		let attachments;
		let fileNames;
		//let maxSize = 209715200;
		let maxSize = 10485760;
		let sizedList = new DataTransfer();
		let newList = new DataTransfer();
		let fileInput;
		let fileCustom;

		if ($(event.target).attr("nodeName") === "SPAN") {
			attachments = event.dataTransfer.files;
			fileInput = event.target.parentElement.querySelector("input");
		}
		if ($(event.target).attr("nodeName") === "INPUT") {
			fileInput = event.target;
			attachments = event.target.files;
		}
		// console.log(attachments[0]);
		fileCustom = fileInput.parentElement.querySelector("span");

		// Loop through input files and check for desired conditions
		// Disallow files that are over 200MB
		for (i = 0; i < attachments.length; i++) {
			if (attachments[i].size > maxSize) {
				alert(attachments[i].name + " (" + (attachments[i].size / 1024 / 1024).toFixed(2) + "MB) is over 10MB limit");
			} else {
				sizedList.items.add(attachments[i]);
				// newList.items.add(attachments[i]);
			}
		}

		// attachments = newList.files;
		// console.log(attachments.length);
		// console.log(newList.files.length);
		// newList.clearData();
		// console.log(attachments.length);
		// console.log("New List: " + newList.files.length);
		// console.log("Attachments List: " + attachments.length);
		// console.log("Sized List: " + sizedList.files.length);
		// Disallow file extensions that arn't images, text files, word documents, and spreadsheets
		// for (i = 0; i < attachments.length; i++) {
		for (i = 0; i < sizedList.files.length; i++) {

			// var ext = attachments[i].name.match(/\.([^.]+)$/)[1];
			var ext = sizedList.files[i].name.match(/\.([^.]+)$/)[1];
			console.log(ext);
			switch (ext) {
				// Images
				case 'jpg':
				case 'jpeg':
				case 'png':
				case 'webp':
				case 'tif':
				case 'tiff':
				case 'gif':
				case 'bmp':
				case 'dib':
				case 'heif':
				case 'heic':
				case 'ind':
				case 'indd':
				case 'indt':
				case 'psd':
				case 'svg':
				case 'svgz':
				case 'ai':
				case 'eps':
				case 'pdf':
				case 'raw':
				case 'arw':
				case 'cr2':
				case 'nrw':
				case 'k25':
					// Documents
				case 'txt':
				case 'rtf':
				case 'doc':
				case 'docx':
				case 'wpd':
				case 'msg':
				case 'eml':
				case 'wps':
				case 'odt':
					// Spreadsheets
				case 'xls':
				case 'xlsx':
				case '123':
				case 'ods':
					// newList.items.add(attachments[i]);
					newList.items.add(sizedList.files[i]);
					if (fileNames) {
						// fileNames += ", " + attachments[i].name;
						fileNames += ", " + sizedList.files[i].name;

					} else {
						fileNames = sizedList.files[i].name;
						// fileNames = attachments[i].name;
					}
					break;
				default:
					alert(ext + " file extensions are not allowed");
			}
		}
		fileInput.files = newList.files;
		// Change text on custom file input
		document.styleSheets[0].insertRule("#" + fileCustom.id + ":after { content: attr(data-after) !important; }");
		$(fileCustom).attr("data-after", fileNames);
	}

	function shippingBilling() {
		// Make shipping address inputs visible if shipping address is not the same as billing address
		var select = document.getElementById("shipping_billing");
		var tbody = document.getElementById("shippingAddress");

		if (select.value === "yes") {
			tbody.style.display = "none";
		} else {
			tbody.style.display = "table-row-group";
			fname = document.getElementById("firstname");
			lname = document.getElementById("lastname");
			comp = document.getElementById("company");
			email = document.getElementById("email");
			shipfname = document.getElementById("shipfirstname");
			shiplname = document.getElementById("shiplastname");
			shipcomp = document.getElementById("shipcompany");
			shipemail = document.getElementById("shipemail");
			if (fname.value && !shipfname.value) {
				shipfname.value = fname.value;
			}
			if (lname.value && !shiplname.value) {
				shiplname.value = lname.value;
			}
			if (comp.value && !shipcomp.value) {
				shipcomp.value = comp.value;
			}
			if (email.value && !shipemail.value) {
				shipemail.value = email.value;
			}
		}
	}

	function validateForm() {
		var site_url = '<?php echo bloginfo('stylesheet_directory'); ?>';
		var subButton = document.getElementById("submit_rma");
		var wait = document.getElementById("wait_btn3");
		subButton.style.display = "none";
		wait.style.display = "block";

		/* GEM contact not mandatory
		    var gemName = document.getElementById("gemname");
				if (gemName.value === "") {
					gemName.focus();
					alert("GEM Contact name must be filled out");
					subButton.style.display = "block";
					wait.style.display = "none";
					return false;
				}
		*/

		var fName = document.getElementById("firstname");
		if (fName.value === "") {
			fName.focus();
			alert("First name must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var lName = document.getElementById("lastname");
		if (lName.value === "") {
			lName.focus();
			alert("Last name must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var comp = document.getElementById("company");
		if (comp.value === "") {
			comp.focus();
			alert("Company must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		//E-mail and e-mail verification
		var email = document.getElementById("email");
		if (email.value === "") {
			email.focus();
			alert("Email must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var confirm_email = document.getElementById("confirm_email");
		if (confirm_email.value === "") {
			confirm_email.focus();
			alert("Email confirmation must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		if (confirm_email.value !== email.value) {
			confirm_email.focus();
			alert("Email and email confirmation must match");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		//End e-mail and e-mail verification

		if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
			email.focus();
			alert("You have entered an invalid email address");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var tel = document.getElementById("telephone");
		if (tel.value === "") {
			tel.focus();
			alert("Telephone number must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}
		if (!/^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i.test(tel.value)) {
			tel.focus();
			alert("You have entered an invalid telephone number");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var billstreet = document.getElementById("billstreetaddress");
		if (billstreet.value === "") {
			billstreet.focus();
			alert("Street address must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var billzip = document.getElementById("billzip");
		if (billzip.value === "") {
			billzip.focus();
			alert("Zip code must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var billcountry = document.getElementById("billcountry");
		if (billcountry.value === "Select country") {
			billcountry.focus();
			alert("Country must be selected");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}
		for (i = 1; i <= $(".instrumentgroup").length; i++) {
			let tbody = document.getElementById("instrumentgroup" + i);
			let inst = document.getElementById("instrument" + i);
			let ser = document.getElementById("serial" + i);
			let prob = document.getElementById("problem" + i);
			let fix = document.getElementById("fixonly" + i);
			let miss = document.getElementById("missing" + i);
			let upgr = document.getElementById("upgrade" + i);
			let upgrGPS = document.getElementById("upgradeGPS" + i);
			// let req = document.getElementById("requirements" + i);
			let replim = document.getElementById("repair_limit" + i);
			let nth = i + "th";
			if (i === 1) {
				nth = "1st";
			}
			if (i === 2) {
				nth = "2nd";
			}
			if (i === 3) {
				nth = "3rd";
			}
			if (inst.value === "") {
				inst.focus();
				alert(nth + " instrument must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (ser.value === "") {
				ser.focus();
				alert(nth + " instrument's serial number must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (prob.value === "") {
				prob.focus();
				alert(nth + " instrument's problem must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (!fix.checked && !miss.checked && !upgr.checked && !upgrGPS.checked) {
				fix.focus()
				if ($(".instrumentgroup").length === 1) {
					alert("At least one instrument requirement must be ticked");
				} else {
					alert("At least one instrument requirement must be ticked for Instrument " + i);
				}
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (replim.value === "") {
				replim.focus();
				alert("Pre-authorized repair limit must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (!/^[0-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/.test(replim.value)) {
				replim.focus();
				alert("Pre-authorized repair limit must be a valid monetary format");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
		}

		var shipbill = document.getElementById("shipping_billing");
		var ein = document.getElementById("ein");
		if (shipbill.value === "no") {
			var shipfName = document.getElementById("shipfirstname");
			if (shipfName.value === "") {
				shipfName.focus();
				alert("First name must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}

			var shiplName = document.getElementById("shiplastname");
			if (shiplName.value === "") {
				shiplName.focus();
				alert("Last name must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}

			var shipcomp = document.getElementById("shipcompany");
			if (shipcomp.value === "") {
				shipcomp.focus();
				alert("Company must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}

			var shipemail = document.getElementById("shipemail");
			if (shipemail.value === "") {
				shipemail.focus();
				alert("Email must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(shipemail.value)) {
				shipemail.focus();
				alert("You have entered an invalid email address");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}

			var shiptel = document.getElementById("shiptelephone");
			if (shiptel.value === "") {
				shiptel.focus();
				alert("Telephone number must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (!/^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i.test(shiptel.value)) {
				shiptel.focus();
				alert("You have entered an invalid telephone number");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}

			var shipstreet = document.getElementById("shipstreetaddress");
			var shipzip = document.getElementById("shipzip");
			var shipcountry = document.getElementById("shipcountry");
			if (shipstreet.value === "") {
				shipstreet.focus();
				alert("Street address must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (shipzip.value === "") {
				shipzip.focus();
				alert("Zip code must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (shipcountry.value === "Select country") {
				shipcountry.focus();
				alert("Country must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (shipcountry.value === "United States" && ein.value === "") {
				ein.focus();
				alert("EIN is mandatory for all US shipments");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
		} else {
			if (billcountry.value === "United States" && ein.value === "") {
				ein.focus();
				alert("EIN is mandatory for all US shipments");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
		}
		if (document.getElementById("captcha_hid_quat").value == "") {
			document.getElementById("captcha_div_quat").focus();
			alert("Please select " + $("#captcha_div_quat").find("span").text() + " to pass verfication");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		Captcha_empty_val('submit_rma', 'wait_btn3', site_url, document.rmaForm);

		// $("#rmaForm").submit();
	}

	function validateFormOld() {

		var site_url = '<?php echo bloginfo('stylesheet_directory'); ?>';
		var subButton = document.getElementById("submit_rma");
		var wait = document.getElementById("wait_btn3");
		subButton.style.display = "none";
		wait.style.display = "block";

		var fName = document.getElementById("firstname");
		if (fName.value === "") {
			fName.focus();
			alert("First name must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var lName = document.getElementById("lastname");
		if (lName.value === "") {
			lName.focus();
			alert("Last name must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var comp = document.getElementById("company");
		if (comp.value === "") {
			comp.focus();
			alert("Company must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var email = document.getElementById("email");
		if (email.value === "") {
			email.focus();
			alert("Email must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}
		if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
			email.focus();
			alert("You have entered an invalid email address");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var tel = document.getElementById("telephone");
		if (tel.value === "") {
			tel.focus();
			alert("Telephone number must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}
		if (!/^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i.test(tel.value)) {
			tel.focus();
			alert("You have entered an invalid telephone number");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var billstreet = document.getElementById("billstreetaddress");
		if (billstreet.value === "") {
			billstreet.focus();
			alert("Street address must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var billzip = document.getElementById("billzip");
		if (billzip.value === "") {
			billzip.focus();
			alert("Zip code must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var billcountry = document.getElementById("billcountry");
		if (billcountry.value === "Select country") {
			billcountry.focus();
			alert("Country must be selected");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}
		for (i = 1; i <= 10; i++) {
			var tbody = document.getElementById("instrumentgroup" + i);
			var inst = document.getElementById("instrument" + i);
			var ser = document.getElementById("serial" + i);
			var prob = document.getElementById("problem" + i);
			var nth = i + "th";
			if (i === 1) {
				nth = "1st";
			}
			if (i === 2) {
				nth = "2nd";
			}
			if (i === 3) {
				nth = "3rd";
			}
			if (window.getComputedStyle(tbody).display === "table-row-group") {
				if (inst.value === "") {
					inst.focus();
					alert(nth + " instrument must be filled out");
					subButton.style.display = "block";
					wait.style.display = "none";
					return false;
				}
				if (ser.value === "") {
					ser.focus();
					alert(nth + " instrument's serial number must be filled out");
					subButton.style.display = "block";
					wait.style.display = "none";
					return false;
				}
				if (prob.value === "") {
					prob.focus();
					alert(nth + " instrument's problem must be filled out");
					subButton.style.display = "block";
					wait.style.display = "none";
					return false;
				}
			}
		}

		var replim = document.getElementById("repair_limit");
		if (replim.value === "") {
			replim.focus();
			alert("Pre-authorized repair limit must be filled out");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}
		if (!/^[1-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/.test(replim.value)) {
			replim.focus();
			alert("Pre-authorized repair limit must be a valid monetary format");
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		var shipbill = document.getElementById("shipping_billing");
		var ein = document.getElementById("ein");
		if (shipbill.value === "no") {
			var shipstreet = document.getElementById("shipstreetaddress");
			var shipzip = document.getElementById("shipzip");
			var shipcountry = document.getElementById("shipcountry");
			if (shipstreet.value === "") {
				shipstreet.focus();
				alert("Street address must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (shipzip.value === "") {
				shipzip.focus();
				alert("Zip code must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (shipcountry.value === "Select country") {
				shipcountry.focus();
				alert("Country must be filled out");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
			if (shipcountry.value === "United States" && ein.value === "") {
				ein.focus();
				alert("EIN is mandatory for all US shipments");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
		} else {
			if (billcountry.value === "United States" && ein.value === "") {
				ein.focus();
				alert("EIN is mandatory for all US shipments");
				subButton.style.display = "block";
				wait.style.display = "none";
				return false;
			}
		}
		if (document.getElementById("captcha_hid_quat").value == "") {
			subButton.style.display = "block";
			wait.style.display = "none";
			return false;
		}

		Captcha_empty_val('submit_rma', 'wait_btn3', site_url, document.rmaForm);
	}
</script>
