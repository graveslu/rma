<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-config.php");
    require_once(get_template_directory() . '/php/rma_email.php');


	function sanitize_input($data) {
		// Remove leading/trailing spaces, remove slashes, convert html characters, and change new line to linux
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
        $data = str_replace("\r\n", "\n", $data);
		return $data;
	}

    function get_counter() {
		$option_name = "rma_ref";
		$counter = get_option($option_name);

		// If no counter set it's 1, else counter is previous counter plus 1
		$counter = $counter + 1;

		// If rma counter doesn't exist in wp_options add it, else update the counter
		if (get_option($option_name) !== false) {
			update_option($option_name, $counter);
		} else {
			$deprecated = null;
			$autoload = 'no';
			add_option($option_name, $counter, $deprecated, $autoload);
		}

        // Padding counter to 4n
        $padcount = sprintf("%04d", $counter);

        return $padcount;
    }

    function generate_ref($verified = true) {
		// Generate reference from current date and website counter. Format: YYYYMMnnnn
		$yyyymm = date("Ym");

        if($verified) {
            $counter = get_counter();
        } else {
            $counter = "";
        }

        $unique =  uniqid();

        $rma_ref = "RMA" . $yyyymm . $counter . "_" . $unique;

		return $rma_ref;
	}

    function generate_crc($data) {
        $crc = "";
        foreach($data as $key => $value) {
            if(!is_array($value)) {
                $crc .= $key . $value . "GemSYS";
            } else {
                foreach($value as $k => $v) {
                    if(!is_array($v)) {
                        $crc .= $k . $v . "GemSYS";
                    }
                }
            }
        }
        $crc = crc32($crc);

        return $crc;
    }

    function convertToReadableSize($size) {
        $base = log($size) / log(1024);
        $suffix = array("", "KB", "MB", "GB", "TB");
        $f_base = floor($base);
        return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
    }

    function form_data_array() {
        // Process form data into an associative array
        $form_data = [];

				$form_data["GEM_Name"] = sanitize_input($_POST["gemname"]);
        $form_data["First_Name"] = sanitize_input($_POST["fname"]);
        $form_data["Last_Name"] = sanitize_input($_POST["lname"]);
        $form_data["Company"] = sanitize_input($_POST["company"]);
        $form_data["Email_Address"] = sanitize_input($_POST["email"]);
        $form_data["Telephone"] = sanitize_input($_POST["telephone"]);
        $form_data["Billing#Street_Address"] = sanitize_input($_POST["billstreetaddress"]);
        if($_POST["billaddress2"] !== "") {
            $form_data["Billing#Address_Line 2"] = sanitize_input($_POST["billaddress2"]);
        }
        if($_POST["billcity"] !== "") {
            $form_data["Billing#City"] = sanitize_input($_POST["billcity"]);
        }
        if($_POST["billstate"] !== "") {
            $form_data["Billing#State"] = sanitize_input($_POST["billstate"]);
        }
        $form_data["Billing#ZIP"] = sanitize_input($_POST["billzip"]);
        $form_data["Billing#Country"] = sanitize_input($_POST["billcountry"]);
        foreach(preg_grep('/instrument/', array_keys($_POST)) as $instrumentitem) {
            $i = substr($instrumentitem, -1, 1);

            // Convert requirment checkboxes to string before going into instrument array
            $requirements = "";
            if(isset($_POST["fixonly" . $i])) {
                $requirements = "Fix";
            }
            if(isset($_POST["missing" . $i])) {
                if($requirements === "") {
                    $requirements = "Missing components";
                } else {
                    $requirements = $requirements . ", Missing components";
                }
            }
            if(isset($_POST["upgrade" . $i])) {
                if($requirements === "") {
                    $requirements = "Upgrade";
                } else {
                    $requirements = $requirements . ", Upgrade";
                }
            }

            $form_data[$instrumentitem] = array (
                    "Instrument" . $i . "#Type" => sanitize_input($_POST["instrument" . $i]),
                    "Instrument" . $i . "#Serial" => sanitize_input($_POST["serial" . $i]),
                    "Instrument" . $i . "#Problem" => sanitize_input($_POST["problem" . $i]),
                    "Instrument" . $i . "#Requirements" => $requirements,
                    "Instrument" . $i . "#Repair_Comment" => sanitize_input($_POST["requirements" . $i]),
                    "Instrument" . $i . "#Repair_Limit" => sanitize_input($_POST["repair_limit" . $i]),
                    "Instrument" . $i . "#Attachments" => isset($_FILES["attachments" . $i]) ? $_FILES["attachments" . $i] : []
            );

            // Remove Repair Comment if empty after inputting to instrument array
            if($form_data[$instrumentitem]["Instrument" . $i . "#Repair_Comment"] === "") {
                unset($form_data[$instrumentitem]["Instrument" . $i . "#Repair_Comment"]);
            }

        }
        if($_POST["shipping_billing"] === "no") {
            $form_data["Shipping#First_Name"] = sanitize_input($_POST["shipfname"]);
            $form_data["Shipping#Last_Name"] = sanitize_input($_POST["shiplname"]);
            $form_data["Shipping#Company"] = sanitize_input($_POST["shipcompany"]);
            $form_data["Shipping#Email_Address"] = sanitize_input($_POST["shipemail"]);
            $form_data["Shipping#Telephone"] = sanitize_input($_POST["shiptelephone"]);
            $form_data["Shipping#Street_Address"] = sanitize_input($_POST["shipstreetaddress"]);
            if($_POST["shipaddress2"] !== "") {
                $form_data["Shipping#Address_Line 2"] = sanitize_input($_POST["shipaddress2"]);
            }
            if($_POST["shipcity"] !== "") {
                $form_data["Shipping#City"] = sanitize_input($_POST["shipcity"]);
            }
            if($_POST["shipstate"] !== "") {
                $form_data["Shipping#State"] = sanitize_input($_POST["shipstate"]);
            }
            $form_data["Shipping#ZIP"] = sanitize_input($_POST["shipzip"]);
            $form_data["Shipping#Country"] = sanitize_input($_POST["shipcountry"]);
        }
        $form_data["Paid_Shipping"] = sanitize_input($_POST["paid_shipping"]);
        $form_data["Insured_Shipping"] = sanitize_input($_POST["insured_shipping"]);
		if ($_POST["ein"] !== "") {
            $form_data["EIN"] = sanitize_input($_POST["ein"]);
		}
		if ($_POST["comments"] !== "") {
            $form_data["Comments"] = sanitize_input($_POST["comments"]);
		}
        $form_data["DATETIME"] = $_POST["date"];
        $form_data["IP"] = $_POST["ip"];
        $form_data["CRC"] = generate_crc($form_data);

        return $form_data;
    }

    function form_data_str($data) {
        // Convert form data array into string
        $form_str = "";

        foreach($data as $key => $value) {
            if(!is_array($value)) {
                // Remove text wrapping for additional comments
                if(str_contains($key, "Comments")) {
                    if(str_contains($value, "\n")) {
                        $i = 1;
                        foreach(explode("\n", $value) as $comment) {
                            $form_str .= $key . $i . "\t" . $comment . PHP_EOL;
                            $i++;
                        }
                    } else {
                        $form_str .= $key . "\t" . $value . PHP_EOL;
                    }
                } else {
                    $form_str .= $key . "\t" . $value . PHP_EOL;
                }
            } else {
                // instruments array
                foreach($value as $k => $v) {
                    if(!is_array($v)) {
                        // Remove text wrapping for instrument problems and repair comments
                        if(str_contains($k, "Problem") || str_contains($k, "Repair_Comment")) {
                            if(str_contains($v, "\n")) {
                                $i = 1;
                                foreach(explode("\n", $v) as $line) {
                                    $form_str .= $k . $i . "\t" . $line . PHP_EOL;
                                    $i++;
                                }
                            } else {
                                $form_str .= $k . "\t" . $v . PHP_EOL;
                            }
                        } else {
                            $form_str .= $k . "\t" . $v . PHP_EOL;
                        }
                    } else {
                        // attachments array
                        for($j = 0; $j < count($v["name"]); $j++) {
                            $form_str .= str_replace("Attachments", "Attachment", $k) . ($j + 1) . "\t" . $v["name"][$j] . " - " . convertToReadableSize($v["size"][$j]) . PHP_EOL;
                        }
                    }
                }
            }
        }

        return $form_str;
    }

    function flat_to_html($flat_file) {

        $html = "<h3>Form Summary</h3>";
        foreach(explode(PHP_EOL, $flat_file) as $flat_line) {
            $flat_line_items = explode("\t", $flat_line);
            // Remove DATETIME, IP, AND CRC
            if($flat_line_items[0] !== "DATETIME" && $flat_line_items[0] !== "IP" && $flat_line_items[0] !== "CRC") {
                if($flat_line_items[0] !== "") {
                    $html .= "<p><b>" . $flat_line_items[0] . ":</b> " . $flat_line_items[1] . "</p>";
                }
            }
        }
        return $html;
    }

    function generate_rma($data, $rma_ref, $email = "", $verified = true) {
        if($verified) {
            // Create a folder called rma in template directory and then add rma file
		    $path = get_template_directory() . "/rma/";
        } else {
            // Create a folder called rma/tmp in template directory and then add rma file
		    $path = get_template_directory() . "/rma/tmp/";
        }

		// Create folder if it doesn't exist
		if (!file_exists($path)) {
			mkdir($path, 0755, true);
		}
		// Add the rma flat file
        $rma_file_path = $path . $rma_ref . ".txt";
        file_put_contents($rma_file_path, $data);

        if(!$verified) {
            // Add rma to unverified rmas table
            add_unverified_rma_file($rma_file_path, $email);
        }

		// Prepend attachments with rma reference and move to folder
        $attachments = [];
		if (!empty($_FILES)) {
            foreach(array_keys($_FILES) as $instrument) {
                $number_of_files = count($_FILES[$instrument]["name"]);
                for ($i = 0; $i < $number_of_files; $i++) {
                    $tmp_path = $_FILES[$instrument]["tmp_name"][$i];
                    $new_path = $path . $rma_ref . $_FILES[$instrument]["name"][$i];
                    move_uploaded_file($tmp_path, $new_path);
                    array_push($attachments, $new_path);
                    if(!$verified) {
                        add_unverified_rma_file($new_path, $email, true);
                    }
                }
            }
		}

        return ["rma" => $rma_file_path, "attachments" => $attachments];
	}

	function multi_attach_mail($to, $subject, $message, $senderEmail, $senderName, $files = array()) {
		// Sender info
		$from = $senderName." <".$senderEmail.">";
		$headers = "From: $from";

		// Boundary
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

		// Headers for attachment
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

		// Multipart boundary
		$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
		"Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";

		// Preparing attachment
		if (!empty($files)) {
			for ($i=0;$i<count($files);$i++) {
				if (is_file($files[$i])) {
					$file_name = basename($files[$i]);
					$file_size = filesize($files[$i]);

					$message .= "--{$mime_boundary}\n";
					$fp =	@fopen($files[$i], "rb");
					$data =  @fread($fp, $file_size);
					@fclose($fp);
					$data = chunk_split(base64_encode($data));
					$message .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .
					"Content-Description: ".$file_name."\n" .
					"Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .
					"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
				}
			}
		}

		$message .= "--{$mime_boundary}--";
		$returnpath = "-f" . $senderEmail;

		// Send email
		mail($to, $subject, $message, $headers, $returnpath);
	}

	function mail_rma($rma_ref, $htmlContent, $attachments = []) {
		$to = 'rma_test@gemsys.ca';
        // $to = 'badgeruk.mail@gmail.com';
		$from = "website@gemsys.ca";
		$fromName = "Gemsys Website";
		$subject = "RMA: " . $rma_ref;

		// Attachment files
		// $files = [];
        // foreach($attachments as $attachment) {
        //     array_push($files, get_template_directory() . "/rma/" . $attachment);
        // }

		// Call function and pass the required arguments
        // multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files);
        multi_attach_mail($to, $subject, $htmlContent, $from, $fromName,  $attachments);
	}

    function display_rma_success($reference_number, $flat_file) {
        $html = "<h1>RMA Submission Successful</h1>";
        $html .= '<a class="rmaButton" style="float:left;margin-right:10px;text-align:center;" href="' . get_template_directory_uri() . '/rma/' . $reference_number . ".txt" . '" download>Download</a>';
        $html .= "<p>Please download and save for your records.</p>";
        $html .= '<div id="printableArea">';
        $html .= "<h2>Reference: " . $reference_number . "</h2>";
        $html .= flat_to_html($flat_file);
        $html .= "</div>";
        $html .="<br/>";
        $html .='<button class="rmaButton" type="button" onclick="printFile()" style="margin-right:10px">Print</button>';

        return $html;
    }
    function successfulRMA($ref, $file) {
        $html = '<a class="rmaButton" style="float:left;margin-right:10px;text-align:center;" href="' . get_template_directory_uri() . '/rma/' . $ref . ".txt" . '" download>Download</a>';
        $html .= "<p>Please download and save for your records.</p>";
        $html .= '<div id="printableArea">';
        $html .= "<h2>Reference: " . $ref . "</h2>";
        $html .= flat_to_html($file);
        $html .= "<br/>";
        $html .= "</div>";
        $html .= '<button class="rmaButton" type="button" onclick="printFile(event)" style="margin-right:10px">Print</button>';

        return $html;
    }
?>
