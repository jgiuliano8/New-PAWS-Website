<!DOCTYPE html>
<html lang="en">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New PAWS Contact</title>
    
  </head>
  <body>
    <table style="border-radius: 4px; border: 2px solid #858585;">
      <thead>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">New PAWS Contact Form</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$email") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$name") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Address</th>
          <td style="padding-top: 8px; padding-bottom: 8px;">
<?php echo("$street<br />$city, $state $zip_code"); ?></td>
        </tr>
          <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$phone") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Pet Type</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$pet_type") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Pet Gender</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$pet_gender") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Pet Age(years)</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$pet_age") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reason for contact</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$reason") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Comments</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("$comments") ?></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
