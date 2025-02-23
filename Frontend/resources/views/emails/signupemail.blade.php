<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Confirmation instructions</title>

   <style>
      @media (max-width: 479px) {
         .footer-content {
            display: block;
            text-align: center;
         }
         .footer-social {
            display: block;
            text-align: center;
         }
      }
   </style>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif;">

   <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; width: 100%; margin: auto; background-color: #fff;">
      <tr>
         <td>
            <table cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; width: 100%; border-bottom: 1px solid rgba(0, 0, 0, 0.10); box-shadow: 4px 4px 10px 0px rgba(0, 0, 0, 0.05); border-radius: 0;">
               <!-- Header Section -->
               <tr>
                  <td style="padding: 20px 0 20px 20px;">
                     <a href="#"><img src="https://i.postimg.cc/0zjYZbjG/logo.png" alt="logo" border="0" width="180" style="width: 100%; max-width: 170px;"></a>
                  </td>
                  <td style="text-align: right; padding: 20px 20px 20px 0;">
                     <a href="#"
                        style="font-size: 14px; padding: 8px 16px 8px 16px; border: 0; border-radius: 100px; color: #fff; font-weight: 700; text-decoration: none; background-color: #0071DC; display: inline-block;">View in Browser</a>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <!-- Main Content -->
      <tr>
         <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; width: 100%; margin: auto; background-color: #fff;">
            <tr>
               <td style="padding: 27px 40px 45px 30px;">
                  <h2 style="font-size: 14px; padding-bottom: 22px; margin: 0;">Verify Your Account with PocketLedger</h2>
                  <p style="font-size: 16px; color: #333333; padding-bottom: 15px; margin: 0;">Dear <b>{{$user->first_name}}</b>,</p>
                  <p style="font-size: 16px; line-height: 28px; padding-bottom: 22px; margin: 0;">
                     Thank you for registering with PocketLedger! To complete your account verification, please use the
                     following digital verification code:
                  </p>
                  <p style="font-size: 16px; font-weight: bold; line-height: 28px; padding-bottom: 22px; margin: 0;"><b>Verification Code: {{$user->verificationCode}}</b>
                  </p>
                  <p style="font-size: 16px; line-height: 28px; padding-bottom: 22px; margin: 0;">
                     Please enter this code in the verification field on our website to confirm your account. If you did not
                     request this verification, please ignore this email.
                  </p>
                  <p style="font-size: 16px; line-height: 28px; padding-bottom: 22px; margin: 0;">
                     If you have any questions or need assistance, feel free to reach out to our support team.
                  </p>
                  <p style="font-size: 16px; line-height: 28px; margin: 0;">Thank you for choosing
                     <b>PocketLedger</b>!</p>
               </td>
            </tr>
            <tr>
               <td style="padding: 0px 40px 70px 30px;">
                  <p style="font-size: 16px; line-height: 28px; margin: 0;">Best regards,</p>
                  <p style="font-size: 16px; line-height: 28px; margin: 0;"><b>The PocketLedger Team</b></p>
                  <a style="font-size: 16px; line-height: 28px; display: block; text-decoration: none; color: #000; margin: 0;" href="mailto:support@pocketledger.in">support@pocketledger.in</a>
                  <a style="font-size: 16px; line-height: 28px; display: block; margin: 0; color: #0C4ADA;" href="http://www.pocketledger.in">http://www.pocketledger.in</a>
               </td>
            </tr>
         </table>
        
      </tr>

      <!-- Footer -->
      <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; width: 100%; margin: auto; background-color: #E6E6E6;">
         <tbody>
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; width: 100%; margin: auto; background-color: #E6E6E6;">
               <tbody>
                  <tr>
                     <td class="footer-content" style="padding: 24px 24px 24px 24px;">
                        <p style="font-size: 12px; margin: 0;">© 2024 PocketLedger India Private Ltd.</p>
                        <p style="font-size: 12px; margin: 0;">An Equal Opportunity Employer
                           M/F/Disability/Veterans.</p>
                        <p style="font-size: 12px; margin: 0;">210 JP Nagar House, Bangalore India</p>
                        
                     </td>
                     <td class="footer-social">
                        <a href="#" style="display: inline-block; text-decoration: none;"><img src="https://i.postimg.cc/Fd509pZG/tiktok.png" alt="tiktok" border="0" width="24" height="24" style="width: 24px; height: 24px;"></a>
                        <a href="#" style="display: inline-block; text-decoration: none;"><img src="https://i.postimg.cc/Q9Q1V7YD/linkedin.png" alt="linkedin" border="0" width="24" height="24" style="width: 24px; height: 24px;"></a>
                        <a href="#" style="display: inline-block; text-decoration: none;"><img src="https://i.postimg.cc/FY6j6NkM/instagram.png" alt="instagram" border="0" width="24" height="24" style="width: 24px; height: 24px;"></a>
                        <a href="#" style="display: inline-block; text-decoration: none;"><img src="https://i.postimg.cc/GBskwVkH/facebook.png" alt="facebook" border="0" width="24" height="24" style="width: 24px; height: 24px;"></a>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; margin: auto; background-color: #E6E6E6;">
               <tbody>
                  <tr>
                     <td style="padding: 20px; text-align: center;">
                        <p style="font-size: 12px; margin: 20px 0 0;">For more information, visit <a href="#" style="text-decoration: none; color: #000;">pocketledget.in</a></p>
                        <p style="font-size: 12px; margin: 0;"><a href="#" style="display: inline-block; text-decoration:  none; color: #000;">Terms Of Use</a> | <a href="#" style="display: inline-block; text-decoration:  none; color: #000;">Privacy Policy</a> | <a href="#" style="display: inline-block; text-decoration:  none; color: #000;">Contact Us</a> |</p>
                        <p style="font-size: 12px; margin: 0;">Unsubscribe All referenced trademarks are the property of their respective owners</p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </tbody>
      </table>
   </table>
   

</body>

</html>