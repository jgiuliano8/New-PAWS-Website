<?php
session_start() != FALSE
  or die('Could not start session');

// Error handling
set_error_handler("ErrorHandler");

function ErrorHandler($no, $str, $file, $line) {
  echo <<< _EOT
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PAWS Adoption Fomr Error</title>
    <style type="text/css"></style>
  </head>
  <body>
    <div style="border: 2px dotted; padding: 5px 10px; background-color: tan">
      Line $line: <span style="color: red">$str</span> in
      <span style="color: blue">$file</span>
    </div>
  </body>
</html>
_EOT; }
// Parsing and scrubbing functions library
require "../../forms/parse_lib.php";
// Initialize SESSION variables $_SESSION['pet'] =
$_SESSION['pet_type'] = $_SESSION['name'] = $_SESSION['email'] =
$_SESSION['street'] = $_SESSION['city'] = $_SESSION['state'] =
$_SESSION['zip-code'] = $_SESSION['phone'] = $_SESSION['age'] =
$_SESSION['occupation'] = $_SESSION['work-hours'] = $_SESSION['ec-phone'] =
$_SESSION['ec-email'] = '';

// Set SESSION variables to POST variables so they carry over
// to other pages // Then scrub and validate SESSION variables
foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    $_SESSION[$key] = parse_input($_SESSION[$key]);
    switch($key) {
      case 'pet': if(!letters_space_only($_SESSION[$key])) {
        echo("Only letters and white space allowed in the pet field. Please go back and input correctly. <br /><br />");
        exit;
        }
        break;

      case 'pet_type':  if(!letters_space_only($_SESSION[$key])) {
        echo("Only letters and white space allowed in the pet type field. Please go back and input correctly. <br /> <br />");
        exit;
        } 
        break;

      case 'name': if(!letters_space_only($_SESSION[$key])) {
          echo("Only letters and white space allowed in the name field. Please go back and input correctly. <br />  <br />");
          exit;
          }
        break;

      case 'email': if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
        echo("Invalid email format. Please go back and input a valid email. <br /> <br />");
        exit;
      }
      break;

      case 'street': if (!letters_numbers_space_only($_SESSION[$key])) { 
        echo("Only letters, numbers and white space allowed in the street field. Please go back and input correctly. <br /> <br />");
        exit;
      };
      break;
      
      case 'city': if(!letters_space_only($_SESSION[$key])) {
        echo("Only letters and white space allowed in the city field. Please go back and input correctly. <br /><br />");
        exit;
      }
      break;
      
      case 'state': if(!letters_space_only($_SESSION[$key])) {
        echo("Only letters and white space allowed in the city field. Please go back and input correctly. <br /><br />");
        exit;
      }
      break;
      
      case 'zip-code': if(!zipcode_only($_SESSION[$key])) {
        echo("Please go back and input a valid ZIP Code, 5 digits or optionally ZIP+4.<br />");
        exit;
      }
      break;
      
      case 'phone': if(!phone_number_only($_SESSION[$key])) {
        echo("Please go back and input a valid phone number in the form ###-###-####.");
        exit;
      }
      break;
      
      case 'age': if(!numbers_only($_SESSION[$key])) {
        echo("Please go back and input a valid number in the age field.");
        exit;
      }
      break;
      
      case 'occupation': if(!letters_space_only($_SESSION[$key])) {
        echo("Only letters and white space allowed in the occupation  field. Please go back and input correctly. <br /><br />");
        exit;
      }
      break;

      case 'work-hours': if(!textarea_only($_SESSION[$key])) {
        echo("Only letters and white space allowed in the emergency contact relationship field. Please go back and input correctly.<br /><br />");
        exit;
      }
      break;
      
      default: echo("Invalid variable name: $key. Sorry, something went wrong. Please go back and try again.");
      exit;
    }
  }
}
      
