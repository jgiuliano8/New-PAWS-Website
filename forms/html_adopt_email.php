<!DOCTYPE html>
<html lang="en">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New PAWS Adoption Application</title>
    
  </head>
  <body>
    <table style="border-radius: 4px; border: 2px solid #858585;">
      <thead>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">New PAWS Adoption Application</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Which do you want to adopt animal?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['pet']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">What type of animal is it?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['pet_type']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">Contact Information</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['email']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Address</th>
          <td style="padding-top: 8px; padding-bottom: 8px;">
            <?php echo($_SESSION['street'] . "<br />" . $_SESSION['city'] . ", " . $_SESSION['state'] .
            " " . $_SESSION['zip-code']) ?>;
          </td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['phone']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">About You</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Age</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['age']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Occupation</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['occupation']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Work Hours</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['work-hours']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">Household Information</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Housing</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['housing']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Other housing description</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['other-housing'] === '') ? "N/A" : $_SESSION['other-housing']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Own or Rent</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['own-rent']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Does landlord allow pets?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['pets-allowed'] === '') ? "N/A" : $_SESSION['pets-allowed']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Landlord's Name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['landlord-name'] === '') ? "N/A" : $_SESSION['landlord-name']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Landlord's Phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['landlord-phone'] === '') ? "N/A" : $_SESSION['landlord-phone']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">How long have you been living at your current residence?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['length-residence']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Are you planning on moving in the next 12 months?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['moving']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Number of adults in the household</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['adults']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Relation of adults</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['adults-relation']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Children in the household?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['children']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Number of Children</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['number-children'] === '') ? "N/A" : $_SESSION['number-children']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Age of the children</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['age-children'] === '') ? "N/A" : $_SESSION['age-children']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Will the pet be in contact with other children?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['other-children']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Do all of the members of the household want to adopt this pet?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['all-willing']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Who will be the main caretaker of this pet?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['caretaker']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Are there people with allergies in the household?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['allergies']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">What types of allergies?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['type-allergies'] === '') ? "N/A" : $_SESSION['type-allergies']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reason for wanting to adopt this pet</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['adopt-reason']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Where will the pet be kept?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['pet-kept']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">How many hours a day will the pet be alone?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['hours-alone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">What is the size of your yard?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['yard-size'] === '') ? "N/A" : $_SESSION['yard-size']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Is the yard fully fenced?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['fully-fenced']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">What height and type of fence is it?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['fence'] === '') ? "N/A" : $_SESSION['fence']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">How will the dog be restrained outside?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['outside-restraint'] === '') ? "N/A" : $_SESSION['outside-restraint']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">What behaviors do you consider unacceptable?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['unacceptable-behavior']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">What reasons justify rehoming your pet?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['rehoming-reasons']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th colspan="2" scope="row" style="padding-top: 8px; padding-bottom: 8px;">
            Past and Present Pet Information
          </th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Past Pets</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['past-pets']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            Present Pets
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['present-pets']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            What happened to previous pets?
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['pets-what-happened']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">If deceased, at what age did it/they pass?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['age-deceased']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            Can you afford to provide medical care, proper diet, proper shelter, training, exercise, and grooming for your pet?
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['afford-medical']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            If an unexpected illness or injury were to occur, can you afford to provide the needed care for this pet?
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['afford-unexpected']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">References</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 1 name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref1-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 1 relationship</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref1-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 1 phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref1-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 1 email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['ref1-email'] === '') ? "N/A" : $_SESSION['ref1-email']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 2 name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref2-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 2 relationship</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref2-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 2 phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref2-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 2 email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['ref2-email'] === '') ? "N/A" : $_SESSION['ref2-email']; ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 3 name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref3-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 3 relationship</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref3-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 3 phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref3-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference 3 email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo ($_SESSION['ref3-email'] === "") ? "N/A" : $_SESSION['ref3-email'] ?></td>
        </tr>
        
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Veterinary name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['vet-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Veterinary phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['vet-phone']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">Care Consent</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Care Consent Statement</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo("I agree to provide all the necessary care for this pet, including but not limited to: veterinary care, proper diet, shelter, training, exercise, grooming, and love. If for any reason I am no longer able to care for this pet, I will return him/her and all necessary paperwork to Pioneers for Animal Welfare Society, Inc. I certify that all of the answers given on this form are true.") ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Care Consent Response</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['care-consent']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Full Legal Name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['signature']) ?></td>
        </tr>

      </tbody>
    </table>
  </body>
</html>
