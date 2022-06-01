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
$_SESSION['interests[]'] = $_SESSION['other-info'] = $_SESSION['availability[]'] = $_SESSION['ref1-name'] = $_SESSION['ref1-relationship'] = $_SESSION['ref1-phone'] = $_SESSION['ref1-email'] = $_SESSION['ref2-name'] = $_SESSION['ref2-relationship'] = $_SESSION['ref2-phone'] = $_SESSION['ref2-email'] = $_SESSION['ref3-name'] = $_SESSION['ref3-relationship'] = $_SESSION['ref3-phone'] = $_SESSION['ref3-email'] = $_SESSION['vet-name'] = $_SESSION['vet-phone'] = '';

// Set SESSION variables to POST variables so they carry over
// to other pages
// Then scrub and validate SESSION variables

foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    if(gettype($_SESSION[$key]) == 'array') {
      foreach($_SESSION[$key] as $subkey => $subvalue) {
            $_SESSION[$key][$subkey] = parse_input($subvalue);
      }
    } else {
      $_SESSION[$key] = parse_input($_SESSION[$key]);
    }
    switch($key)
    {
      case 'interests': foreach($_SESSION[$key] as $subkey => $subvalue) {
                          if(!letters_space_only($_SESSION[$key][$subkey])) {
                            echo("Only letters and white space allowed in the 'interests' field. Please go back and input correctly. <br/> <br />");
                          exit;
                          }
                        }
                        break;

      case 'other-info':  if (!textarea_only($_SESSION[$key])) {
                            echo("Only letters, numbers and white space allowed in the 'other info' field. Please go back and input correctly. <br/> <br />");
                            exit;  
                          };
                          break;

      case 'availability':  foreach($_SESSION[$key] as $subkey => $subvalue) {
                              if(!letters_space_only($_SESSION[$key][$subkey])) {
                                echo("Only letters and white space allowed in the 'availability' field. Please go back and input correctly. <br/> <br />");
                              exit;
                              }
                            }
                            break;

      case 'ref1-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 1 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref1-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 1 relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref1-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 1 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref1-email':  if($_SESSION[$key] != '') {
                            if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                              echo("Invalid email format. Please go back and input a valid email in the 'Reference 1 email' field. <br/> <br />");
                              exit;
                            }
                          }
                          break;

      case 'ref2-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 2 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref2-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 2relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref2-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 3 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref2-email':  if($_SESSION[$key] != '') {
                            if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                              echo("Invalid email format. Please go back and input a valid email in the 'Reference 2 email' field. <br/> <br />");
                              exit;
                            }
                          }
                          break;

      case 'ref3-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 3 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref3-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 3 relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref3-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 3 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref3-email':   if($_SESSION[$key] != '') {
                            if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                              echo("Invalid email format. Please go back and input a valid email in the 'Reference 3 email' field. <br/> <br />");
                              exit;
                            }
                          }
                          break;

      case 'vet-name':  if($_SESSION[$key] != '') {
                          if (!letters_space_only($_SESSION[$key])) {            
                            echo("Only letters and white space allowed in the 'Veterinary name' field. Please go back and input correctly. <br/> <br />");
                            exit;
                          }
                        }  
                        break;

      case 'vet-phone': if($_SESSION[$key] != '') {
                          if(!phone_number_only($_SESSION[$key])) {
                            echo("Please go back and input a valid phone number in the 'Veterinary phone number' field, of the format ###-###-####.");
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
        <form action="/html/support/volunteer-4.php" method="post">
          <fieldset>
            <legend>Volunteer for PAWS</legend>
            
            <fieldset class="swap-disclaimer">
              <legend>SWAP Disclaimer</legend>
              <h3>If you are volunteering for Seniors with Animals Project (“SWAP”): </h3>

              <h3 class="guidelines">Volunteer Guidelines</h3>
              <p>As a PAWS SWAP Volunteer, I agree to:</p>
              <ul>
                <li>Never discuss client details/information with people outside of PAWS.</li>
                <li>Make a minimum 6 month commitment if I sign up to be a ‘House call’ volunteer.</li>
                <li>Show up and be on time for every appointment, rain or shine; dangerous, ice/heavy snow isexception.</li>
                <li>Set boundaries with clients and know my own personal boundaries.</li>
                <li>Notify PAWS and client promptly if I must cancel for any reason.</li>
                <li>Introduce myself to clients when they are present.</li>
                <li>Respect the privacy of all clients and conduct myself in a professional manner.</li>
                <li>Notify client and PAWS if unable to make appointment regardless of reason.</li>
                <li>Always pick up after dogs and properly dispose of waste when cleaning litter.</li>
                <li>Do my best to avoid other dogs and people (esp. children) when walking a dog.</li>
                <li>Never bring other pets or children with me on my visits; unless discussed and approved byPAWS.</li>
                <li>Never take dogs off leash for any reason, even if client asks me to do so.</li>
                <li>Limit assistance to pre-approved services, and I will refer client to PAWS if they requestadditional services.</li>
                <li>Never accept compensation from a client, and never loan or give a client personal items or money.</li>
                <li>Contact PAWS if I believe a client or pet is at risk for any reason.</li>
                <li class="background-check-clause">Due to the specific nature of this volunteer assignment, I understand that PAWS must do a background check, including criminal, and expressly grant my permission for them to do the same.</li>
              </ul>
            </fieldset>

            <p class="content__p">I affirm that the information supplied is true to the best of my knowledge and agree to adhere to the above Volunteer Guidelines. I understand that failure to follow the guidelines or any PAWS rule can result in the termination of my volunteer status. I understand that I am responsible for myself and agree that PAWS and PAWS agents are not liable in the event of accident, injury, death, or other incident.
            </p>

            <button type="submit" class="btn btn--submit">Submit</button>
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