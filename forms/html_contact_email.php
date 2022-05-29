<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New PAWS Contact</title>
    <style>
      table {
        border: 2px solid #858585;
        border-radius: 4px;
      }
      .table-row {
        padding: 16px;
      }

      .table-header-row {
        padding: 16px;
        background-color: lightblue;
        text-align: center;
      }

      .table-header-col {
        padding-right: 16px;
        background-color: lightgray;
      }
    </style>
  </head>
  <body>
    <table>
      <thead>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">New PAWS Contact Form</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Email</th>
          <td><?php echo("$email") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Name</th>
          <td><?php echo("$name") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Address</th>
          <td><?php echo("$street<br />$city<br />$state<br />$zip_code") ?></td>
        </tr>
          <tr class="table-row">
          <th class="table-header-col" scope="col">Phone</th>
          <td><?php echo("$phone") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Pet Type</th>
          <td><?php echo("$pet_type") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Pet Gender</th>
          <td><?php echo("$pet_gender") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Pet Age(years)</th>
          <td><?php echo("$pet_age") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reason for contact</th>
          <td><?php echo("$reason") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Comments</th>
          <td><?php echo("$comments") ?></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
