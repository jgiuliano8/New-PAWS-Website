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
$_SESSION['name'] = $_SESSION['email'] = $_SESSION['street'] = $_SESSION['city'] = $_SESSION['state'] = $_SESSION['zip-code'] = $_SESSION['phone'] = $_SESSION['birth-year'] = $_SESSION['ec-name'] = $_SESSION['ec-relationship'] = $_SESSION['ec-phone'] = $_SESSION['ec-email'] = '';


// Set SESSION variables to POST variables so they carry over
// to other pages
// Then scrub and validate SESSION variables

foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    $_SESSION[$key] = parse_input($_SESSION[$key]);
    switch($key)
    {
      case 'name':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the name field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'email': if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                      echo("Invalid email format. Please go back and input a valid email. <br/> <br />");
                      exit;
                    }
                    break;

      case 'street':  if (!letters_numbers_space_only($_SESSION[$key])) {
                        echo("Only letters, numbers and white space allowed in the street field. Please go back and input correctly. <br/> <br />");
                        exit;  
                      };
                      break;

      case 'city':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the city field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'state': if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the city field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'zip-code': if(!zipcode_only($_SESSION[$key])) {
                        echo("Please go back and input a valid ZIP Code, 5 digits or optionally ZIP+4. <br />");
                        exit;
                      }
                      break;

      case 'phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the form ###-###-####.");
                      exit;
                    }
                    break;

      case 'birth-year':  if(!numbers_only($_SESSION[$key])) {
                            echo("Please go back and input a valid birth year in the form ####.");
                            exit;
                          }
                          break;

      case 'ec-name': if(!letters_space_only($_SESSION[$key])) {
                        echo("Only letters and white space allowed in the emergency contact name field. Please go back and input correctly. <br/> $_SESSION[$key]<br />");
                        exit;
                      }
                      break;

      case 'ec-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the emergency contact relationship field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ec-phone':  if(!phone_number_only($_SESSION[$key])) {
                          echo("Please go back and input a valid phone number in the emergency contact phone number field, of the form ###-###-####.");
                          exit;
                        }
                        break;

      case 'ec-email':  if($_SESSION[$key] != '') {
                          if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                            echo("Invalid email format in the emergency contact email field. Please go back and input a valid email. <br/> <br />");
                            exit;
                          }
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
        <h1>Volunteer</h1>
      </section>

      <section class="main-form">
        <form action="/html/support/volunteer-3.php" method="post">
          <p>Form Progress:</p>
          <div id="form-progress" data-max-step="4" data-current-step="2">
            <div id="step-1">1</div>
            <div id="step-2">2</div>
            <div id="step-3">3</div>
            <div id="step-4">4</div>
          </div>
          <fieldset>
            <legend>Volunteer for PAWS</legend>
            <h2>About You</h2>
            <label for="input-group">Employment</label>
            <div class="input-group input-group--employment">
              <label for="occupation" class="required">Occupation</label>
              <input
                type="text"
                name="occupation"
                id="occupation"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
                required
              />
              <div class="input-group input-group--pt-ft">
                <label for="pt-ft">Part-time or full-time?</label>
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="pt-ft"
                    id="pt"
                    value="Part-time"
                    class="form-input form-input--radio"
                  />
                  <label for="pt" class="input-group__sub-label">part-time</label>
                </div>
                <div class="input-label-set">
                  <input
                    type="radio"
                    name="pt-ft"
                    id="ft"
                    value="Full-time"
                    class="form-input form-input--radio"
                  />
                  <label for="pt-ft" class="input-group__sub-label"
                    >Full-time</label>
                </div>
              </div>

              <label for="employer">Employer/School</label>
              <input
                type="text"
                name="employer"
                id="employer"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
              />
              <label for="time">Length of time on job</label>
              <input
                type="text"
                name="time"
                id="time"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
              />
            </div>
            <label for="certifications" class="required"
              >Do you hold any professional certifications (such as Vet, Vet
              Tech, RN, MD, etc.)? If so, which ones?</label
            >
            <input
              type="text"
              name="certifications"
              id="certifications"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <label for="languages" class="required"
              >Are you fluent in any language(s) other than English? If so, what
              language(s)?</label
            >
            <input
              type="text"
              name="languages"
              id="languages"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <label for="animal-orgs" class="required"
              >Have you previously volunteered with an animal organization? If
              so, which ones?</label
            >
            <input
              type="text"
              name="animal-orgs"
              id="animal-orgs"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <label for="volunteer-work" class="required"
              >Have you ever volunteered with another not-for-profit
              organization? If so, which ones?</label
            >
            <input
              type="text"
              name="volunteer-work"
              id="volunteer-work"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <label for="conviction" class="required"
              >Have you ever been convicted of a crime? If yes, please explain
              the nature of the crime and the date of the conviction (conviction
              of a crime is not an automatic disqualification for volunteer
              work)</label
            >
            <textarea
              cols="40"
              rows="5"
              name="conviction"
              id="conviction"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            ></textarea>
            <label for="about-paws" class="required"
              >How did you hear about PAWS?</label
            >
            <input
              type="text"
              name="about-paws"
              id="about-paws"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <label for="volunteer-reason" class="required"
              >Reason for Volunteering with PAWS:</label
            >
            <textarea
              cols="40"
              rows="5"
              name="volunteer-reason"
              id="volunteer-reason"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            ></textarea>
            <div class="input-group input-group--drive">
              <label for="drive" class="required">Do you drive?</label>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="drive"
                  id="drive-yes"
                  value="Yes"
                  class="form-input form-input--radio"
                  required
                />
                <label for="drive-yes" class="input-group__sub-label">Yes</label>
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="drive"
                  id="drive-no"
                  value="No"
                  class="form-input form-input--radio"
                  required
                />
                <label for="drive-no" class="input-group__sub-label"
                  >No</label>
              </div>
            </div>

            <label for="animal-experience" class="required"
              >Tell us about your experience with animals:</label
            >
            <textarea
              cols="40"
              rows="5"
              name="animal-experience"
              id="animal-experience"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
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
_EOT;
?>