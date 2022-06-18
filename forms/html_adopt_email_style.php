<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New PAWS Adoption Application</title>
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
          <th scope="row" colspan="2">New PAWS Adoption Application</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Which pet do you want to adopt?</th>
          <td><?php echo($_SESSION['pet']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">What type of animal is it?</th>
          <td><?php echo($_SESSION['pet_type']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">Contact Information</th>
        </tr>
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
            <?php echo($_SESSION['street'] . "<br />" . $_SESSION['city'] . ", " . $_SESSION['state'] .
            " " . $_SESSION['zip-code']) ?>
          </td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Phone</th>
          <td><?php echo($_SESSION['phone']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">About You</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Age</th>
          <td><?php echo($_SESSION['age']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Occupation</th>
          <td><?php echo($_SESSION['occupation']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Work Hours</th>
          <td><?php echo($_SESSION['work-hours']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">Household Information</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Housing</th>
          <td><?php echo($_SESSION['housing']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Other housing description</th>
          <td><?php echo ($_SESSION['other-housing'] === '') ? "N/A" : $_SESSION['other-housing']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Own or Rent</th>
          <td><?php echo($_SESSION['own-rent']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Does landlord allow pets?</th>
          <td><?php echo ($_SESSION['pets-allowed'] === '') ? "N/A" : $_SESSION['pets-allowed']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Landlord's Name</th>
          <td><?php echo ($_SESSION['landlord-name'] === '') ? "N/A" : $_SESSION['landlord-name']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Landlord's Phone</th>
          <td><?php echo ($_SESSION['landlord-phone'] === '') ? "N/A" : $_SESSION['landlord-phone']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">How long have you been living at your current residence?</th>
          <td><?php echo($_SESSION['length-residence']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Are you planning on moving in the next 12 months?</th>
          <td><?php echo($_SESSION['moving']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Number of adults in the household</th>
          <td><?php echo($_SESSION['adults']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Relation of adults</th>
          <td><?php echo($_SESSION['adults-relation']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Children in the household?</th>
          <td><?php echo($_SESSION['children']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Number of Children</th>
          <td><?php echo ($_SESSION['number-children'] === '') ? "N/A" : $_SESSION['number-children']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Age of the children</th>
          <td><?php echo ($_SESSION['age-children'] === '') ? "N/A" : $_SESSION['age-children']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Will the pet be in contact with other children?</th>
          <td><?php echo($_SESSION['other-children']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Do all of the members of the household want to adopt this pet?</th>
          <td><?php echo($_SESSION['all-willing']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Who will be the main caretaker of this pet?</th>
          <td><?php echo($_SESSION['caretaker']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Are there people with allergies in the household?</th>
          <td><?php echo($_SESSION['allergies']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">What types of allergies?</th>
          <td><?php echo ($_SESSION['type-allergies'] === '') ? "N/A" : $_SESSION['type-allergies']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reason for wanting to adopt this pet</th>
          <td><?php echo($_SESSION['adopt-reason']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Where will the pet be kept?</th>
          <td><?php echo($_SESSION['pet-kept']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">How many hours a day will the pet be alone?</th>
          <td><?php echo($_SESSION['hours-alone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">What is the size of your yard?</th>
          <td><?php echo ($_SESSION['yard-size'] === '') ? "N/A" : $_SESSION['yard-size']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Is the yard fully fenced?</th>
          <td><?php echo($_SESSION['fully-fenced']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">What height and type of fence is it?</th>
          <td><?php echo ($_SESSION['fence'] === '') ? "N/A" : $_SESSION['fence']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">How will the dog be restrained outside?</th>
          <td><?php echo ($_SESSION['outside-restraint'] === '') ? "N/A" : $_SESSION['outside-restraint']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">What behaviors do you consider unacceptable?</th>
          <td><?php echo($_SESSION['unacceptable-behavior']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">What reasons justify rehoming your pet?</th>
          <td><?php echo($_SESSION['rehoming-reasons']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th colspan="2" scope="row">
            Past and Present Pet Information
          </th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Past Pets</th>
          <td><?php echo($_SESSION['past-pets']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            Present Pets
          </th>
          <td><?php echo($_SESSION['present-pets']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            What happened to previous pets?
          </th>
          <td><?php echo($_SESSION['pets-what-happened']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">If deceased, at what age did it/they pass?</th>
          <td><?php echo($_SESSION['age-deceased']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            Can you afford to provide medical care, proper diet, proper shelter, training, exercise, and grooming for your pet?
          </th>
          <td><?php echo($_SESSION['afford-medical']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">
            If an unexpected illness or injury were to occur, can you afford to provide the needed care for this pet?
          </th>
          <td><?php echo($_SESSION['afford-unexpected']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">References</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 1 name</th>
          <td><?php echo($_SESSION['ref1-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 1 relationship</th>
          <td><?php echo($_SESSION['ref1-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 1 phone</th>
          <td><?php echo($_SESSION['ref1-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 1 email</th>
          <td><?php echo ($_SESSION['ref1-email'] === '') ? "N/A" : $_SESSION['ref1-email']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 2 name</th>
          <td><?php echo($_SESSION['ref2-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 2 relationship</th>
          <td><?php echo($_SESSION['ref2-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 2 phone</th>
          <td><?php echo($_SESSION['ref2-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 2 email</th>
          <td><?php echo ($_SESSION['ref2-email'] === '') ? "N/A" : $_SESSION['ref2-email']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 3 name</th>
          <td><?php echo($_SESSION['ref3-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 3 relationship</th>
          <td><?php echo($_SESSION['ref3-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 3 phone</th>
          <td><?php echo($_SESSION['ref3-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Reference 3 email</th>
          <td><?php echo ($_SESSION['ref3-email'] === "") ? "N/A" : $_SESSION['ref3-email'] ?></td>
        </tr>
        
        <tr class="table-row">
          <th class="table-header-col" scope="col">Veterinary name</th>
          <td><?php echo($_SESSION['vet-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Veterinary phone</th>
          <td><?php echo($_SESSION['vet-phone']) ?></td>
        </tr>
        <tr class="table-row table-header-row">
          <th scope="row" colspan="2">Care Consent</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Care Consent Statement</th>
          <td><?php echo("I agree to provide all the necessary care for this pet, including but not limited to: veterinary care, proper diet, shelter, training, exercise, grooming, and love. If for any reason I am no longer able to care for this pet, I will return him/her and all necessary paperwork to Pioneers for Animal Welfare Society, Inc. I certify that all of the answers given on this form are true.") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Care Consent Response</th>
          <td><?php echo($_SESSION['care-consent']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col">Full Legal Name</th>
          <td><?php echo($_SESSION['signature']) ?></td>
        </tr>

      </tbody>
    </table>
  </body>
</html>
