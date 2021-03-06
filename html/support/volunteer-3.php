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
$_SESSION['occupation'] = $_SESSION['pt-ft'] = $_SESSION['employer'] = $_SESSION['time'] = $_SESSION['certifications'] = $_SESSION['languages'] = $_SESSION['animal-orgs'] = $_SESSION['volunteer-work'] = $_SESSION['conviction'] = $_SESSION['about-paws'] = $_SESSION['volunteer-reason'] = $_SESSION['drive'] = $_SESSION['animal-experience'] = '';


// Set SESSION variables to POST variables so they carry over
// to other pages
// Then scrub and validate SESSION variables

foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    $_SESSION[$key] = parse_input($_SESSION[$key]);
    switch($key)
    {
      case 'occupation':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the 'occupation' field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'pt-ft':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the 'part-time/full-time' field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'employer': if (!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the 'employer' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'time':  if (!letters_numbers_space_only($_SESSION[$key])) {
                        echo("Only letters, numbers and white space allowed in the 'time on the job' field. Please go back and input correctly. <br/> <br />");
                        exit;  
                      };
                      break;

      case 'certifications':  if(!letters_numbers_space_only($_SESSION[$key])) {
                      echo("Only letters, numbers  and white space allowed in the 'certifications' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'languages': if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the 'languages' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'animal-orgs': if(!letters_numbers_space_only($_SESSION[$key])) {
                        echo("Only letters, numbers and white space allowed in the 'animal organizations' field. Please go back and input correctly.<br />");
                        exit;
                      }
                      break;

      case 'volunteer-work': if(!letters_numbers_space_only($_SESSION[$key])) {
                      echo("Only letters, numbers and white space allowed in the 'volunteer work' field. Please go back and input correctly.");
                      exit;
                    }
                    break;

      case 'conviction':  if(!textarea_only($_SESSION[$key])) {
                            echo("Only letters, numbers and white space allowed in the 'convictions' field. Please go back and input correctly.");
                            exit;
                          }
                          break;
                          
      case 'about-paws': if(!letters_numbers_space_only($_SESSION[$key])) {
                        echo("Only letters, numbers and white space allowed in the 'why you want to volunteer for PAWS' field. Please go back and input correctly. <br/> $_SESSION[$key]<br />");
                        exit;
                      }
                      break;

      case 'volunteer-reason': if(!textarea_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the 'volunteer reason' field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'drive':  if(!letters_space_only($_SESSION[$key])) {
                          echo("Only letters and white space allowed in the 'driving' field. Please go back and input correctly.");
                          exit;
                        }
                        break;

      case 'animal-experience':  if (!textarea_only($_SESSION[$key])) {
                          echo("Only letters, numbers and white space allowed in the 'tell us about your animal experience'  field. Please go back and input correctly. <br/> <br />");
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
    <title>Volunteer for PAWS</title>
    <link rel="icon" href="/images/favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="/styles/styles.css" />
    <link rel="stylesheet" href="/styles/navigation.css" />
    <link rel="stylesheet" href="/styles/forms.css" />
    <script defer src="/scripts/navigation.js"></script>
    <script defer src="/scripts/progress.js"></script>
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
                    >???</a
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
            ><a class="js-education main-menu__arrw"> ???</a>
            <div class="sub-menu sub-menu-2">
              <ul class="sub-menu__list">
                <li class="sub-menu__li sub-menu__li--title">
                  <a
                    tabindex="0"
                    aria-label="Close Sub-Menu"
                    class="close-sub-menu-2"
                    >???</a
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
                    >???</a
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
                    >???</a
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
        <a href="/html/support.html">Support PAWS</a> >
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
        <h1>Volunteer</h1>
      </section>

      <section class="main-form">
        <form action="/html/support/volunteer-4.php" method="post">
          <p>Form Progress:</p>
          <div id="form-progress" data-max-step="4" data-current-step="3">
            <div id="step-1">1</div>
            <div id="step-2">2</div>
            <div id="step-3">3</div>
            <div id="step-4">4</div>
          </div>
          <fieldset>
            <legend>Volunteer for PAWS</legend>
            <h2>Volunteer Interests</h2>
            <label for="input-group" class="required">Please indicate what volunteer opportunities you might be interested in:</label>
            <div class="input-group input-group--interests">
              
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value='Seniors with Animals Program(SWAP)- House Calls'
                name="interests[]"
                id="SWAP-housecall"
                class="form-input form-input--checkbox"
                />
                <label for="SWAP-housecall">SWAP- Housecall Program: dog walking, litter box cleaning, or other on-going care.</label>
              </div>
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value='Seniors with Animals Program(SWAP)- On-call'
                name="interests[]"
                id="SWAP-oncall"
                class="form-input form-input--checkbox"
                />
                <label for="SWAP-oncall">SWAP- On-Call or One-Off Assignments: vet transport, animal transport, one-time fill- ins for dog walking or other care, and other one-time opportunities.</label>
              </div>
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value="Seniors with Animals Program(SWAP)- Pet Pantry"
                name="interests[]"
                id="SWAP-pet-pantry"
                class="form-input form-input--checkbox"
                />
                <label for="SWAP-pet-pantry">SWAP- Pet Pantry: pick up and delivery of pet food/supplies to clients in need.</label>
              </div>
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value="Fostering"
                name="interests[]"
                id="foster"
                class="form-input form-input--checkbox"
                
                />
                <label for="foster">Foster Care: foster a pet when their guardian is hospitalized.</label>
              </div>
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value="Events"
                name="interests[]"
                id="events"
                class="form-input form-input--checkbox"
                />
                <label for="events">Events: sell raffle tickets, assist with guest check-in and other duties at PAWS events.</label>
              </div>
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value="Administrative Assistance"
                name="interests[]"
                id="admin-assist"
                class="form-input form-input--checkbox"
                />
                <label for="admin-assist">Administrative assistance</label>
              </div>
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value="Adoption team"
                name="interests[]"
                id="adoption"
                class="form-input form-input--checkbox"
                />
                <label for="adoption">Adoption team: assist in all aspects of animal adoption.</label>
              </div>
              <div class="input-label-set input-label-set--checkbox">
                <input
                type="checkbox"
                value="Transport(animals, supplies, etc.)"
                name="interests[]"
                id="transport"
                class="form-input form-input--checkbox"
                />
                <label for="transport">Transport: Help transport animals and supplies for various PAWS processes and functions.</label>
              </div>
              <div class="input-group">
                <div class="input-label-set input-label-set--checkbox">
                  <input
                  type="checkbox"
                  value="Other"
                  name="interests[]"
                  id="other"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--checkbox"
                  />
                  <label for="other">Other</label>
                </div>
                <label for="other-info">Please specify:</label>
                <textarea rows="5" name="other-info" id="other-info" class="form-input form-input--text"></textarea>
              </div>
            </div>

          <h2>Availability</h2>
            <table class="availability">
              <tr>
                <td></td>
                <th scope="col">Mon</th>
                <th scope="col">Tue</th>
                <th scope="col">Wed</th>
                <th scope="col">Thu</th>
                <th scope="col">Fri</th>
                <th scope="col">Sat</th>
                <th scope="col">Sun</th>
              </tr>
              <tr>
                <th scope="row">Morning</th>
                <td><input type="checkbox" name="availability[]" value="Monday morning"></td>
                <td><input type="checkbox" name="availability[]" value="Tuesday morning"></td>
                <td><input type="checkbox" name="availability[]" value="Wednesday morning"></td>
                <td><input type="checkbox" name="availability[]" value="Thursday morning"></td>
                <td><input type="checkbox" name="availability[]" value="Friday morning"></td>
                <td><input type="checkbox" name="availability[]" value="Saturday morning"></td>
                <td><input type="checkbox" name="availability[]" value="Sunday morning"></td>
              </tr>
              <tr>
                <th scope="row">Afternoon</th>
                <td><input type="checkbox" name="availability[]" value="Monday afternoon"></td>
                <td><input type="checkbox" name="availability[]" value="Tuesday afternoon"></td>
                <td><input type="checkbox" name="availability[]" value="Wednesday afternoon"></td>
                <td><input type="checkbox" name="availability[]" value="Thursday afternoon"></td>
                <td><input type="checkbox" name="availability[]" value="Friday afternoon"></td>
                <td><input type="checkbox" name="availability[]" value="Saturday afternoon"></td>
                <td><input type="checkbox" name="availability[]" value="Sunday afternoon"></td>
              </tr>
              <tr>
                <th scope="row">Evening</th>
                <td><input type="checkbox" name="availability[]" value="Monday evening"></td>
                <td><input type="checkbox" name="availability[]" value="Tuesday evening"></td>
                <td><input type="checkbox" name="availability[]" value="Wednesday evening"></td>
                <td><input type="checkbox" name="availability[]" value="Thursday evening"></td>
                <td><input type="checkbox" name="availability[]" value="Friday evening"></td>
                <td><input type="checkbox" name="availability[]" value="Saturday evening"></td>
                <td><input type="checkbox" name="availability[]" value="Sunday evening"></td>
              </tr>
            </table>

          <h2>References</h2>
            <label for="volunteer-work" class="required"
              >Please list three references: (Please include any other organizations you have volunteered with. Please note, employer references are preferable to friend references. <span class="highlight">No family references</span>.)</label
            >
            <div class="input-group">
              <h3>Reference 1</h3>
              <div class="input-group input-group--reference">
                <label for="ref1-name" class="required">Name</label>
                <input
                  type="text"
                  name="ref1-name"
                  id="ref1-name"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--text"
                  required
                />
                <label for="ref1-relationship" class="required">Relationship</label>
                <input
                  type="text"
                  name="ref1-relationship"
                  id="ref1-relationship"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--text"
                  required
                />
                <label for="ref1-phone" class="required">Phone</label>
                <input
                  type="tel"
                  name="ref1-phone"
                  id="ref1-phone"
                  minlength="10"
                  maxlength="12"
                  pattern="[0-9]{3}-{0,1}[0-9]{3}-{0,1}[0-9]{4}"
                  class="form-input form-input--text"
                  placeholder="###-###-####"
                  required
                />
                <label for="ref1-email">Email</label>
                <input
                  type="email"
                  name="ref1-email"
                  id="ref1-email"
                  class="form-input form-input--text"
                />  
              </div>
            </div>
            <div class="input-group">
              <h3>Reference 2</h3>
              <div class="input-group input-group--reference">
                <label for="ref2-name" class="required">Name</label>
                <input
                  type="text"
                  name="ref2-name"
                  id="ref2-name"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--text"
                  required
                />
                <label for="ref2-relationship" class="required">Relationship</label>
                <input
                  type="text"
                  name="ref2-relationship"
                  id="ref2-relationship"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--text"
                  required
                />
                <label for="ref2-phone" class="required">Phone</label>
                <input
                  type="tel"
                  name="ref2-phone"
                  id="ref2-phone"
                  minlength="10"
                  maxlength="12"
                  pattern="[0-9]{3}-{0,1}[0-9]{3}-{0,1}[0-9]{4}"
                  class="form-input form-input--text"
                  placeholder="###-###-####"
                  required
                />
                <label for="ref2-email">Email</label>
                <input
                  type="email"
                  name="ref2-email"
                  id="ref2-email"
                  class="form-input form-input--text"
                />
              </div>
            </div>
            <div class="input-group">
              <h3>Reference 3</h3>
              <div class="input-group input-group--reference">
                <label for="ref3-name" class="required">Name</label>
                <input
                  type="text"
                  name="ref3-name"
                  id="ref3-name"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--text"
                  required
                />
                <label for="ref3-relationship" class="required">Relationship</label>
                <input
                  type="text"
                  name="ref3-relationship"
                  id="ref3-relationship"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--text"
                  required
                />
                <label for="ref3-phone" class="required">Phone</label>
                <input
                  type="tel"
                  name="ref3-phone"
                  id="ref3-phone"
                  minlength="10"
                  maxlength="12"
                  pattern="[0-9]{3}-{0,1}[0-9]{3}-{0,1}[0-9]{4}"
                  class="form-input form-input--text"
                  placeholder="###-###-####"
                  required
                />
                <label for="ref3-email">Email</label>
                <input
                  type="email"
                  name="ref3-email"
                  id="ref3-email"
                  class="form-input form-input--text"
                />
              </div>
            </div>
            <div class="input-group">
              <label>Please provide a Veterinary Reference if you are a current or previous pet guardian:</label>
              <div class="input-group input-group--reference">
                <label for="vet-name">Name</label>
                <input
                  type="text"
                  name="vet-name"
                  id="vet-name"
                  pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                  class="form-input form-input--text"
                />
                <label for="vet-phone">Phone</label>
                <input
                  type="tel"
                  name="vet-phone"
                  id="vet-phone"
                  minlength="10"
                  maxlength="12"
                  pattern="[0-9]{3}-{0,1}[0-9]{3}-{0,1}[0-9]{4}"
                  class="form-input form-input--text"
                  placeholder="###-###-####"
                />
              </div>
            </div>

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