// HTML Document
echo <<< _EOT
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adopt from PAWS</title>
    <link rel="icon" href="/images/favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="/styles/styles.css" />
    <link rel="stylesheet" href="/styles/navigation.css" />
    <link rel="stylesheet" href="/styles/forms.css" />
    <script defer src="/scripts/navigation.js"></script>
    <script defer src="/scripts/progress.js"></script>
    <script defer src="/scripts/adopt.js"></script>
    <script
      src="https://kit.fontawesome.com/38f08b7a2b.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="/index.html">
          <img src="/images/logo-PAWS-v2.jpg" alt="PAWS Logo" class="logo__img"
        /></a>
        <p class="logo__txt">Pioneers for Animal Welfare Society, Inc.</p>
        <p class="logo__tagline">
          We are <span class="logo__tagline--bold">PAWS!</span>
        </p>
      </div>

      <!-- Begin Search Box -->

      <form action="/html/search-results.html" method="GET" class="paws-search">
        <label for="paws-search" class="paws-search__lbl"></label>
        <input
          type="text"
          name="q"
          placeholder="search PAWS"
          size="10"
          class="paws-search__inpt"
        />
        <button type="submit">
          <i class="fas fa-search paws-search__icn"></i>
        </button>
      </form>

      <!-- End Search box -->

      <a tabindex="0" aria-label="Open navigation" class="hamburger"
        ><div class="hamburger__bar"></div
      ></a>

      <!-- Begin navigation: The navigation is responsive so
      there are two different versions. One is for larger
      than 675px with drop down menus. The other is for
      675px and smaller with a "hamburger" to open the main
      and sub-menus with a fade effect. See navigation.js.
      -->
      <nav class="navigation">
        <ul class="main-menu">
          <li class="main-menu__li main-menu__li--title">
            <a tabindex="0" aria-label="Close navigation" class="close-nav"
              >&times;</a
            >
            <span class="main-menu__title-text">Main Menu</span>
          </li>
          <li class="main-menu__li">
            <a class="effect main-menu__text" href="/index.html">Home</a>
          </li>
          <li class="main-menu__li">
            <a class="effect main-menu__text" href="/html/about.html">About</a>
          </li>
          <li class="main-menu__li main-menu__li--adjst">
            <a class="effect main-menu__text" href="/html/announcements.html"
              >Announcements</a
            ><a class="js-announcements main-menu__arrw"> &#8250;</a>
            <div class="sub-menu sub-menu-1">
              <ul class="sub-menu__list">
                <li class="sub-menu__li sub-menu__li--title">
                  <a
                    tabindex="0"
                    aria-label="Close Sub-Menu"
                    class="close-sub-menu-1"
                    >❮</a
                  ><span class="sub-menu__title-text">Announcements</span>
                </li>

                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/announcements/announcements_events.html"
                    >Announcements & Events</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/announcements/acknowledgements.html"
                    >Acknowledgements</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/announcements/fundraisers.html"
                    >Fundraisers</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/announcements/action.html"
                    >Take Action</a
                  >
                </li>
              </ul>
            </div>
          </li>

          <li class="main-menu__li main-menu__li--adjst">
            <a class="effect main-menu__text" href="/html/education.html"
              >Education</a
            ><a class="js-education main-menu__arrw"> ›</a>
            <div class="sub-menu sub-menu-2">
              <ul class="sub-menu__list">
                <li class="sub-menu__li sub-menu__li--title">
                  <a
                    tabindex="0"
                    aria-label="Close Sub-Menu"
                    class="close-sub-menu-2"
                    >❮</a
                  ><span class="sub-menu__title-text">Education</span>
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/education/animal-welfare-edu.html"
                    >Animal Welfare Education</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/education/legal-animal-welfare-edu.html"
                    >Legal Animal Welfare Education</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a class="sub-menu__text" href="/html/education/estate.html"
                    >Estate Planning</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li class="main-menu__li main-menu__li--adjst">
            <a class="effect main-menu__text" href="/html/services.html"
              >Services</a
            ><a class="js-services main-menu__arrw"> &#8250;</a>
            <div class="sub-menu sub-menu-3">
              <ul class="sub-menu__list">
                <li class="sub-menu__li sub-menu__li--title">
                  <a
                    tabindex="0"
                    aria-label="Close Sub-Menu"
                    class="close-sub-menu-3"
                    >❮</a
                  ><span class="sub-menu__title-text">Services</span>
                </li>
                <li class="sub-menu__li">
                  <a class="sub-menu__text" href="/html/services/animeals.html"
                    >Animeals</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/services/financial-assist.html"
                    >Financial Assistance</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/services/humane-edu.html"
                    >Humane Education</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/services/spay-neuter-assist.html"
                    >Low-cost Spay/Neuter</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a class="sub-menu__text" href="/html/services/adopt-1.php"
                    >Pet Adoption</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/services/pet-rehome.html"
                    >Pet Rehoming</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a class="sub-menu__text" href="/html/services/swap.html"
                    >SWAP</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a class="sub-menu__text" href="/html/services/tnr.html"
                    >TNR Community Cat Resource</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li class="main-menu__li main-menu__li--adjst">
            <a class="effect main-menu__text" href="/html/support.html"
              >Support PAWS</a
            ><a class="js-support main-menu__arrw"> &#8250;</a>
            <div class="sub-menu sub-menu-4">
              <ul class="sub-menu__list">
                <li class="sub-menu__li sub-menu__li--title">
                  <a
                    tabindex="0"
                    aria-label="Close Sub-Menu"
                    class="close-sub-menu-4"
                    >❮</a
                  ><span class="sub-menu__title-text">Support Paws</span>
                </li>
                <li class="sub-menu__li">
                  <a class="sub-menu__text" href="/html/support/donate.html"
                    >Donate</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a
                    class="sub-menu__text"
                    href="/html/support/newsletter-signup.html"
                    >Newsletter Signup</a
                  >
                </li>
                <li class="sub-menu__li">
                  <a class="sub-menu__text" href="/html/support/partners.html"
                    >PAWS Partners & Resources</a
                  >
                </li>
                <li class="sub-menu__li sub-menu__li--current">Volunteer</li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>

      <!-- End navigation -->

      <!-- Breadcrumbs -->
      <p class="breadcrumbs">
        <a href="/index.html">PAWS LI</a> >
        <a href="/html/support.html">Support</a> >
        <span class="breadcrumb--current">Volunteer</span>
      </p>

      <!-- Donate & Volunteer buttons -->
      <a
        href="https://www.paypal.com/us/fundraiser/charity/1324437"
        class="btn btn--donate"
        target="_blank"
        >Donate</a
      >
      <a href="/html/support/volunteer-1.php" class="btn btn--volunteer"
        >Volunteer</a
      >
    </header>
    <main>
      <section class="content">
        <h1>Pet Adoption</h1>
      </section>

      <section class="main-form">
        <form id="form" action="/html/services/adopt-3.php" method="post">
          <input
            type="hidden"
            name="pet_type"
            id="pet-type-hidden"
            value="$_SESSION[pet_type]"
          />
          <p>Form Progress:</p>
          <div id="form-progress" data-max-step="4" data-current-step="2">
            <div id="step-1">1</div>
            <div id="step-2">2</div>
            <div id="step-3">3</div>
            <div id="step-4">4</div>
          </div>
          <fieldset>
            <legend>Adopt a Pet</legend>
            <h2>Household Information</h2>
            <label for="housing" class="required">Housing</label>
            <select
              name="housing"
              id="housing"
              class="form-input form-input--select"
              required
            >
              <option value="">Please select your housing</option>
              <option value="Single-family house">Single-family house</option>
              <option value="Apartment">Apartment</option>
              <option value="Dormitory">Dormitory</option>
              <option value="Duplex/Townhouse/Condo">
                Duplex/Townhouse/Condo
              </option>
              <option value="Other">Other</option>
            </select>
            <div class="input-group input-group--other-housing hidden-display">
              <label for="other-housing" class="required"
                >Please describe your housing situation</label
              >
              <textarea
                name="other-housing"
                id="other-housing"
                rows="5"
                class="form-input form-input--text"
                pattern="[^!@#$%^&\*()=\+\|\?><;\/\\\~`]+"
              ></textarea>
            </div>
            <div class="input-group input-group--own-rent">
              <label for="own-rent" class="required">Do you own or rent?</label>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="own-rent"
                  id="own"
                  value="own"
                  class="form-input form-input--radio"
                  required
                />
                <label for="own" class="input-group__sub-label">Own</label>
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="own-rent"
                  id="rent"
                  value="rent"
                  class="form-input form-input--radio"
                  required
                />
                <label for="rent" class="input-group__sub-label">Rent</label>
              </div>
            </div>
            <div class="input-group input-group--landlord hidden-display">
              <label for="pets-allowed" class="required"
                >Does your landlord allow pets?</label
              >
              <div class="input-label-set">
                <input
                  type="radio"
                  name="pets-allowed"
                  id="allowed-yes"
                  value="yes"
                  class="form-input form-input--radio"
                />
                <label for="allowed-yes" class="input-group__sub-label"
                  >Yes</label
                >
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="pets-allowed"
                  id="allowed-no"
                  value="no"
                  class="form-input form-input--radio"
                />
                <label for="allowed-no" class="input-group__sub-label"
                  >No</label
                >
              </div>
              <label for="landlord-name" class="required"
                >Landlord's name</label
              >
              <input
                type="text"
                name="landlord-name"
                id="landlord-name"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
              />
              <label for="landlord-phone" class="required"
                >Landlord's phone</label
              >
              <input
                type="tel"
                name="landlord-phone"
                id="landlord-phone"
                minlength="10"
                maxlength="12"
                pattern="[0-9]{3}-{0,1}[0-9]{3}-{0,1}[0-9]{4}"
                class="form-input form-input--text"
                placeholder="###-###-####"
              />
            </div>

            <label for="length-residence" class="required"
              >How long have you been living at your current residence?</label
            >
            <input
              type="text"
              name="length-residence"
              id="length-residence"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <div class="input-group">
              <label for="moving" class="required"
                >Are you planning on moving in the next 12 months?</label
              >
              <div class="input-label-set">
                <input
                  type="radio"
                  name="moving"
                  id="moving-yes"
                  value="yes"
                  class="form-input form-input--radio"
                  required
                />
                <label for="moving-yes" class="input-group__sub-label"
                  >Yes</label
                >
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="moving"
                  id="moving-no"
                  value="no"
                  class="form-input form-input--radio"
                  required
                />
                <label for="moving-no" class="input-group__sub-label">No</label>
              </div>
            </div>
            <label for="adults" class="required"
              >How many adults live in the household?</label
            >
            <input
              type="text"
              name="adults"
              id="adults"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <label for="adults-relation" class="required"
              >What relation are they to you?</label
            >
            <input
              type="text"
              name="adults-relation"
              id="adults-relation"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <div class="input-group input-group--children">
              <label for="children" class="required"
                >Are there children in the household?</label
              >
              <div class="input-label-set">
                <input
                  type="radio"
                  name="children"
                  id="children-yes"
                  value="yes"
                  class="form-input form-input--radio"
                  required
                />
                <label for="children-yes" class="input-group__sub-label"
                  >Yes</label
                >
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="children"
                  id="children-no"
                  value="no"
                  class="form-input form-input--radio"
                  required
                />
                <label for="children-no" class="input-group__sub-label"
                  >No</label
                >
              </div>
            </div>
            <div class="input-group input-group--children-yes hidden-display">
              <label for="number-children" class="required"
                >How many children are there in the household? (number only
                please)</label
              >
              <input
                type="text"
                name="number-children"
                id="number-children"
                pattern="[0-9]+"
                class="form-input form-input--text"
              />
              <label for="age-children" class="required"
                >List children's age:</label
              >
              <textarea
                name="age-children"
                id="age-children"
                rows="5"
                class="form-input form-input--text"
                pattern="[^!@#$%^&\*()=\+\|\?><;\/\\\~`]+"
