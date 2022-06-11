<!DOCTYPE html>
<html lang="en">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New PAWS Volunteer</title>
    
  </head>
  <body>
    <table style="border-radius: 4px; border: 2px solid #858585;">
      <thead>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">New PAWS Volunteer Form</th>
        </tr>
      </thead>
      <tbody>
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
            " " . $_SESSION['zip-code']); ?>
          </td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Birth Year</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['birth-year']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">Emergency Contact Information</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Emergency contact name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ec-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Emergency contact relationship</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ec-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Emergency contact phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ec-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Emergency contact email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ec-email']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">About the Volunteer</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Occupation</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['occupation']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Part-time or full-time</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['pt-ft']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Employer/School</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['employer']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Length of time on job</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['time']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            Professional Certifications
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['certifications']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Languages</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['languages']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px; min-width: fit-content;" align="right" bgcolor="lightgray">
            Previously volunteered with animal organizations
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['animal-orgs']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            Previous volunteer organizations
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['volunteer-work']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Criminal convictions</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['conviction']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            How did they hear about PAWS?
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['about-paws']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">
            Why are they volunteering with PAWS?
          </th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['volunteer-reason']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Do they drive?</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['drive']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Experience with animals</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['animal-experience']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">Volunteer Interests</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Volunteer Interests</th>
          <td style="padding-top: 8px; padding-bottom: 8px;">
          <?php
          recurse_thru_array($_SESSION['interests']);
        
            function recurse_thru_array($item) {
              foreach ($item as $key => $value) {
                if (is_array($value)) {
                  recurse_thru_array($value);
                } else {
                echo "$value<br />";
                }
              }
            }

          ?>
          </td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Other comments</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['other-info']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">Availability</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Volunteer availability</th>
          <td style="padding-top: 8px; padding-bottom: 8px;">
          <?php recurse_thru_array($_SESSION['availability']); ?>
          </td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">References (No family references, prior volunteer organizations and employment references preferred.) </th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #1 name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref1-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #1 relationship</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref1-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #1 phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref1-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #1 email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref1-email']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #2 name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref2-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #2 relationship</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref2-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #2 phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref2-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #2 email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref2-email']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #3 name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref3-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #3 relationship</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref3-relationship']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #3 phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref3-phone']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Reference #3 email</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['ref3-email']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Veterinarian reference name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['vet-name']) ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Veterinarian reference phone</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['vet-phone']) ?></td>
        </tr>
        <tr class="table-row table-header-row" style="padding: 16px;" align="center" bgcolor="lightblue">
          <th scope="row" colspan="2" style="padding-top: 8px; padding-bottom: 8px;">SWAP Disclaimer</th>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray"></th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo <<<_EOT
              <h3>If you are volunteering for Seniors with Animals Project ("SWAP"): </h3>

              <h3>Volunteer Guidelines</h3>
              <p>As a PAWS SWAP Volunteer, I agree to:</p>
              <ul>
                <li>Never discuss client details/information with people outside of PAWS.</li>
                <li>Make a minimum 6 month commitment if I sign up to be a 'House call' volunteer.</li>
                <li>Show up and be on time for every appointment, rain or shine; dangerous, ice/heavy snow is exception.</li>
                <li>Set boundaries with clients and know my own personal boundaries.</li>
                <li>Notify PAWS and client promptly if I must cancel for any reason.</li>
                <li>Introduce myself to clients when they are present.</li>
                <li>Respect the privacy of all clients and conduct myself in a professional manner.</li>
                <li>Notify client and PAWS if unable to make appointment regardless of reason.</li>
                <li>Always pick up after dogs and properly dispose of waste when cleaning litter.</li>
                <li>Do my best to avoid other dogs and people (esp. children) when walking a dog.</li>
                <li>Never bring other pets or children with me on my visits; unless discussed and approved by PAWS.</li>
                <li>Never take dogs off leash for any reason, even if client asks me to do so.</li>
                <li>Limit assistance to pre-approved services, and I will refer client to PAWS if they request additional services.</li>
                <li>Never accept compensation from a client, and never loan or give a client personal items or money.</li>
                <li>Contact PAWS if I believe a client or pet is at risk for any reason.</li>
                <li class="background-check-clause">Due to the specific nature of this volunteer assignment, I understand that PAWS must do a background check, including criminal, and expressly grant my permission for them to do the same.</li>
              </ul>

            <p>I affirm that the information supplied is true to the best of my knowledge and agree to adhere to the above Volunteer Guidelines. I understand that failure to follow the guidelines or any PAWS rule can result in the termination of my volunteer status. I understand that I am responsible for myself and agree that PAWS and PAWS agents are not liable in the event of accident, injury, death, or other incident.
            </p>
_EOT;
          ?></td>
        </tr>
        <tr class="table-row">
          <th class="table-header-col" scope="col" style="padding-top: 8px; padding-bottom: 8px; padding-right: 16px;" align="right" bgcolor="lightgray">Full Legal Name</th>
          <td style="padding-top: 8px; padding-bottom: 8px;"><?php echo($_SESSION['signature']) ?></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
