<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New PAWS Contact</title>
    <style>
      table {
        border: 1px solid #858585;
      }
      .table-row {
        padding: 0.5em;
      }

      .table-header-row {
        padding: 1em;
        background-color: lightblue;
      }

      .table-header-col {
        padding-right: 1em;
        background-color: lightgray;
      }
    </style>
  </head>
  <body>
    <table>
      <thead>
        <tr class="table-row">
          <th style="background-color: lightblue;" scope="row" colspan="2">New PAWS Contact Form</th>
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
          <th class="table-header-col" scope="col">Pet Age</th>
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