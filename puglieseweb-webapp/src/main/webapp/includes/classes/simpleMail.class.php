<?php
class SimpleMail{
	var $to = NULL;
	var $cc = NULL;
	var $bcc = NULL;
	var $from = NULL;
	var $subject = "";
	var $body = "";
	var $htmlbody = "";
	var $send_text = TRUE;
	var $send_html = FALSE;
	var $message = "";
	var $headers = "";

	function send($to = NULL, $subject = NULL, $message = NULL, $headers = NULL) {
		if (func_num_args() >= 3) {
			$this->to = $to;
			$this->subject = $subject;
			$this->message = $message;
			if ($headers) {
				$this->headers = $headers;
			}
		}
		else {
			if ($this->from) {
				$this->headers .= "From: " . $this->from . "\r\n";
			}
			if ($this->cc) {
				$this->headers .= "Cc: " . $this->cc . "\r\n";
			}
			if ($this->bcc) {
				$this->headers .= "Bcc: " . $this->bcc . "\r\n";
			}

			if ($this->send_text and !$this->send_html) {
				$this->message = $this->body;
			}
			elseif ($this->send_html and !$this->send_text) {
				$this->message = $this->htmlbody;
				$this->headers .= "MIME-Version: 1.0\r\n";
				$this->headers .= "Content-type: text/html; " .
					"charset=iso-8859-1\r\n";
			}
			else {
				$_boundary = "==MP_Bound_xyccr948x==";

				$this->headers = "MIME-Version: 1.0\r\n";
				$this->headers .= "Content-type: multipart/alternative;
" .
	"boundary=\"$_boundary\"\r\n";
				$this->message = "This is a Multipart Message in " .
					"MIME format\n";
				$this->message .= "--$_boundary\n";
				$this->message .= "Content-Type: text/plain; " .
					"charset=\"iso-8859-1\"\n";
				$this->message .= "Content-Transfer-Encoding: 7bit\n\n";
				$this->message .= $this->body . "\n";
				$this->message .= "--$_boundary\n";
				$this->message .= "Content-type: text/html; " .
					"charset=\"iso-8859-1\"\n";
				$this->message .= "Content-Transfer-Encoding: 7bit\n\n";
				$this->message .= $this->htmlbody . "\n";
				$this->message .= "--$_boundary--";
			}
		}
		if (!mail($this->to,$this->subject,$this->message,$this->headers)) {
// 			throw new Exception('Sending mail failed.');
			echo 'Sending mail failed.';
			return FALSE;
		} else {
			return TRUE;
		}
	}
}

?>
