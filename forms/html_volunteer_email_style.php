<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New PAWS Volunteer</title>
    <style type="text/css">
      table {
        border: 2px solid #858585;
        border-radius: 4px;
      }

      th,
      td {
        padding-top: 8px;
        padding-bottom: 8px;
      }

      .table-header-row {
        padding: 16px;
        background-color: lightblue;
        text-align: center;
      }

      .table-header-col {
        padding-right: 16px;
        background-color: lightgray;
        text-align: right;
      }
    </style>
  </head>
  <body>
    <table>
      <thead>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">New PAWS Volunteer Form</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Email</th>
          <td><?php echo($_SESSION['email']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Name</th>
          <td><?php echo($_SESSION['name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Address</th>
          <td>
            <?php echo($_SESSION['street'] . "<br />" . $city . ", " . $state .
            " " . $zipcode) ?>
          </td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Phone</th>
          <td><?php echo($_SESSION['phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Birth Year</th>
          <td><?php echo($_SESSION['birth_year']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">Emergency Contact Information</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">EC Name</th>
          <td><?php echo($_SESSION['ec_name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">EC Relationship</th>
          <td><?php echo($_SESSION['ec_relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">EC Phone</th>
          <td><?php echo($_SESSION['ec_phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">EC Email</th>
          <td><?php echo($_SESSION['ec_email']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">About the Volunteer</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Occupation</th>
          <td><?php echo($_SESSION['occupation']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Employer/School</th>
          <td><?php echo($_SESSION['employer']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Length of time on job</th>
          <td><?php echo($_SESSION['time']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            Professional Certifications
          </th>
          <td><?php echo($_SESSION['certifications']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Languages</th>
          <td><?php echo($_SESSION['languages']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            Previously volunteered with animal organizations
          </th>
          <td><?php echo($_SESSION['animal-orgs']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            Previous volunteer organizations
          </th>
          <td><?php echo($_SESSION['volunteer-work']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Criminal convictions</th>
          <td><?php echo($_SESSION['convictions']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            How did they hear about PAWS?
          </th>
          <td><?php echo($_SESSION['about-paws']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            Why are they volunteering with PAWS?
          </th>
          <td><?php echo($_SESSION['volunteer-reason']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">About themselves</th>
          <td><?php echo($_SESSION['about-yourself']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Experience with animals</th>
          <td><?php echo($_SESSION['animal-experience']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">Volunteer Interests</th>
        </tr>
        <?php
        foreach($_SESSION[interests[]] as $key) {
          echo <<<_EOT
        <tr class="table-row">
          <th class="table-header-col" scope="col">Volunteer Interests</th>
          <td>$_SESSION[interests[$key]</td>
        </tr>
_EOT;
        } ?>

      </tbody>
    </table>
  </body>
</html>
