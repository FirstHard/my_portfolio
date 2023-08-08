  <div class="container mt-5" id="experience">
    <div class="row justify-content-evenly">
      <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-yellow">
        <h3 class="text-center mb-0">Work experience:</h3>
      </div>
      <div class="col-12 col-xl-10">
        <div class="experience pt-3 bg-white">
          <ul class="timeline-1 text-black">
          @foreach ($experiences as $experience)
            <li class="event" data-date="{{ $experience->start_date }} - {{ $experience->end_date }}">
              <h4 class="mb-3">{{ $experience->title }}</h4>
              {!! $experience->description !!}
            </li>
          @endforeach
            {{-- <li class="event" data-date="13 February, 2022 - 25 May, 2022">
              <h4 class="mb-3">Internship</h4>
              <p>I did an internship at the IT company NIX Solutions as a Junior full stack web developer. However, due to Russia's full-scale invasion of Ukraine at the same time, since I was in Kharkiv and could not leave my place of residence for family reasons, I was not able to finish my internship at this IT company.</p>
            </li>
            <li class="event" data-date="July 2021 - January 2022">
              <h4 class="mb-3">Training on courses</h4>
              <p>I received an offer to take a free intensive training course in one of the major IT-companies in Kharkov (NIX Solutions) with possible employment in this company at the end of training.</p>
              <p>Completed this course successfully, in 2022.</p>
            </li>
            <li class="event" data-date="2012 - 2021">
              <h4 class="mb-3">Freelance</h4>
              <p>Development of websites to order from scratch, using "CMS Joomla!": online stores, corporate and personal sites, websites, directories. In total during this time has developed about 30 sites.</p>
              <p>In 2013, I re-created the project of my web studio "EasyWEB" with a new name: "WorldOfSites".</p>
            </li>
            <li class="event" data-date="2005 - 2012">
              <h4 class="mb-3">As a hobby</h4>
              <p>I started studying website development with HTML, CSS, JavaScript in 2005, as a hobby - from paper textbooks printed on a friend's printer, not having permanent access to the Internet.</p>
              <a class="btn btn-primary rounded-0" data-bs-toggle="collapse" href="#collapseHobby" role="button" aria-expanded="false" aria-controls="collapseHobby">
                Read more
              </a>
              <div class="collapse mt-3" id="collapseHobby">
                <p>At the same time, created his first static site and put it on free hosting, using the services of Internet cafes.</p>
                <p>He went on to study website development - developing static and dynamic WAP sites for cell phones at the time, using WML. I used the PHP-based CMS "WAP-Motor" to develop dynamic sites. Developed several such sites for myself and friends.</p>
                <p>Then - interested in other CMS - "Joomla!", "Wordpress", "DLE" and developed several sites using these engines. One of these sites on the engine "Joomla!" was developed by me for the first client in 2008.</p>
                <p>In 2007, I created a project of my own web studio called "EasyWEB".</p>
                <p>From 2008 to 2012 - a deeper study of CMS "Joomla!", began to learn PHP, engaged in creating a working environment for the development of full-fledged web applications on the home computer: I installed and configured for their needs VEB, FTP, Proxy servers, etc.</p>
              </div>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </div>