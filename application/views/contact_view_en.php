<div class="container container-contact">
	<div class="row container-contact-text">
		<h1 style="display: block; display: block; width: 100vw; padding-left: 15px; margin-bottom: 15px; font-size: 25px;"><b>CONTACT</b></h1>
		<img class="ver_green_contact" src="<?php echo base_url('assets/img/ver-green.png')?>">
		<div class="col-md-1 col-sm-1 col-xs-1 contact-line">
			<img style="float:right; padding: 0;" src="<?php echo base_url('assets/img/line-3.png')?>" >
		</div>
		<div class="col-md-5 contact-left" >
			<p><span class="contact-span">Email :</span><br>
			<span class="contact-span2"><?php echo $contact->email ?></span></p>

			<p><span class="contact-span">Address:</span><br>
			<span class="contact-span2"><?php echo $contact->address ?></span></p>

			<p><span class="contact-span">Phone :</span><br>
			<span class="contact-span2"><?php echo $contact->phone ?></span></p>

			<p><span class="contact-span">Fax :</span><br>
			<span class="contact-span2"><?php echo $contact->fax ?></span></p>
			
		</div>
		<div class="col-md-5 contact-right">
			<form action="" method="post">
				<?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-dismissible show" role="alert" >
                      <?php echo $this->session->flashdata('success');?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top:-5px; font-size: 26px;">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                <?php } ?>
				<P>
					<label>NAME</label>
					<br><input type="text" name="name" class="input-contact" required>
				</P>

				<P><label>COMPANY</label>
				<br><input type="text" name="company" class="input-contact" required>
				</P>

				<p><label>EMAIL</label>
				<br><input type="email" class="input-contact" name="email" required>
				</p>

				<p><label>SUBJECT</label>
				<br><input type="text" class="input-contact" name="subject" required>
				</p>

				<p><label>MESSAGE</label>
				<br><textarea name="message" class="input-contact"></textarea>
				</p>

				<button type="submit" class="button-send" >SEND</input>
			</form>
		</div>
	</div>

	<img class="bottom-image" src="<?php echo base_url('assets/img/bottom-right.png')?>">
	<?php include "footer_text.php" ?>
</div>