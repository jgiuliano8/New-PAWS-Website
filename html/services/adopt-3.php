<?php
session_start() != FALSE
  or die('Could not start session');

// Error handling
set_error_handler("ErrorHandler");

function ErrorHandler($no, $str, $file, $line) {
  echo
  "<div style='border:2px dotted; padding:5px 10px;background-color:tan'>" .
  "Line $line: <span style='color:red'>$str</span> " .
  "in <span style='color:blue'>$file</span></div>";
}

// Parsing and scrubbing functions library
require "../../forms/parse_lib.php";

// Initialize SESSION variables
$_SESSION['housing'] = $_SESSION['other-housing'] = $_SESSION['own-rent'] = $_SESSION['pets-allowed'] = $_SESSION['landlord-name'] = $_SESSION['landlord-phone'] = $_SESSION['length-residence'] = $_SESSION['moving'] = $_SESSION['adults'] = $_SESSION['adults-relation'] = $_SESSION['children'] = $_SESSION['number-children'] = $_SESSION['age-chilren'] = $_SESSION['other-children'] = $_SESSION['all-willing'] = $_SESSION['caretaker'] = $_SESSION['allergies'] = $_SESSION['type-allergies'] = $_SESSION['adopt-reason'] = $_SESSION['pet-kept'] = $_SESSION['hours-alone'] = $_SESSION['yard-size'] = $_SESSION['fully-fenced'] = $_SESSION['fence'] = $_SESSION['outside-restraint'] = $_SESSION['unacceptable-behavior'] = $_SESSION['rehoming-reasons'] = '';


// Set SESSION variables to POST variables so they carry over
// to other pages
// Then scrub and validate SESSION variables

foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    $_SESSION[$key] = parse_input($_SESSION[$key]);
    switch($key)
    {
      case 'pet_type':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the pet type field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'housing':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the housing field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'other-housing':  if(!textarea_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the other housing info field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'own-rent':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the own/rent field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'pets-allowed':  if(!letters_space_only($_SESSION[$key])) {
        echo("Only letters and white space allowed in the pets allowed field. Please go back and input correctly. <br/> <br />");
        exit;  
      }
      break;

      case 'landlord-name':  if (!letters_space_only($_SESSION[$key])) {            
        echo("Only letters and white space allowed in the landlord name field. Please go back and input correctly. <br/> <br />");
        exit;  
      };
      break;

      case 'landlord-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the form ###-###-####, for your landlord's phone number.");
                      exit;
                    }
                    break;

      case 'length-residence':  if(!letters_numbers_space_only($_SESSION[$key])) {              
        echo("Only letters and white space allowed in the length of residence field. Please go back and input correctly. <br/> <br />");
        exit;
      }  
                    break;

      case 'moving': if(!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the moving soon field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'adults': if(!letters_numbers_space_only($_SESSION[$key])) {            
                        echo("Only letters, numbers and white space allowed in the number of adults field. Please go back and input correctly. <br/> <br />");
                        exit;
                      }  
                      break;
                
      case 'adults-relation':  if(!letters_space_only($_SESSION[$key])) {
                            echo("Only letters and white space allowed in the adults relationship field. Please go back and input correctly. <br/> <br />");
                            exit;
                          }
                          break;

      case 'children': if(!letters_space_only($_SESSION[$key])) {
                        echo("Only letters and white space allowed in the children yes/no field. Please go back and input correctly. <br/> $_SESSION[$key]<br />");
                        exit;
                      }
                      break;

      case 'number-children': if(!letters_numbers_space_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the number of children field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'age-children': if(!textarea_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the age of children field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'other-children': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the other children field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'all-willing': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the everyone willing field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'caretaker': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the caretaker field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'allergies': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the allergies yes/no field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'type-allergies': if(!textarea_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the type of allergies field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'adopt-reason': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the reason for adopting field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'pet-kept': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'where the pet is kept' field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'hours-alone': if(!letters_numbers_space_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the number of hours alone field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'yard-size': if(!textarea_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the yard size field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'fully-fenced': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the fully fenced yes/no field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'fence': if(!textarea_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the allergies yes/no field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'outside-restraint': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the outside restraint field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'unacceptable-behavior': if(!textarea_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the unacceptable behavior field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'rehoming-reasons': if(!textarea_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the rehoming reasons field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      default:  echo("Invalid variable name: $key. Sorry, something went wrong. Please go back and try again.");
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
    </script>
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
                  <a class="sub-menu__text" href="/html/services/adopt.html"
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
        <form id="form" action="/html/services/adopt-4.php" method="post">
          <p>Form Progress:</p>
          <div id="form-progress" data-max-step="4" data-current-step="3">
            <div id="step-1">1</div>
            <div id="step-2">2</div>
            <div id="step-3">3</div>
            <div id="step-4">4</div>
          </div>
          <fieldset>
            <legend>Adopt a Pet</legend>
            <h2>Past and Present Pet Information</h2>
              <label for="past-pets" class="required">Please list the pets you have owned previously, within the past 5 years (i.e., dog, cat, ferret, rabbit, guinea pig, farm animals, etc.):</label>
              <p>For each pet, please specify what animal it is, it's breed, sex, spayed/neutered status, vaccination status.</p>
              <textarea
                rows="10"
                name="past-pets"
                id="past-pets"
                class="form-input form-input--text"
                required
              ></textarea>
              <label for="present-pets" class="required">Please list the pets you currently own (i.e., dog, cat, ferret, rabbit, guinea pig, farm animals, etc.):</label>
              <p>For each pet, please specify what animal it is, it's breed, age, sex, spayed/neutered status, vaccination status.</p>
              <textarea
                rows="10"
                name="present-pets"
                id="present-pets"
                class="form-input form-input--text"
                required
              ></textarea>
              <label for="pets-what-happened" class="required">For animals no longer owned, what happened to the pet?</label>
              <textarea
                rows="10"
                name="pets-what-happened"
                id="pets-what-happened"
                class="form-input form-input--text"
                required
              ></textarea>
              <label for="age-deceased" class="required">If deceased, at what age did it pass?</label>
              <textarea
                rows="10"
                name="age-deceased"
                id="age-deceased"
                class="form-input form-input--text"
                required
              ></textarea>
              <div class="input-group input-group--afford-medical">
                <label for="afford-medical" class="required">Can you afford to provide medical care, proper diet, proper shelter, training, exercise, and grooming for your pet?</label>
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="afford-medical"
                    id="afford-medical-yes"
                    value="yes"
                    class="form-input form-input--radio"
                  />
                  <label for="afford-medical-yes" class="input-group__sub-label">Yes</label>
                </div>
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="afford-medical"
                    id="afford-medical-no"
                    value="no"
                    class="form-input form-input--radio"
                  />
                  <label for="afford-medical-no" class="input-group__sub-label"
                    >No</label>
                </div>
              </div>
              <div class="input-group input-group--afford-unexpected">
                <label for="afford-unexpected" class="required">If an unexpected illness or injury were to occur, can you afford to provide the needed care for this pet?</label>
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="afford-unexpected"
                    id="afford-unexpected-yes"
                    value="yes"
                    class="form-input form-input--radio"
                  />
                  <label for="afford-unexpected-yes" class="input-group__sub-label">Yes</label>
                </div>
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="afford-unexpected"
                    id="afford-unexpected-no"
                    value="no"
                    class="form-input form-input--radio"
                  />
                  <label for="afford-unexpected-no" class="input-group__sub-label"
                    >No</label>
                </div>
              </div>
              <h2>Animal Care</h2>
              

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
_EOT;
?>