></textarea>
            </div>
            <div class="input-group">
              <label for="other-children" class="required"
                >Will the pet be in contact with other children? (neighbors,
                family, etc.)</label
              >
              <div class="input-label-set">
                <input
                  type="radio"
                  name="other-children"
                  id="other-children-yes"
                  value="yes"
                  class="form-input form-input--radio"
                  required
                />
                <label for="other-children-yes" class="input-group__sub-label"
                  >Yes</label
                >
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="other-children"
                  id="other-children-no"
                  value="no"
                  class="form-input form-input--radio"
                  required
                />
                <label for="children-no" class="input-group__sub-label"
                  >No</label
                >
              </div>
            </div>
            <div class="input-group">
              <label for="all-willing" class="required"
                >Do all of the members of the household want to adopt this
                pet?</label
              >
              <div class="input-label-set">
                <input
                  type="radio"
                  name="all-willing"
                  id="all-willing-yes"
                  value="yes"
                  class="form-input form-input--radio"
                  pattern="[^!@#$%^&\*()=\+\|\?><;\/\\\~`]+"
                  required
                />
                <label for="all-willing-yes" class="input-group__sub-label"
                  >Yes</label
                >
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="all-willing"
                  id="all-willing-no"
                  value="no"
                  class="form-input form-input--radio"
                  required
                />
                <label for="all-willing-no" class="input-group__sub-label"
                  >No</label
                >
              </div>
            </div>
            <label for="caretaker" class="required"
              >Who will be the main caretaker of this pet?</label
            >
            <input
              type="text"
              name="caretaker"
              id="caretaker"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <div class="input-group input-group--allergies">
              <label for="allergies" class="required"
                >Are there people with allergies in the household?</label
              >
              <div class="input-label-set">
                <input
                  type="radio"
                  name="allergies"
                  id="allergies-yes"
                  value="yes"
                  class="form-input form-input--radio"
                  required
                />
                <label for="allergies-yes" class="input-group__sub-label"
                  >Yes</label
                >
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="allergies"
                  id="allergies-no"
                  value="no"
                  class="form-input form-input--radio"
                  required
                />
                <label for="allergies-no" class="input-group__sub-label"
                  >No</label
                >
              </div>
            </div>
            <div class="input-group input-group--allergies-yes hidden-display">
              <label for="type-allergies" class="required"
                >What types of allergies?</label
              >
              <textarea
                name="type-allergies"
                id="type-allergies"
                rows="5"
                class="form-input form-input--text"
                pattern="[^!@#$%^&\*()=\+\|\?><;\/\\\~`]+"
              ></textarea>
            </div>
            <label for="adopt-reason" class="required"
              >Reason for wanting to adopt this pet</label
            >
            <select
              name="adopt-reason"
              id="adopt-reason"
              class="form-input form-input--select"
            >
              <option value="">Please choose one</option>
              <option value="Family companion">Family companion</option>
              <option value="Gift">Gift</option>
              <option value="Protection">Protection</option>
              <option value="Hunting">Hunting</option>
              <option value="For children">For children</option>
            </select>
            <div class="input-group input-group--where">
              <label for="pet-kept" class="required"
                >Where will the pet be kept?</label
              >
              <select
                name="pet-kept"
                id="pet-kept"
                class="form-input form-input--select"
              >
                <option value="">Please choose one</option>
                <option value="Indoors">Indoors</option>
                <option value="Outdoors">Outdoors</option>
                <option value="Indoors and outdoors">
                  Indoors and outdoors
                </option>
              </select>
            </div>
            <label for="hours-alone" class="required"
              >How many hours a day will the pet be alone?</label
            >
            <input
              type="text"
              name="hours-alone"
              id="hours-alone"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <div class="input-group input-group--yard hidden-display">
              <label for="yard-size" class="required"
                >What is the size of your yard?</label
              >
              <input
                type="text"
                name="yard-size"
                id="yard-size"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
              />
              <div class="input-group input-group--fully-fenced">
                <label for="fully-fenced" class="required"
                  >Is the yard fully fenced</label
                >
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="fully-fenced"
                    id="fully-fenced-yes"
                    value="yes"
                    class="form-input form-input--radio"
                  />
                  <label for="fully-fenced-yes" class="input-group__sub-label"
                    >Yes</label
                  >
                </div>
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="fully-fenced"
                    id="fully-fenced-no"
                    value="no"
                    class="form-input form-input--radio"
                  />
                  <label for="fully-fenced-no" class="input-group__sub-label"
                    >No</label
                  >
                </div>
              </div>
              <div class="input-group input-group--fence hidden-display">
                <label for="fence" class="required"
                  >What height and type of fence is it?</label
                >
                <textarea
                  name="fence"
                  id="fence"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  rows="5"
                ></textarea>
              </div>
            </div>
            <div class="input-group input-group--restraint hidden-display">
              <label for="outside-restraint" class="required"
                >How will the dog be restrained outside?</label
              >
              <select
                name="outside-restraint"
                id="outside-restraint"
                class="form-input form-input--select"
              >
                <option value="">Please choose one</option>
                <option value="Chain">Chain</option>
                <option value="Kennel">Kennel</option>
                <option value="Runner line">Runner line</option>
                <option value="Electric fence">Electric fence</option>
                <option value="Leashed walks only">Leashed walks only</option>
                <option value="No restraint">No restraint</option>
              </select>
            </div>
            <label for="unacceptable-behavior" class="required"
              >What types of behaviors do you consider unacceptable?</label
            >
            <textarea
              name="unacceptable-behavior"
              id="unacceptable-behavior"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              rows="5"
              class="form-input form-input--text"
              required
            ></textarea>
            <label for="rehoming-reasons" class="required"
              >What reasons justify rehoming your pet?</label
            >
            <textarea
              name="rehoming-reasons"
              id="rehoming-reasons"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              rows="5"
              class="form-input form-input--text"
              required
            ></textarea>

            <button type="submit" class="btn btn--submit">Next</button>
          </fieldset>
        </form>
      </section>
    </main>
    <footer>
      <ul class="footer-nav">
        <li class="footer-nav__li footer-nav__li--current">
          <a href="/index.html">Home</a>
        </li>
        <li class="footer-nav__li">
          <a href="/html/privacy.html">Privacy Policy</a>
        </li>
        <li class="footer-nav__li">
          <a href="/html/contact.html">Contact Us</a>
        </li>
      </ul>
      <ul class="social-media">
        <li class="social-media__li">
          <a
            href="https://www.facebook.com/PAWSLongIsland"
            target="_blank"
            aria-label="PAWS Facebook"
            ><span class="fab fa-facebook"></span
          ></a>
        </li>
        <li class="social-media__li">
          <a
            href="https://instagram.com/paws_li"
            target="_blank"
            aria-label="PAWS Instagram"
          >
            <span class="fab fa-instagram"></span
          ></a>
        </li>
      </ul>
      <p class="copyright">
        <small>&copy;2022 Pioneers for Animal Welfare Society, Inc.</small>
      </p>
    </footer>
  </body>
</html>
_EOT; ?>
