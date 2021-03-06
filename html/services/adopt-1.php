<?php
session_start() != FALSE
  or die('Could not start session');
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
    <!-- <script defer src="/scripts/forms.js"></script> -->
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
        <a href="/html/services.html">Services</a> >
        <span class="breadcrumb--current">Pet Adoption</span>
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

        <p class="content__p">
          Looking for a furrever friend? Check out our
          <a
            href="https://www.petfinder.com/search/cats-for-adoption/?shelter_id%5B0%5D=NY1336&sort%5B0%5D=recently_added"
            >cats</a
          >
          and
          <a
            href="https://www.petfinder.com/search/dogs-for-adoption/?shelter_id%5B0%5D=NY1336&sort%5B0%5D=recently_added"
            >dogs</a
          >
          for adoption. Or
          <a
            href="https://www.petfinder.com/member/us/ny/huntington/pioneers-for-animal-welfare-society-inc-paws-ny1336/"
            >check us out on Petfinder.com</a
          >.
        </p>
        <p class="content__p">
          Found a pet you are interested in? Fill out the adoption form below
          and we will follow-up with you.
        </p>
        <p class="content__p content__p--info">
          To fill out the pet adoption form we require three references and a
          veterinary contact. They must not be family references and you will
          need a contact phone number for them. Employer and volunteer
          references are preferred.
        </p>
      </section>

      <section class="main-form">
        <form id="form" action="/html/services/adopt-2.php" method="post">
          <p>Form Progress:</p>
          <div id="form-progress" data-max-step="4" data-current-step="1">
            <div id="step-1">1</div>
            <div id="step-2">2</div>
            <div id="step-3">3</div>
            <div id="step-4">4</div>
          </div>
          <fieldset>
            <legend>Adopt a Pet</legend>
            <label for="pet" class="required"
              >Which animal(s) do you want to adopt?</label
            >
            <input
              type="text"
              name="pet"
              id="pet"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <div class="input-group">
              <label for="pet_type" class="required"
                >What type of animal is this?</label
              >
              <div class="input-label-set">
                <input
                  type="radio"
                  name="pet_type"
                  id="dog"
                  value="dog"
                  class="form-input form-input--radio"
                  required
                />
                <label for="dog" class="input-group__sub-label">Dog</label>
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="pet_type"
                  id="cat"
                  value="cat"
                  class="form-input form-input--radio"
                  required
                />
                <label for="cat" class="input-group__sub-label">Cat</label>
              </div>
              <div class="input-label-set">
                <input
                  type="radio"
                  name="pet_type"
                  id="other"
                  value="other"
                  class="form-input form-input--radio"
                  required
                />
                <label for="other" class="input-group__sub-label">Other</label>
              </div>
            </div>

            <h2>Contact Information</h2>
            <label for="name" class="required">Name(First and last)</label>
            <input
              type="text"
              name="name"
              id="name"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <div class="input-group">
              <label for="input-group" class="required">Address</label>
              <label for="street" class="sr-only">Street</label>
              <input
                type="text"
                name="street"
                id="street"
                placeholder="Street"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
                required
              />
              <label for="city" class="sr-only">City</label>
              <input
                type="text"
                name="city"
                id="city"
                placeholder="City"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
                required
              />
              <label for="state" class="sr-only">State</label>
              <input
                type="text"
                name="state"
                id="state"
                placeholder="State"
                pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
                class="form-input form-input--text"
                required
              />
              <label for="zip-code" class="sr-only">ZIP Code</label>
              <input
                type="text"
                name="zip-code"
                id="zip-code"
                minlength="5"
                maxlength="10"
                pattern="[0-9]{5}(-[0-9]{4}){0,1}"
                placeholder="ZIP Code"
                class="form-input form-input--text"
                required
              />
            </div>
            <label for="email" class="required">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              class="form-input form-input--text"
              required
            />
            <label for="phone" class="required">Phone</label>
            <input
              type="tel"
              name="phone"
              id="phone"
              minlength="10"
              maxlength="12"
              pattern="[0-9]{3}-{0,1}[0-9]{3}-{0,1}[0-9]{4}"
              class="form-input form-input--text"
              placeholder="###-###-####"
              required
            />
            <h2>About You</h2>
            <label for="age" class="required">Age</label>
            <input
              type="text"
              name="age"
              id="age"
              minlength="1"
              maxlength="3"
              pattern="[0-9]{1,3}"
              class="form-input form-input--text"
              required
            />
            <label for="occupation" class="required">Occupation</label>
            <input
              type="text"
              name="occupation"
              id="occupation"
              pattern="[^!@#$%^&\*()=\+\|\?><:;\/\\\~`]+"
              class="form-input form-input--text"
              required
            />
            <label for="work-hours" class="required">Work Hours</label>
            <textarea
              rows="5"
              name="work-hours"
              id="work-hours"
              pattern="[^!@#$%^&\*()=\+\|\?><;\/\\\~`]+"
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
