 <?php 

        // read the paramters from session 
        $parameters     = $_SESSION['SmartRouteParams']; 
        $redirectURL    = $parameters["RedirectURL"]; 
        $merchantID     = $parameters['MerchantID']; 
        $amount         = $parameters['Amount']; 
  $currencyCode   = $parameters['CurrencyISOCode']; 
  $language       = $parameters['Language']; 
  $messageID      = $parameters['MessageID']; 
  $transactionID  = $parameters['TransactionID']; 
  $themeID        = $parameters['ThemeID']; 
  $responseBackURL= $parameters['ResponseBackURL']; 
  $quantity       = $parameters['Quantity']; 
  $channel        = $parameters['Channel']; 
  $secureHash     = $parameters['SecureHash']; 
  $version        = $parameters['Version']; 
  ?> 

    
    

      <form action="<?php echo $redirectURL?>" method="post" name="redirectForm" id="redirectForm"> 
          <input name="MerchantID" type="hidden" value="<?php echo $merchantID?>"/> 
          <input name="Amount" type="hidden" value="<?php echo $amount?>"/> 
          <input name="CurrencyISOCode" type="hidden" value="<?php echo $currencyCode?>"/> 
          <input name="Language" type="hidden" value="<?php echo $language?>"/> 
          <input name="MessageID" type="hidden" value="<?php echo $messageID?>"/> 
          <input name="TransactionID" type="hidden" value="<?php echo $transactionID?>"/> 
          <input name="ThemeID" type="hidden" value="<?php echo $themeID?>"/> 
          <input name="ResponseBackURL" type="hidden" value="<?php echo $responseBackURL?>"/> 
          <input name="Quantity" type="hidden" value="<?php echo $quantity?>"/> 
          <input name="Channel" type="hidden" value="<?php echo $channel?>"/> 
          <input name="Version" type="hidden" value="<?php echo $version?>"/> 
          <input name="SecureHash" type="hidden" value="<?php echo $secureHash?>"/> 
      </form> 
 
 <script>
     $(document).ready(function(){
         debugger;
         $("#redirectForm").submit();
     })
 </script>   