@extends('layouts.front')
@section('content')
<div class="inside_outer detail">  
	<div class="container">
		<div class="banner_container">
			<div class="banner_content detail">
				<ul>
					<li><a href="{{url('/')}}">home</a></li>
					<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
					<li>contact us</li>
				</ul>
			</div>
		</div>
		<div class="contact_add">
			<span>Our Corporate Office Address</span>
			<h2>SDF Block, E-7 & 8,<br> Noida Special Economic Zone,<br> Noida-201 305, (U.P.), India</h2>
			<ul>
				<li><a href="tel:01204094921">+91-120-4094921</a></li>
				<li><a href="mailto:info@panartglobal.com">info@panartglobal.com</a></li>
			</ul>
		</div>
		<div class="form_box">
            <div id="result" class="alert alert-success alert-dismissible" style="display:none"></div>
			<form method="POST" id="contact" autocompelte="off">
                @csrf
				<input type="text" name="name" placeholder="Your name" class="form-control">
				<input type="text" name="email" placeholder="Your email id" class="form-control">
				<input type="text" name="mobile" placeholder="Your mobile no." maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
				<input type="text" name="message" placeholder="Message" class="form-control">
				<div class="check-box">
					<span>
						<input type="radio" name="privacy" class="form-control">
						<label></label>
					</span>
				</div>
				<div class="form_content">
					<p>I understand that Panart will securely hold my data in accordance with their privacy policy.</p>
				</div>
				<input class="sbt_btn" type="submit" value="submit">
			</form>
		</div>
		<div class="enquiry_box">
			<ul>
				<li>
					<h3>Sales Inquiries</h3>
					<a href="mailto:sales@panartglobal.com">sales@panartglobal.com</a>
				</li>
				<li>
					<h3>General Inquiries</h3>
					<a href="mailto:info@panartglobal.com">info@panartglobal.com</a>
				</li>
				<li>
					<h3>Customer Care</h3>
					<a href="mailto:info@panartglobal.com">info@panartglobal.com</a>
				</li>
			</ul>
		</div>
	</div>
	<img class="full_img" src="{{ asset('front/images/contact_bg.png')}}">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#contact").validate({
		rules: {
			name: {
				required : true
			},
			email: {
				required : true
			},
			mobile: {
				required : true			
			},
            privacy:{required:true}
		},
		messages: {
				name: {
					required: "Name is required"
				},
				email: {
					required: "Email is required"
				},
                mobile: {
					required: "Mobile is required"
				}
            },
		
		submitHandler: function(form){
			  jQuery.ajax({
			    url: "{{ route('contactus') }}",
			    data: $(form).serialize(),
			    type: "POST",
			    success: function(data) {			   
			      if(data.success){
			        $("#result").show().html(data.msg);
			        $('#contact')[0].reset();
			      } else {
			        $("#result").show().html(data.msg);
                  }
			    
			    }
			  });
		}
    });
    })

</script>
@endsection