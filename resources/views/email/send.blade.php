

<div style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;">
    <table style="width: 100%;">
      <tr>
        <td></td>
        <td bgcolor="#FFFFFF ">
          <div style="padding: 15px; max-width: 600px;margin: 0 auto;display: block; border-radius: 0px;padding: 0px; border: 1px solid lightseagreen;">
            <table style="width: 100%;background: #8DC53F ;">
              <tr>
                <td></td>
                <td>
                  <div>
                    <table width="100%">
                      <tr>
                        <td rowspan="2" style="text-align:center;padding:10px;">
							<img style="float:left; "  src="" /> 
							
							<span style="color:white;float:right;font-size: 13px;font-style: italic;margin-top: 20px; padding:10px; font-size: 14px; font-weight:normal;">
							"Write anythinh here"<span></span></span></td>
                      </tr>
                    </table>
                  </div>
                </td>
                <td></td>
              </tr>
            </table>
            <table style="padding: 10px;font-size:14px; width:100%;">
              <tr>
                <td style="padding:10px;font-size:14px; width:100%;">
                    <p>Hi person's firstname</p>
                    <p><br />  Please click below to verify your account.</p>
                    <p><a href="{{route('sendEmailDone',['email' => $user->email,'token'=>$user->token])}}" style="color:blue;font-size:12px;">Verify Account</a></p>
                   
                    <p>Thanks for choosing myescrow,</p>
                    <p>myescrow Team.</p>
                  <!-- /Callout Panel -->
                  <!-- FOOTER -->
                 </td>
              </tr>
			  <tr>
			  <td>
				 <div align="center" style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;">
                    © 2017 <a href="" target="_blank" style="color:#333; text-decoration: none;">myescrow</a>
                  </div>
                </td>
			  </tr>
            </table>
          </div>



